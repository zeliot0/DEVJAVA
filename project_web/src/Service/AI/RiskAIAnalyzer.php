<?php

namespace App\Service\AI;

use App\Entity\Risk;

class RiskAIAnalyzer
{
    public function __construct(
        private AIProviderInterface $aiProvider
    ) {}

    /**
     * Returns array with keys failure_probability (0-100), category, mitigation
     *
     * @param Risk $risk
     * @return array
     */
    public function analyzeRisk(Risk $risk): array
    {
        $goal = $risk->getGoal();
        $goalTitle = $goal ? $goal->getTitleGoa() : '';
        $prompt = "Goal: {$goalTitle}\n";
        $prompt .= "Motivation: " . ($goal?->getProgressGoa() ?? 0) . "\n";
        $prompt .= "Past failures: " . ($goal?->getPhoenixGoal()?->getPhoenixLevel() ?? 0) . "\n";
        $prompt .= "Risk: " . $risk->getDescription() . "\n\n";
        $prompt .= "Return JSON:\n";
        $prompt .= "{\n    failure_probability: number,\n    category: string,\n    mitigation: string\n}\n";

        $raw = $this->aiProvider->analyze($prompt);
        return $raw;
    }
}
