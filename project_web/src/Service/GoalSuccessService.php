<?php

namespace App\Service;

use App\Entity\Goal;

final class GoalSuccessService
{
    /** Compute a simple success probability based on available goal metrics */
    public function computeScore(Goal $goal): array
    {
        $progress = (int) ($goal->getProgressGoa() ?? 0);
        $timeLeftDays = null;
        try {
            $end = $goal->getDateFinalGoa();
            if ($end instanceof \DateTimeInterface) {
                $now = new \DateTimeImmutable('today');
                $timeLeftDays = (int) $now->diff($end)->format('%r%a');
            }
        } catch (\Throwable $e) {
            $timeLeftDays = null;
        }

        $riskCount = 0;
        // if goal has phoenix/resets we try to use them
        try {
            $phoenix = $goal->phoenixGoal ?? null;
            if ($phoenix) {
                $riskCount += ($phoenix->getPhoenixLevel() ?? 0) - 1;
            }
        } catch (\Throwable $e) {
        }

        $score = (int) round($progress * 0.6 + (100 - ($riskCount * 10)) * 0.3 + ($timeLeftDays !== null ? max(0, min(100, 50 - $timeLeftDays)) * 0.1 : 10));
        $score = max(0, min(100, $score));

        $riskPressure = $score >= 70 ? 'Low' : ($score >= 40 ? 'Medium' : 'High');
        $momentum = $progress >= 60 ? 'Strong' : ($progress >= 30 ? 'Moderate' : 'Weak');

        return [
            'score' => $score,
            'riskPressure' => $riskPressure,
            'momentum' => $momentum,
        ];
    }
}
