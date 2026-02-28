<?php

namespace App\MessageHandler;

use App\Entity\Risk;
use App\Message\AnalyzeRiskMessage;
use App\Service\AI\RiskAIAnalyzer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class AnalyzeRiskHandler
{
    public function __construct(
        private EntityManagerInterface $em,
        private RiskAIAnalyzer $analyzer
    ) {}

    public function __invoke(AnalyzeRiskMessage $message)
    {
        $risk = $this->em->getRepository(Risk::class)->find($message->riskId);
        if (!$risk) {
            return;
        }

        try {
            $result = $this->analyzer->analyzeRisk($risk);
            $score = isset($result['failure_probability']) ? (float) $result['failure_probability'] : null;
            $risk->setAiScore($score !== null ? max(0, min(100, $score)) : null);
            $risk->setAiAdvice((string) ($result['mitigation'] ?? ''));
            $risk->setAiCategory((string) ($result['category'] ?? ''));
            // recalc goal success score if goal still available
            $goal = $risk->getGoal();
            if ($goal) {
                // we cannot inject GoalSuccessService here easily so use repository lookup
                try {
                    // lazy create service via container workaround
                    /** @var \App\Service\GoalSuccessService $scaler */
                    $scaler = new \App\Service\GoalSuccessService();
                    $goal->setSuccessScore($scaler->computeScore($goal)['score']);
                } catch (\Throwable $e) {
                    // ignore if something fails
                }
            }
        } catch (\Throwable $e) {
            // silently ignore for now
        }

        $this->em->flush();
    }
}
