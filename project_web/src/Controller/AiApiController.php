<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/ai')]
final class AiApiController extends AbstractController
{
    #[Route('/description', name: 'api_ai_description', methods: ['POST'])]
    public function description(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $title = trim((string) ($payload['title'] ?? ''));
        $context = trim((string) ($payload['context'] ?? ''));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $description = sprintf(
            'Objectif: %s. Livrables attendus: implementation fonctionnelle, tests et verification finale.%s',
            $title,
            $context !== '' ? ' Contexte: ' . $context . '.' : ''
        );

        return $this->json([
            'ok' => true,
            'data' => ['description' => $description],
        ]);
    }

    #[Route('/analyze', name: 'api_ai_analyze', methods: ['POST'])]
    public function analyze(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];

        $title = trim((string) ($payload['title'] ?? ''));
        $description = trim((string) ($payload['description'] ?? ''));
        $priority = strtolower((string) ($payload['priority'] ?? 'med'));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $length = strlen($description);
        $complexity = $length > 240 ? 'high' : ($length > 120 ? 'medium' : 'low');
        $estimatedHours = $this->estimateHours($length, $priority);

        $suggestions = [
            'Definir un resultat mesurable pour la tache.',
            'Decouper en etapes courtes avec une verification a chaque etape.',
            'Ajouter un critere de validation avant passage en done.',
        ];

        return $this->json([
            'ok' => true,
            'data' => [
                'complexity' => $complexity,
                'estimatedHours' => $estimatedHours,
                'suggestions' => $suggestions,
            ],
        ]);
    }

    #[Route('/subtasks', name: 'api_ai_subtasks', methods: ['POST'])]
    public function subtasks(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $title = trim((string) ($payload['title'] ?? ''));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $subtasks = [
            'Analyser les besoins et les contraintes.',
            'Implementer la solution principale.',
            'Ecrire ou adapter les tests.',
            'Valider et documenter le resultat.',
        ];

        return $this->json([
            'ok' => true,
            'data' => [
                'title' => $title,
                'subtasks' => $subtasks,
            ],
        ]);
    }

    #[Route('/executions-summary', name: 'api_ai_executions_summary', methods: ['POST'])]
    public function executionsSummary(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $executions = $payload['executions'] ?? [];

        if (!is_array($executions)) {
            return $this->json(['error' => 'executions must be an array'], 422);
        }

        $count = count($executions);
        if ($count === 0) {
            return $this->json([
                'ok' => true,
                'data' => ['summary' => 'Aucune execution a resumer.'],
            ]);
        }

        $doneCount = 0;
        foreach ($executions as $execution) {
            $status = strtolower((string) ($execution['status'] ?? ''));
            if ($status === 'done') {
                $doneCount++;
            }
        }

        $summary = sprintf(
            '%d executions analysees, %d terminees. Progression en cours, prioriser les etapes bloquees.',
            $count,
            $doneCount
        );

        return $this->json([
            'ok' => true,
            'data' => ['summary' => $summary],
        ]);
    }

    #[Route('/estimate', name: 'api_ai_estimate', methods: ['POST'])]
    public function estimate(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $title = trim((string) ($payload['title'] ?? ''));
        $description = trim((string) ($payload['description'] ?? ''));
        $priority = strtolower((string) ($payload['priority'] ?? 'med'));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $hours = $this->estimateHours(strlen($description), $priority);
        $storyPoints = max(1, min(13, (int) ceil($hours / 2)));

        return $this->json([
            'ok' => true,
            'data' => [
                'estimatedHours' => $hours,
                'storyPoints' => $storyPoints,
            ],
        ]);
    }

    #[Route('/risk-score', name: 'api_ai_risk_score', methods: ['POST'])]
    public function riskScore(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];

        $description = trim((string) ($payload['description'] ?? ''));
        $priority = strtolower((string) ($payload['priority'] ?? 'med'));
        $dueAt = trim((string) ($payload['dueAt'] ?? ''));

        $score = 20;
        $score += min(35, (int) floor(strlen($description) / 15));
        $score += match ($priority) {
            'high' => 25,
            'low' => 5,
            default => 15,
        };

        if ($dueAt !== '') {
            try {
                $due = new \DateTimeImmutable($dueAt);
                $today = new \DateTimeImmutable('today');
                $days = (int) $today->diff($due)->format('%r%a');
                if ($days < 0) {
                    $score += 25;
                } elseif ($days <= 2) {
                    $score += 20;
                } elseif ($days <= 7) {
                    $score += 10;
                }
            } catch (\Throwable) {
                $score += 5;
            }
        }

        $score = max(0, min(100, $score));
        $level = $score >= 70 ? 'high' : ($score >= 40 ? 'medium' : 'low');

        return $this->json([
            'ok' => true,
            'data' => [
                'riskScore' => $score,
                'riskLevel' => $level,
            ],
        ]);
    }

    private function estimateHours(int $descriptionLength, string $priority): int
    {
        $base = max(1, (int) ceil($descriptionLength / 100));
        $multiplier = match ($priority) {
            'high' => 2,
            'low' => 1,
            default => 1.5,
        };

        return (int) max(1, ceil($base * $multiplier));
    }
}
