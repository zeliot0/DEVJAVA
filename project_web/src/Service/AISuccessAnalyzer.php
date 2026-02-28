<?php

namespace App\Service;

use App\Entity\Goal;
use GuzzleHttp\Client;

class AISuccessAnalyzer
{
    private Client $client;
    private string $apiKey;
    private string $provider;
    private ?string $providerUrl;

    public function __construct(?string $apiKey = null, ?string $provider = null, ?string $providerUrl = null)
    {
        $this->apiKey = $apiKey ?? getenv('AI_API_KEY');
        $this->provider = $provider ?? getenv('AI_PROVIDER') ?? 'openai';
        $this->providerUrl = $providerUrl ?? getenv('AI_PROVIDER_URL');
        $this->client = new Client();
    }

    /**
     * Analyze a Goal and return AI result array:
     * [ 'successScore' => int, 'level' => string, 'advice' => string, 'tech' => string ]
     */
    public function analyze(Goal $goal): array
    {
        $payload = [
            'description' => $goal->getDescriptionGoa(),
            'milestones_count' => count($goal->getMilestonesGoa()),
            'progress_percent' => (int)round($goal->getProgressGoa() ?? $goal->getCalculatedProgress() ?? 0),
            'active_risks' => count($goal->getRisks()),
            'abandon_history' => $goal->getRebirthCount(),
        ];

        // Try external provider if configured
        if ($this->providerUrl && $this->apiKey) {
            try {
                $resp = $this->client->post($this->providerUrl, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->apiKey,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => ['input' => $payload, 'type' => 'goal_success'],
                    'timeout' => 10,
                ]);

                $body = json_decode((string)$resp->getBody(), true);
                if (is_array($body) && isset($body['successScore'])) {
                    return [
                        'successScore' => (int)$body['successScore'],
                        'level' => $body['level'] ?? $this->scoreToLevel((int)$body['successScore']),
                        'advice' => $body['advice'] ?? '',
                        'tech' => $body['tech'] ?? $this->provider,
                    ];
                }
            } catch (\Throwable $e) {
                // silence and fallback to heuristic
            }
        }

        // Simple heuristic fallback
        $score = $this->heuristicScore($payload);
        return [
            'successScore' => $score,
            'level' => $this->scoreToLevel($score),
            'advice' => $this->generateAdvice($payload, $score),
            'tech' => 'guzzle/' . $this->provider,
        ];
    }

    private function heuristicScore(array $payload): int
    {
        $score = 50;
        $score += min(30, (int)$payload['progress_percent'] / 100 * 30);
        $score += min(10, max(0, (int)$payload['milestones_count']));
        $score -= min(30, (int)$payload['active_risks'] * 5);
        $score -= min(20, (int)$payload['abandon_history'] * 10);
        $score = max(0, min(100, (int)round($score)));
        return $score;
    }

    private function scoreToLevel(int $score): string
    {
        if ($score >= 80) return 'High';
        if ($score >= 40) return 'Medium';
        return 'Low';
    }

    private function generateAdvice(array $payload, int $score): string
    {
        if ($score >= 80) {
            return 'Continue current plan; focus on maintaining progress and monitoring risks.';
        }
        if ($score >= 40) {
            return 'Break milestones into smaller tasks and address the top risks quickly.';
        }
        return 'Re-evaluate scope, secure resources, and reduce major risks before continuing.';
    }
}
