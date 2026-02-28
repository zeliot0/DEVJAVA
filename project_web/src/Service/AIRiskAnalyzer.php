<?php

namespace App\Service;

use App\Entity\Risk;
use GuzzleHttp\Client;

class AIRiskAnalyzer
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
     * Analyze a Risk and return array: [ 'riskScore'=>int(1-10), 'category'=>string, 'mitigation'=>string ]
     */
    public function analyze(Risk $risk): array
    {
        $payload = [
            'risk_description' => $risk->getDescription(),
            'goal_description' => $risk->getGoal()?->getDescriptionGoa(),
            'deadline' => $risk->getGoal()?->getDateFinalGoa()?->format('c') ?? null,
        ];

        if ($this->providerUrl && $this->apiKey) {
            try {
                $resp = $this->client->post($this->providerUrl, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->apiKey,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => ['input' => $payload, 'type' => 'risk_analysis'],
                    'timeout' => 10,
                ]);

                $body = json_decode((string)$resp->getBody(), true);
                if (is_array($body) && isset($body['riskScore'])) {
                    return [
                        'riskScore' => (int)$body['riskScore'],
                        'category' => $body['category'] ?? 'Unknown',
                        'mitigation' => $body['mitigation'] ?? '',
                    ];
                }
            } catch (\Throwable $e) {
                // fallback
            }
        }

        // Heuristic fallback
        $score = $this->heuristicRiskScore($payload);
        $category = $this->heuristicCategory($payload['risk_description'] ?? '');
        $mitigation = $this->generateMitigation($category, $score);

        return [
            'riskScore' => $score,
            'category' => $category,
            'mitigation' => $mitigation,
        ];
    }

    private function heuristicRiskScore(array $payload): int
    {
        $desc = strtolower($payload['risk_description'] ?? '');
        $score = 5;
        if (str_contains($desc, 'argent') || str_contains($desc, 'financ')) $score += 2;
        if (str_contains($desc, 'temps') || str_contains($desc, 'deadline')) $score += 2;
        if (str_contains($desc, 'motivat') || str_contains($desc, 'energie')) $score -= 1;
        $score = max(1, min(10, $score));
        return $score;
    }

    private function heuristicCategory(string $desc): string
    {
        $d = strtolower($desc);
        if (str_contains($d, 'argent') || str_contains($d, 'budget') || str_contains($d, 'financ')) return 'Financial';
        if (str_contains($d, 'motivat') || str_contains($d, 'motivation')) return 'Motivation';
        if (str_contains($d, 'temps') || str_contains($d, 'deadline') || str_contains($d, 'délai')) return 'Time';
        if (str_contains($d, 'compétence') || str_contains($d, 'skill') || str_contains($d, 'savoir')) return 'Skill';
        return 'Other';
    }

    private function generateMitigation(string $category, int $score): string
    {
        switch ($category) {
            case 'Financial':
                return 'Rebudget: reduce scope, seek funding or reallocate resources.';
            case 'Time':
                return 'Replan deadlines, slice milestones and prioritize critical tasks.';
            case 'Skill':
                return 'Train/team up with skilled resource or outsource the task.';
            case 'Motivation':
                return 'Set smaller wins, accountability and adjust scope to regain momentum.';
            default:
                return 'Review risk with the team and prepare contingency steps.';
        }
    }
}
