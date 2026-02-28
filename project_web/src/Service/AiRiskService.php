<?php

namespace App\Service;

use App\Entity\Risk;
use App\Service\AI\RiskAIAnalyzer;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

final class AiRiskService
{
    private RiskAIAnalyzer $analyzer;
    private EntityManagerInterface $em;
    private LoggerInterface $logger;

    public function __construct(RiskAIAnalyzer $analyzer, EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->analyzer = $analyzer;
        $this->em = $em;
        $this->logger = $logger;
    }

    /** Analyze a risk with an external AI and persist aiScore/aiAdvice */
    public function analyzeRisk(Risk $risk): Risk
    {
        try {
            $result = $this->analyzer->analyzeRisk($risk);
            $score = isset($result['failure_probability']) ? (float) $result['failure_probability'] : null;
            if ($score !== null) {
                $risk->setAiScore(max(0, min(100, $score)));
            }
            $risk->setAiAdvice((string) ($result['mitigation'] ?? ''));
            if (isset($result['category'])) {
                $risk->setAiCategory((string) $result['category']);
            }
            $this->em->persist($risk);
            $this->em->flush();
            return $risk;
        } catch (\Throwable $e) {
            $this->logger->warning('AiRiskService analysis error: '.$e->getMessage());
        }

        // fallback heuristic when analyzer fails
        $desc = (string)$risk->getDescription();
        $length = strlen($desc);
        $score = min(100, 20 + (int)floor($length / 12));
        $advice = "Mitigation suggeree: valider le marche, securiser un petit budget tampon et decouper l'objectif en MVP testables.";
        $risk->setAiScore((float)$score);
        $risk->setAiAdvice($advice);
        $this->em->persist($risk);
        $this->em->flush();
        return $risk;
    }
}
