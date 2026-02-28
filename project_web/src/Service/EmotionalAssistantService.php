<?php

namespace App\Service;

use App\Entity\Goal;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class EmotionalAssistantService
{
    private Client $http;
    private QuranAiService $quranService;
    private ?string $emotionApiUrl;
    private ?string $emotionApiKey;
    private ?string $huggingFaceApiKey;
    private string $huggingFaceModel;

    public function __construct(
        QuranAiService $quranService,
        ?Client $http = null,
        ?string $emotionApiUrl = null,
        ?string $emotionApiKey = null,
        ?string $huggingFaceApiKey = null,
        ?string $huggingFaceModel = null
    )
    {
        $this->http = $http ?? new Client();
        $this->quranService = $quranService;
        $this->emotionApiUrl = $emotionApiUrl ?? $this->env('EMOTION_API_URL');
        $this->emotionApiKey = $emotionApiKey ?? $this->env('EMOTION_API_KEY');
        $this->huggingFaceApiKey = $huggingFaceApiKey
            ?? $this->env('HUGGINGFACE_API_KEY')
            ?? $this->env('HUGGING_FACE_API_KEY');
        $this->huggingFaceModel = $huggingFaceModel
            ?? $this->env('HUGGINGFACE_MODEL')
            ?? $this->env('HUGGINGFACE_EMOTION_MODEL')
            ?? 'trpakov/vit-face-expression';
    }

    /**
     * Determine age phase string from birth date.
     */
    public function agePhase(?\DateTimeInterface $birthDate): ?string
    {
        if (!$birthDate) {
            return null;
        }
        $age = $birthDate->diff(new \DateTime())->y;
        return match (true) {
            $age < 18 => 'Student',
            $age < 25 => 'Young adult',
            $age < 35 => 'Early career',
            $age < 50 => 'Mid career',
            $age < 65 => 'Pre-retirement',
            default => 'Senior',
        };
    }

    /**
     * Perform emotion detection using external API.
     * Returns:
     * [
     *   'emotion' => string,
     *   'intensity' => int|null,
     *   'confidence' => int|null
     * ]
     */
    public function detectEmotionFromImage(string $base64Image): array
    {
        if ($this->emotionApiUrl) {
            try {
                $headers = ['Content-Type' => 'application/json'];
                if ($this->emotionApiKey) {
                    $headers['Authorization'] = 'Bearer '.$this->emotionApiKey;
                }

                $response = $this->http->request('POST', $this->emotionApiUrl, [
                    'headers' => $headers,
                    'json' => ['image' => $base64Image],
                    'timeout' => 10,
                ]);

                $data = json_decode((string) $response->getBody(), true);
                if (!is_array($data) || empty($data['emotion'])) {
                    throw new \RuntimeException('Invalid response from emotion API.');
                }

                return [
                    'emotion' => (string) $data['emotion'],
                    'intensity' => isset($data['intensity']) ? (int) $data['intensity'] : null,
                    'confidence' => isset($data['confidence']) ? (int) $data['confidence'] : null,
                ];
            } catch (\Throwable $e) {
                throw new \RuntimeException('Emotion detection failed: '.$e->getMessage(), 0, $e);
            }
        }

        // Hugging Face fallback when no dedicated emotion API is configured.
        if ($this->huggingFaceApiKey) {
            try {
                $binary = $this->extractImageBinary($base64Image);
                $attempts = 0;
                $maxAttempts = 2; // one immediate try + one warmup retry
                $hfUrls = [
                    'https://router.huggingface.co/hf-inference/models/'.$this->huggingFaceModel,
                    'https://router.huggingface.co/models/'.$this->huggingFaceModel,
                    'https://api-inference.huggingface.co/models/'.$this->huggingFaceModel, // legacy fallback
                ];
                while ($attempts < $maxAttempts) {
                    $attempts++;
                    $url = $hfUrls[min($attempts - 1, count($hfUrls) - 1)];

                    $response = $this->http->request('POST', $url, [
                        'headers' => [
                            'Authorization' => 'Bearer '.$this->huggingFaceApiKey,
                            'Content-Type' => 'application/octet-stream',
                            'Accept' => 'application/json',
                        ],
                        'body' => $binary,
                        'timeout' => 20,
                        'http_errors' => false,
                    ]);

                    $status = $response->getStatusCode();
                    $rawBody = (string) $response->getBody();
                    $raw = json_decode($rawBody, true);

                    // Some models/providers expect JSON payload with "inputs" rather than raw bytes.
                    if (!is_array($raw) && $attempts < $maxAttempts) {
                        $responseJson = $this->http->request('POST', $url, [
                            'headers' => [
                                'Authorization' => 'Bearer '.$this->huggingFaceApiKey,
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                            ],
                            'body' => json_encode(['inputs' => base64_encode($binary)], JSON_THROW_ON_ERROR),
                            'timeout' => 20,
                            'http_errors' => false,
                        ]);
                        $status = $responseJson->getStatusCode();
                        $rawBody = (string) $responseJson->getBody();
                        $raw = json_decode($rawBody, true);
                    }

                    if (is_array($raw) && isset($raw['error']) && is_string($raw['error'])) {
                        $msg = strtolower($raw['error']);
                        if (str_contains($msg, 'currently loading') && $attempts < $maxAttempts) {
                            $waitSeconds = (int) ceil((float) ($raw['estimated_time'] ?? 8));
                            $waitSeconds = max(2, min(15, $waitSeconds));
                            usleep($waitSeconds * 1_000_000);
                            continue;
                        }
                        throw new \RuntimeException((string) $raw['error']);
                    }

                    if ($status >= 400) {
                        $error = is_array($raw) ? (string) ($raw['error'] ?? 'Hugging Face request failed.') : 'Hugging Face request failed.';
                        throw new \RuntimeException($error);
                    }

                    if (!is_array($raw)) {
                        $snippet = trim(substr($rawBody, 0, 180));
                        throw new \RuntimeException('Invalid Hugging Face JSON response. Raw: '.$snippet);
                    }

                    $predictions = $this->normalizeHfPredictions($raw);
                    if (empty($predictions)) {
                        throw new \RuntimeException('Invalid Hugging Face emotion payload.');
                    }

                    usort($predictions, static function (array $a, array $b): int {
                        return ($b['score'] ?? 0) <=> ($a['score'] ?? 0);
                    });
                    $top = $predictions[0];
                    $label = strtolower((string) ($top['label'] ?? 'neutral'));
                    $score = (float) ($top['score'] ?? 0.0);

                    return [
                        'emotion' => $this->normalizeEmotionLabel($label),
                        'intensity' => max(0, min(100, (int) round($score * 100))),
                        'confidence' => max(0, min(100, (int) round($score * 100))),
                    ];
                }
                throw new \RuntimeException('Hugging Face model is loading. Please retry.');
            } catch (GuzzleException|\Throwable $e) {
                throw new \RuntimeException('Hugging Face emotion detection failed: '.$e->getMessage(), 0, $e);
            }
        }

        throw new \RuntimeException('Emotion API not configured. Set EMOTION_API_URL or HUGGINGFACE_API_KEY.');
    }

    /**
     * Normalize Hugging Face outputs into an array of ['label' => string, 'score' => float].
     *
     * @param array<mixed> $raw
     * @return array<int, array{label:string, score:float}>
     */
    private function normalizeHfPredictions(array $raw): array
    {
        // Case 1: [{"label":"happy","score":0.9}, ...]
        if (isset($raw[0]) && is_array($raw[0]) && isset($raw[0]['label'])) {
            return array_values(array_filter(array_map(static function ($row) {
                if (!is_array($row) || !isset($row['label'])) {
                    return null;
                }
                return [
                    'label' => (string) $row['label'],
                    'score' => (float) ($row['score'] ?? 0.0),
                ];
            }, $raw)));
        }

        // Case 2: [[{"label":"happy","score":0.9}, ...]]
        if (isset($raw[0][0]) && is_array($raw[0][0]) && isset($raw[0][0]['label'])) {
            return $this->normalizeHfPredictions($raw[0]);
        }

        // Case 3: {"label":"happy","score":0.9}
        if (isset($raw['label'])) {
            return [[
                'label' => (string) $raw['label'],
                'score' => (float) ($raw['score'] ?? 0.0),
            ]];
        }

        // Case 4: {"happy":0.9,"sad":0.1}
        $assocScores = [];
        foreach ($raw as $k => $v) {
            if (is_string($k) && is_numeric($v)) {
                $assocScores[] = [
                    'label' => $k,
                    'score' => (float) $v,
                ];
            }
        }
        if (!empty($assocScores)) {
            return $assocScores;
        }

        return [];
    }

    private function extractImageBinary(string $dataUrl): string
    {
        if (str_contains($dataUrl, ',')) {
            [, $base64] = explode(',', $dataUrl, 2);
        } else {
            $base64 = $dataUrl;
        }
        $decoded = base64_decode($base64, true);
        if ($decoded !== false && $decoded !== '') {
            return $decoded;
        }
        // If payload is already raw bytes, keep it.
        if ($dataUrl !== '') {
            return $dataUrl;
        }
        throw new \RuntimeException('Invalid image payload.');
    }

    private function normalizeEmotionLabel(string $label): string
    {
        $l = strtolower(trim($label));
        if (preg_match('/^label[_\\s-]?(\\d+)$/i', $l, $m)) {
            $idx = (int) $m[1];
            return match ($idx) {
                0 => 'angry',
                1 => 'disgust',
                2 => 'fear',
                3 => 'happy',
                4 => 'sad',
                5 => 'surprise',
                6 => 'neutral',
                default => 'neutral',
            };
        }

        return match (true) {
            str_contains($l, 'ang') => 'angry',
            str_contains($l, 'sad') => 'sad',
            str_contains($l, 'happ') || str_contains($l, 'joy') => 'happy',
            str_contains($l, 'fear') => 'fear',
            str_contains($l, 'surpr') => 'surprise',
            str_contains($l, 'disgus') => 'disgust',
            str_contains($l, 'anx') => 'anxious',
            str_contains($l, 'neutral') || str_contains($l, 'calm') => 'neutral',
            default => $l !== '' ? $l : 'neutral',
        };
    }

    private function env(string $key): ?string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: null;
        if (!is_string($value)) {
            return null;
        }
        $trimmed = trim($value);
        return $trimmed === '' ? null : $trimmed;
    }

    /**
     * Create a full analysis report for a goal.
     * context may include 'emotion' and 'agePhase'
     */
    public function analyze(Goal $goal, array $context = []): array
    {
        $emotion = $context['emotion'] ?? null;
        $agePhase = $context['agePhase'] ?? null;

        $score = $goal->getSuccessScore() ?? 0;
        $risks = count($goal->getRisks());
        $milestones = count($goal->getMilestonesGoa());

        $report = [];
        $report['goal'] = [
            'id' => $goal->getIdGoa(),
            'title' => $goal->getTitleGoa(),
            'progress' => $goal->getProgressGoa(),
            'risks' => $risks,
            'milestones' => $milestones,
            'score' => $score,
        ];
        if ($emotion) {
            $report['emotion'] = $emotion;
        }
        if ($agePhase) {
            $report['agePhase'] = $agePhase;
        }

        // generate supportive message
        $advice = 'Continue to stay mindful and adjust your priorities as needed.';
        if ($emotion === 'sad' || $emotion === 'frustrated') {
            $advice = 'Take a short break, breathe deeply, and remember your past successes.';
        } elseif ($emotion === 'happy' || $emotion === 'joy') {
            $advice = 'Use this positive energy to push through the next milestone!';
        }
        $report['advice'] = $advice;

        // fetch Quran verses if we have emotion
        if ($emotion) {
            $report['verses'] = $this->quranService->getVersesForMood($emotion);
        }

        return $report;
    }
}
