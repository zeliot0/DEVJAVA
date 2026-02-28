<?php

namespace App\Service\ExternalApi;

use Psr\Log\LoggerInterface;

class PhoenixApiManager
{
    private $aiService;
    private $logger;

    public function __construct(
        PhoenixAiService $aiService,
        LoggerInterface $logger
    ) {
        $this->aiService = $aiService;
        $this->logger = $logger;
    }

    public function analyzeWithFallback(array $goalData): array
    {
        try {
            $this->logger->info("Calling Phoenix AI service");
            $analysis = $this->aiService->analyzeGoalDeath($goalData);
            if (!$this->isValidAnalysis($analysis)) {
                $this->logger->warning('Phoenix AI returned an invalid analysis payload. Falling back to local analysis.');
                return $this->getLocalAnalysis($goalData);
            }

            return $analysis;
        } catch (\Throwable $e) {
            $this->logger->error('Phoenix AI analysis failed: ' . $e->getMessage());
            return $this->getLocalAnalysis($goalData);
        }
    }

    private function isValidAnalysis(array $analysis): bool
    {
        return isset($analysis['death_analysis'], $analysis['phoenix_phases'])
            && is_array($analysis['death_analysis'])
            && is_array($analysis['phoenix_phases']);
    }

    private function getLocalAnalysis(array $goal): array
    {
        return [
            'death_analysis' => [
                'cause' => $this->detectLocalCause($goal),
                'ashes' => ['Experience gained', 'Lessons learned'],
                'lessons' => ['Track patterns', 'Start smaller next time']
            ],
            'phoenix_phases' => [
                'ashes' => [
                    'duration' => 'Week 1-2',
                    'actions' => ['Reflect on what happened']
                ],
                'spark' => [
                    'duration' => 'Week 3-4',
                    'actions' => ['Try one small step']
                ],
                'flame' => [
                    'duration' => 'Week 5-8',
                    'actions' => ['Build gradually']
                ],
                'risen' => [
                    'duration' => 'Week 9+',
                    'actions' => ['Rise with wisdom']
                ]
            ],
            'phoenix_wisdom' => 'Local wisdom: Start where you are, use what you have',
            'rebirth_strategy' => ['Take one action today']
        ];
    }

    private function detectLocalCause(array $goal): string
    {
        if (($goal['progress'] ?? 0) < 10) return 'Early abandonment - lost initial motivation';
        if (($goal['progress'] ?? 0) > 80) return 'Burned out near completion';
        return 'Lost momentum over time';
    }
}
