<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class QuranAiService
{
    private readonly HttpClientInterface $httpClient;
    private readonly LoggerInterface $logger;
    private readonly ?string $apiKey;

    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->apiKey = $_ENV['OPENAI_API_KEY'] ?? null;
    }

    /**
     * Generate Quranic verses based on mood for motivation
     */
    public function generateQuranicVerses(string $mood, int $count = 3): array
    {
        try {
            if (!$this->apiKey || str_contains($this->apiKey, 'your-openai')) {
                $this->logger->warning('OPENAI_API_KEY is missing or placeholder. Using fallback verses.');
                return $this->getFallbackVerses($mood, $count);
            }

            $prompt = $this->buildQuranPrompt($mood, $count);

            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are an Islamic scholar specializing in Quranic verse selection. Provide authentic Quranic verses (Ayat) that match the requested mood and purpose.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 1500
                ]
            ]);

            $content = $response->toArray();
            $messageContent = $content['choices'][0]['message']['content'] ?? '[]';
            $verses = json_decode($this->extractJson($messageContent), true);

            if (!is_array($verses)) {
                throw new \RuntimeException('AI returned non-JSON content.');
            }

            return $verses;

        } catch (\Throwable $e) {
            $this->logger->error('Quranic verses generation failed: ' . $e->getMessage());
            return $this->getFallbackVerses($mood, $count);
        }
    }

    /**
     * Get verses for a specific mood with AI enhancement
     */
    public function getVersesForMood(string $mood): array
    {
        $mood = strtolower(trim($mood));
        $moodMapping = [
            'sad' => 'sadness, grief, loss',
            'hope' => 'hope, perseverance, future',
            'grateful' => 'gratitude, blessing, thankfulness',
            'anxious' => 'peace, tranquility, trust',
            'motivated' => 'motivation, goal, achievement',
            'reflection' => 'reflection, knowledge, wisdom',
            'strength' => 'strength, courage, determination',
            'love' => 'love, compassion, kindness'
        ];

        $moodContext = $moodMapping[$mood] ?? $mood;
        return $this->generateQuranicVerses($moodContext, 5);
    }

    private function buildQuranPrompt(string $mood, int $count): string
    {
        return sprintf(
            'Please provide %d authentic Quranic verses (Ayat) related to: %s

            Format the response as a JSON array with each verse having:
            {
              "surah": "Surah Name",
              "verse_number": "X:Y",
              "arabic_text": "Arabic text of the verse",
              "english_translation": "English translation of the verse",
              "significance": "Brief explanation of why this verse is relevant",
              "reflection": "How this verse applies to the current mood"
            }

            Ensure the verses are:
            - Authentic and directly from the Quran
            - Relevant to the mood: %s
            - Inspiring and uplifting
            - Arranged from foundational to more advanced understanding
            
            Return ONLY valid JSON array, no additional text.',
            $count,
            $mood,
            $mood
        );
    }

    private function getFallbackVerses(string $mood, int $count): array
    {
        $fallbackVerses = [
            [
                'surah' => 'Surah Al-Duha',
                'verse_number' => '93:5-7',
                'arabic_text' => 'وَلَلْآخِرَةُ خَيْرٌ لَّكَ مِنَ الْأُولَىٰ',
                'english_translation' => 'And the Hereafter is better for you than the first life.',
                'significance' => 'Assurance that the future holds better things',
                'reflection' => 'A reminder that difficult times are temporary'
            ],
            [
                'surah' => 'Surah At-Tawbah',
                'verse_number' => '9:28',
                'arabic_text' => 'إِنَّ اللَّهَ مَعَ الصَّابِرِينَ',
                'english_translation' => 'Indeed, Allah is with the patient.',
                'significance' => 'Divine support for those who persevere',
                'reflection' => 'You are never alone in your struggles'
            ],
            [
                'surah' => 'Surah Al-Ankabut',
                'verse_number' => '29:5',
                'arabic_text' => 'فَإِنَّ مَعَ الْعُسْرِ يُسْرًا',
                'english_translation' => 'Indeed, with hardship comes ease.',
                'significance' => 'Promise that relief follows difficulty',
                'reflection' => 'Every challenge carries within it an opportunity'
            ],
            [
                'surah' => 'Surah Ash-Sharh',
                'verse_number' => '94:5-6',
                'arabic_text' => 'فَإِنَّ مَعَ الْعُسْرِ يُسْرًا إِنَّ مَعَ الْعُسْرِ يُسْرًا',
                'english_translation' => 'Verily, with hardship comes ease. Indeed, with hardship comes ease.',
                'significance' => 'Repetition emphasizes the certainty of relief',
                'reflection' => 'Trust that ease will come after difficulty'
            ],
            [
                'surah' => 'Surah Al-Quraish',
                'verse_number' => '106:1-4',
                'arabic_text' => 'لِإِيلَافِ قُرَيْشٍ',
                'english_translation' => 'For the familiarization of the Quraysh',
                'significance' => 'Recognition of divine care and providence',
                'reflection' => 'God takes care of the needs of His servants'
            ]
        ];

        return array_slice($fallbackVerses, 0, $count);
    }

    private function extractJson(string $text): string
    {
        // Try to find JSON in the text
        if (preg_match('/\[.*\]/s', $text, $matches)) {
            return $matches[0];
        }
        if (preg_match('/\{.*\}/s', $text, $matches)) {
            return $matches[0];
        }
        return '[]';
    }
}
