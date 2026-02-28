<?php

namespace App\Service\ExternalApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class PhoenixAiService
{
    private $httpClient;
    private $logger;
    private $apiKey;

    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->apiKey = $_ENV['OPENAI_API_KEY'] ?? null;
    }

    /**
     * Analyze why a goal failed and create resurrection plan
     */
    public function analyzeGoalDeath(array $goalData): array
    {
        try {
            if (!$this->apiKey || str_contains($this->apiKey, 'your-openai')) {
                throw new \RuntimeException('OPENAI_API_KEY is missing or placeholder.');
            }

            $prompt = $this->buildDeathAnalysisPrompt($goalData);
            
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
                            'content' => 'You are a Phoenix Goal Resurrection Coach. Analyze failed goals and create resurrection plans.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 1000
                ]
            ]);

            $content = $response->toArray();
            $messageContent = $content['choices'][0]['message']['content'] ?? '{}';
            $analysis = json_decode($this->extractJson($messageContent), true);
            if (!is_array($analysis)) {
                throw new \RuntimeException('Phoenix AI returned non-JSON content.');
            }
            
            return $this->formatPhoenixAnalysis($analysis);
            
        } catch (\Throwable $e) {
            $this->logger->error('Phoenix AI analysis failed: ' . $e->getMessage());
            return $this->getFallbackAnalysis($goalData);
        }
    }

    private function buildDeathAnalysisPrompt(array $goal): string
    {
        return sprintf(
            'Analyze this failed goal and create a Phoenix Resurrection Plan:
            
            Goal Title: %s
            Description: %s
            Duration attempted: %s
            Last status: %s
            Progress: %s%%
            Notes: %s
            
            Provide analysis in JSON format with:
            - causeOfDeath: main reason it failed
            - ashesRemaining: what can be salvaged
            - lessons: key learnings
            - resurrectionPlan: array of phases (ashes, spark, flame, risen) with actions
            - phoenixWisdom: advice for others
            - rebirthStrategy: specific recommendations',
            $goal['title'] ?? 'Unknown',
            $goal['description'] ?? '',
            $goal['duration'] ?? 'unknown',
            $goal['status'] ?? 'abandoned',
            $goal['progress'] ?? 0,
            $goal['notes'] ?? ''
        );
    }

    private function formatPhoenixAnalysis(array $rawAnalysis): array
    {
        return [
            'death_analysis' => [
                'cause' => $rawAnalysis['causeOfDeath'] ?? 'Unknown',
                'ashes' => $rawAnalysis['ashesRemaining'] ?? [],
                'lessons' => $rawAnalysis['lessons'] ?? []
            ],
            'phoenix_phases' => [
                'ashes' => [
                    'duration' => 'Week 1-2',
                    'actions' => $rawAnalysis['resurrectionPlan']['ashes'] ?? [
                        'Accept grief',
                        'Honor what was learned',
                        'Visualize new approach'
                    ]
                ],
                'spark' => [
                    'duration' => 'Week 3-4',
                    'actions' => $rawAnalysis['resurrectionPlan']['spark'] ?? [
                        'Take first tiny step',
                        'Find support',
                        'Prevent repeating mistakes'
                    ]
                ],
                'flame' => [
                    'duration' => 'Week 5-8',
                    'actions' => $rawAnalysis['resurrectionPlan']['flame'] ?? [
                        'Build momentum slowly',
                        'Adopt new mindset',
                        'Celebrate small wins'
                    ]
                ],
                'risen' => [
                    'duration' => 'Week 9+',
                    'actions' => $rawAnalysis['resurrectionPlan']['risen'] ?? [
                        'Stronger than before',
                        'Share wisdom with others',
                        'Set enhanced goal'
                    ]
                ]
            ],
            'phoenix_wisdom' => $rawAnalysis['phoenixWisdom'] ?? 'Every failure is a phoenix waiting to rise',
            'rebirth_strategy' => $rawAnalysis['rebirthStrategy'] ?? []
        ];
    }

    private function getFallbackAnalysis(array $goal): array
    {
        $progress = (int) ($goal['progress'] ?? 0);
        $cause = 'Lost momentum over time';
        if ($progress < 10) {
            $cause = 'Early abandonment - momentum never formed';
        } elseif ($progress > 80) {
            $cause = 'Burned out close to completion';
        }

        return [
            'death_analysis' => [
                'cause' => $cause,
                'ashes' => ['Your passion', 'Your experience', 'Your resilience'],
                'lessons' => ['Every ending is a new beginning']
            ],
            'phoenix_phases' => [
                'ashes' => [
                    'duration' => 'Week 1-2',
                    'actions' => ['Accept and reflect', 'Gather your strength']
                ],
                'spark' => [
                    'duration' => 'Week 3-4',
                    'actions' => ['Take one small action today', 'Find one supporter']
                ],
                'flame' => [
                    'duration' => 'Week 5-8',
                    'actions' => ['Build consistency', 'Track progress']
                ],
                'risen' => [
                    'duration' => 'Week 9+',
                    'actions' => ['Rise stronger', 'Help others']
                ]
            ],
            'phoenix_wisdom' => 'The phoenix rises from its own ashes',
            'rebirth_strategy' => ['Start small', 'Be patient', 'Trust the process']
        ];
    }

    private function extractJson(string $content): string
    {
        $trimmed = trim($content);
        if (str_starts_with($trimmed, '{') && str_ends_with($trimmed, '}')) {
            return $trimmed;
        }

        if (preg_match('/\{.*\}/s', $trimmed, $matches)) {
            return $matches[0];
        }

        return '{}';
    }
}
