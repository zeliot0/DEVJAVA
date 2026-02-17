<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/api/ai')]
final class AiApiController extends AbstractController
{
    #[Route('/description', name: 'api_ai_description', methods: ['POST'])]
    public function description(Request $request, HttpClientInterface $httpClient): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $title = trim((string) ($payload['title'] ?? ''));
        $context = trim((string) ($payload['context'] ?? ''));
        $priority = strtolower((string) ($payload['priority'] ?? 'med'));
        $dueAt = trim((string) ($payload['dueAt'] ?? ''));
        $model = trim((string) ($payload['model'] ?? 'gemini-2.0-flash'));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $geminiPrompt = $this->buildDescriptionPrompt($title, $context, $priority, $dueAt);
        $gemini = $this->callGemini($httpClient, $model, $geminiPrompt);

        if (($gemini['ok'] ?? false) === true && is_string($gemini['text'] ?? null)) {
            return $this->json([
                'ok' => true,
                'provider' => 'gemini',
                'model' => $model,
                'data' => [
                    'description' => $gemini['text'],
                ],
            ]);
        }

        $description = $this->generateSmartDescription($title, $context, $priority, $dueAt);

        return $this->json([
            'ok' => true,
            'provider' => 'smart-fallback',
            'data' => [
                'description' => $description,
                'meta' => [
                    'reason' => $gemini['error'] ?? 'gemini_not_configured',
                ],
            ],
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
    public function subtasks(Request $request, HttpClientInterface $httpClient): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $title = trim((string) ($payload['title'] ?? ''));
        $model = trim((string) ($payload['model'] ?? 'gemini-2.0-flash'));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $prompt = sprintf(
            "Tu es un architecte de productivite. Décompose la tâche suivante en 5 à 7 sous-tâches concrètes et actionnables.\nTâche: %s\nRéponds uniquement avec une liste brute, une sous-tâche par ligne, sans chiffres ni tirets au début.",
            $title
        );

        $gemini = $this->callGemini($httpClient, $model, $prompt);

        if (($gemini['ok'] ?? false) === true) {
            $lines = explode("\n", trim($gemini['text']));
            $subtasks = array_values(array_filter(array_map('trim', $lines)));
        } else {
            $subtasks = [
                'Analyser les besoins spécifiques de: ' . $title,
                'Définir les étapes clés de réalisation',
                'Exécuter le cœur du travail',
                'Vérifier la qualité et finaliser',
            ];
        }

        return $this->json([
            'ok' => true,
            'provider' => ($gemini['ok'] ?? false) ? 'gemini' : 'fallback',
            'data' => [
                'title' => $title,
                'subtasks' => $subtasks,
            ],
        ]);
    }

    #[Route('/morning-brief', name: 'api_ai_morning_brief', methods: ['POST'])]
    public function morningBrief(Request $request, HttpClientInterface $httpClient): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $tasks = $payload['tasks'] ?? [];
        $model = trim((string) ($payload['model'] ?? 'gemini-2.0-flash'));

        if (!is_array($tasks) || count($tasks) === 0) {
            return $this->json(['error' => 'No tasks provided'], 422);
        }

        $taskSummary = "";
        foreach ($tasks as $t) {
            $taskSummary .= sprintf("- %s (%s, %s)\n", $t['title'], $t['priority'], $t['status']);
        }

        $prompt = "Tu es Nexa AI, un coach de haute performance. Voici mes tâches pour aujourd'hui :\n" . $taskSummary .
            "\nAnalyse ma charge de travail et génère un 'Morning Brief' ultra-motivant de 3 phrases maximum. " .
            "Identifie la tâche avec le plus d'impact et suggère un plan de bataille.";

        $gemini = $this->callGemini($httpClient, $model, $prompt);

        return $this->json([
            'ok' => true,
            'brief' => ($gemini['ok'] ?? false) ? $gemini['text'] : 'Une grande journée vous attend. Priorisez vos tâches haute priorité et maintenez votre focus !',
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

    #[Route('/gemini-flash', name: 'api_ai_gemini_flash', methods: ['POST'])]
    public function geminiFlash(Request $request, HttpClientInterface $httpClient): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];

        $title = trim((string) ($payload['title'] ?? ''));
        $description = trim((string) ($payload['description'] ?? ''));
        $priority = strtolower((string) ($payload['priority'] ?? 'med'));
        $model = trim((string) ($payload['model'] ?? 'gemini-2.0-flash'));

        if ($title === '') {
            return $this->json(['error' => 'title is required'], 422);
        }

        $prompt = sprintf(
            "You are a task productivity assistant. Return JSON only with keys: summary,next_actions,risks.\nTitle: %s\nPriority: %s\nDescription: %s",
            $title,
            $priority,
            $description !== '' ? $description : 'No description provided.'
        );

        $result = $this->callGemini($httpClient, $model, $prompt);
        if (($result['ok'] ?? false) !== true) {
            return $this->json([
                'error' => 'Gemini call failed',
                'details' => $result['error'] ?? 'unknown_error',
                'provider' => $result['provider'] ?? null,
            ], 502);
        }

        return $this->json([
            'ok' => true,
            'provider' => 'gemini',
            'model' => $model,
            'data' => [
                'text' => $result['text'],
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

    private function callGemini(HttpClientInterface $httpClient, string $model, string $prompt): array
    {
        $apiKey = $_ENV['GEMINI_API_KEY'] ?? $_SERVER['GEMINI_API_KEY'] ?? '';
        if (!is_string($apiKey) || trim($apiKey) === '') {
            return ['ok' => false, 'error' => 'gemini_not_configured'];
        }

        try {
            $response = $httpClient->request(
                'POST',
                sprintf('https://generativelanguage.googleapis.com/v1beta/models/%s:generateContent?key=%s', rawurlencode($model), rawurlencode($apiKey)),
                [
                    'headers' => ['Content-Type' => 'application/json'],
                    'json' => [
                        'contents' => [
                            [
                                'parts' => [
                                    ['text' => $prompt],
                                ],
                            ],
                        ],
                        'generationConfig' => [
                            'temperature' => 0.35,
                            'maxOutputTokens' => 700,
                        ],
                    ],
                    'timeout' => 25,
                ]
            );

            $data = $response->toArray(false);
            if (($response->getStatusCode() ?? 500) >= 400) {
                return [
                    'ok' => false,
                    'error' => 'gemini_request_failed',
                    'provider' => $data,
                ];
            }

            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
            if (!is_string($text) || trim($text) === '') {
                return [
                    'ok' => false,
                    'error' => 'gemini_empty_output',
                    'provider' => $data,
                ];
            }

            return [
                'ok' => true,
                'text' => trim($text),
            ];
        } catch (\Throwable $e) {
            return [
                'ok' => false,
                'error' => 'gemini_exception: ' . $e->getMessage(),
            ];
        }
    }

    private function buildDescriptionPrompt(string $title, string $context, string $priority, string $dueAt): string
    {
        $deadline = $dueAt !== '' ? $dueAt : 'not defined';
        $ctx = $context !== '' ? $context : 'No extra context';

        return <<<PROMPT
You are a senior product manager and engineering lead.
Write a professional task description in French.
Output plain text only, no JSON.

Task title: {$title}
Priority: {$priority}
Deadline: {$deadline}
Context: {$ctx}

Format required:
1) Objectif (1 short paragraph)
2) Portee (2-4 bullet points)
3) Livrables (3-5 bullet points)
4) Criteres d'acceptation (3-5 measurable bullet points)
5) Risques et mitigations (2-3 bullet points)
6) Premiere action recommandee (1 sentence)

Keep it concrete, execution-focused, and measurable.
PROMPT;
    }

    private function generateSmartDescription(string $title, string $context, string $priority, string $dueAt): string
    {
        $priorityLabel = match ($priority) {
            'high' => 'haute',
            'low' => 'basse',
            default => 'moyenne',
        };

        $deliverables = [
            'Specification fonctionnelle validee',
            'Implementation principale finalisee',
            'Plan de tests execute et resultat documente',
        ];

        $lower = strtolower($title . ' ' . $context);
        if (str_contains($lower, 'api')) {
            $deliverables[] = 'Endpoints verifies avec gestion des erreurs et cas limites';
        }
        if (str_contains($lower, 'ui') || str_contains($lower, 'front') || str_contains($lower, 'design')) {
            $deliverables[] = 'Interface coherente, responsive et testee sur mobile/desktop';
        }
        if (str_contains($lower, 'doc')) {
            $deliverables[] = 'Documentation de livraison mise a jour';
        }

        $acceptance = [
            'Le resultat repond au besoin metier defini dans le titre.',
            'Les cas principaux et cas d erreur sont verifies.',
            'Aucune regression critique observee apres validation.',
        ];

        if ($dueAt !== '') {
            $acceptance[] = sprintf('La livraison est prete au plus tard le %s.', $dueAt);
        }

        $scope = [
            sprintf('Priorite %s avec execution orientee impact.', $priorityLabel),
            'Coordination des dependances avant implementation.',
            'Validation de la qualite avant cloture de la tache.',
        ];

        if ($context !== '') {
            $scope[] = 'Contexte pris en compte: ' . trim($context);
        }

        $risk = [
            'Risque: manque de clarte du besoin -> Mitigation: valider les attentes avant coding.',
            'Risque: delai serre -> Mitigation: livrer en lots incrementaux.',
        ];

        $lines = [];
        $lines[] = 'Objectif:';
        $lines[] = sprintf(
            'Executer "%s" de maniere fiable avec une livraison testee, mesurable et exploitable par l equipe.',
            $title
        );
        $lines[] = '';
        $lines[] = 'Portee:';
        foreach ($scope as $item) {
            $lines[] = '- ' . $item;
        }
        $lines[] = '';
        $lines[] = 'Livrables:';
        foreach (array_slice(array_unique($deliverables), 0, 5) as $item) {
            $lines[] = '- ' . $item;
        }
        $lines[] = '';
        $lines[] = "Criteres d'acceptation:";
        foreach (array_slice($acceptance, 0, 5) as $item) {
            $lines[] = '- ' . $item;
        }
        $lines[] = '';
        $lines[] = 'Risques et mitigations:';
        foreach ($risk as $item) {
            $lines[] = '- ' . $item;
        }
        $lines[] = '';
        $lines[] = 'Premiere action recommandee:';
        $lines[] = 'Clarifier la definition de fini et lancer un premier lot executable en moins de 90 minutes.';

        return implode("\n", $lines);
    }
}
