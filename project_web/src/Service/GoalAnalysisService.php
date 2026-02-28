<?php

namespace App\Service;

use App\Entity\Goal;
use GuzzleHttp\Client;

class GoalAnalysisService
{
    private Client $client;
    private ?string $apiUrl;
    private ?string $apiKey;

    public function __construct(?string $apiUrl = null, ?string $apiKey = null)
    {
        $this->client = new Client();
        $this->apiUrl = $apiUrl ?? $this->env('GOAL_ANALYSIS_API_URL');
        $this->apiKey = $apiKey ?? $this->env('GOAL_ANALYSIS_API_KEY');
    }

    /**
     * Returns structured report from external AI or fallback.
     * [ 'successScore'=>int, 'blockers'=>string, 'risks'=>string, 'recommendations'=>array ]
     */
    public function analyze(Goal $goal): array
    {
        $payload = [
            'title' => $goal->getTitleGoa(),
            'description' => $goal->getDescriptionGoa(),
            'progress' => $goal->getProgressGoa(),
            'milestones' => count($goal->getMilestonesGoa()),
            'risks' => count($goal->getRisks()),
            'priority' => $goal->getPriorityGoa(),
            'deadline' => $goal->getDateFinalGoa()?->format('c'),
        ];

        // First try external API if configured.
        if ($this->apiUrl && $this->apiKey) {
            try {
                $response = $this->client->post($this->apiUrl, [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->apiKey,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $payload,
                    'timeout' => 15,
                ]);

                $data = json_decode((string) $response->getBody(), true);
                if (is_array($data)) {
                    return $data;
                }
            } catch (\Throwable $e) {
                // Ignore provider failure and continue to next strategy.
            }
        }

        // Then try OpenAI client if available.
        if (class_exists(\OpenAI::class)) {
            $openaiKey = $this->env('OPENAI_API_KEY');
            if ($openaiKey && !str_contains($openaiKey, 'your-openai')) {
                try {
                    $openai = \OpenAI::client($openaiKey);
                    $prompt = "Analyze the following goal data and return a JSON object containing:
- successScore (0-100),
- blockers (string),
- risks (string),
- recommendations (array of strings).\nData: ".json_encode($payload);

                    $resp = $openai->chat()->create([
                        'model' => 'gpt-4o-mini',
                        'messages' => [[
                            'role' => 'user',
                            'content' => $prompt,
                        ]],
                        'temperature' => 0.2,
                        'max_tokens' => 500,
                        'response_format' => ['type' => 'json_object'],
                    ]);

                    $text = $resp->choices[0]->message->content ?? '';
                    if (preg_match('/\{.*\}/s', $text, $m)) {
                        $json = json_decode($m[0], true);
                        if (is_array($json)) {
                            return $json;
                        }
                    }
                } catch (\Throwable $e) {
                    // Ignore provider failure and use local fallback.
                }
            }
        }

        return $this->fallback($goal);
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

    private function fallback(Goal $goal): array
    {
        $score = $goal->getProgressGoa() ?? 0;
        $blocks = [];
        if ($goal->getRisks()->count() > 0) {
            $blocks[] = 'Il existe des risques non analyses';
        }
        if ($goal->getDateFinalGoa() && $goal->getDateFinalGoa() < new \DateTime()) {
            $blocks[] = 'Date d\'echeance depassee';
        }

        $recs = [];
        if ($score < 50) {
            $recs[] = 'Revoir les jalons et reduire le perimetre.';
        }
        $recs[] = 'Surveiller les risques et ajuster la priorite.';

        return [
            'successScore' => $score,
            'blockers' => implode('; ', $blocks),
            'risks' => (string) count($goal->getRisks()),
            'recommendations' => $recs,
        ];
    }
}
