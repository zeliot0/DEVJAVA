<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Risk;
use Doctrine\ORM\EntityManagerInterface;

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
            "Tu es un architecte de productivite. DÃ©compose la tÃ¢che suivante en 5 Ã  7 sous-tÃ¢ches concrÃ¨tes et actionnables.\nTÃ¢che: %s\nRÃ©ponds uniquement avec une liste brute, une sous-tÃ¢che par ligne, sans chiffres ni tirets au dÃ©but.",
            $title
        );

        $gemini = $this->callGemini($httpClient, $model, $prompt);

        if (($gemini['ok'] ?? false) === true) {
            $lines = explode("\n", trim($gemini['text']));
            $subtasks = array_values(array_filter(array_map('trim', $lines)));
        } else {
            $subtasks = [
                'Analyser les besoins spÃ©cifiques de: ' . $title,
                'DÃ©finir les Ã©tapes clÃ©s de rÃ©alisation',
                'ExÃ©cuter le cÅ“ur du travail',
                'VÃ©rifier la qualitÃ© et finaliser',
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

        $prompt = "Tu es Nexa AI, un coach de haute performance. Voici mes tÃ¢ches pour aujourd'hui :\n" . $taskSummary .
            "\nAnalyse ma charge de travail et gÃ©nÃ¨re un 'Morning Brief' ultra-motivant de 3 phrases maximum. " .
            "Identifie la tÃ¢che avec le plus d'impact et suggÃ¨re un plan de bataille.";

        $gemini = $this->callGemini($httpClient, $model, $prompt);

        return $this->json([
            'ok' => true,
            'brief' => ($gemini['ok'] ?? false) ? $gemini['text'] : 'Une grande journÃ©e vous attend. Priorisez vos tÃ¢ches haute prioritÃ© et maintenez votre focus !',
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
            } catch (\Throwable $e) {
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

    #[Route('/risk/{id}/analyze', name: 'api_ai_risk_analyze', methods: ['POST'])]
    public function analyzeRisk(int $id, EntityManagerInterface $em, \App\Service\AI\RiskAIAnalyzer $analyzer): JsonResponse
    {
        $risk = $em->getRepository(Risk::class)->find($id);
        if (!$risk) {
            return $this->json(['error' => 'Risk not found'], 404);
        }

        try {
            $result = $analyzer->analyzeRisk($risk);
            $score = isset($result['failure_probability']) ? (float) $result['failure_probability'] : null;
            $risk->setAiScore($score !== null ? max(0, min(100, $score)) : null);
            $risk->setAiAdvice((string) ($result['mitigation'] ?? ''));
            $risk->setAiCategory((string) ($result['category'] ?? ''));
            $em->flush();
        } catch (\Throwable $e) {
            return $this->json(['error' => 'analysis_failed', 'details' => $e->getMessage()], 500);
        }

        return $this->json(['ok' => true, 'data' => [
            'aiScore' => $risk->getAiScore(),
            'aiAdvice' => $risk->getAiAdvice(),
            'aiCategory' => $risk->getAiCategory(),
        ]]);
    }

    #[Route('/goal/{id}/success', name: 'api_ai_goal_success', methods: ['GET'])]
    public function goalSuccess(int $id, EntityManagerInterface $em, \App\Service\GoalSuccessService $goalSuccessService): JsonResponse
    {
        $goal = $em->getRepository(\App\Entity\Goal::class)->find($id);
        if (!$goal) {
            return $this->json(['error' => 'Goal not found'], 404);
        }

        $data = $goalSuccessService->computeScore($goal);
        return $this->json(['ok' => true, 'data' => $data]);
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

        $apiKey = trim($apiKey, " \t\n\r\0\x0B\"'");

        // OpenRouter support
        if (str_starts_with($apiKey, 'sk-or-')) {
            return $this->callOpenRouter($httpClient, $model, $prompt, $apiKey);
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

    private function callOpenRouter(HttpClientInterface $httpClient, string $model, string $prompt, string $apiKey): array
    {
        $orModel = 'openrouter/free';

        if (str_contains($model, 'pro')) {
            $orModel = 'google/gemini-pro-1.5';
        }

        try {
            $response = $httpClient->request(
                'POST',
                'https://openrouter.ai/api/v1/chat/completions',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Content-Type' => 'application/json',
                        'HTTP-Referer' => 'http://localhost:8000',
                        'X-Title' => 'NEXA Workspace',
                    ],
                    'json' => [
                        'model' => $orModel,
                        'messages' => [
                            ['role' => 'user', 'content' => $prompt],
                        ],
                        'temperature' => 0.35,
                    ],
                    'timeout' => 25,
                ]
            );

            $data = $response->toArray(false);
            if (($response->getStatusCode() ?? 500) >= 400) {
                return [
                    'ok' => false,
                    'error' => 'openrouter_request_failed',
                    'provider' => $data,
                ];
            }

            $text = $data['choices'][0]['message']['content'] ?? null;
            if (!is_string($text) || trim($text) === '') {
                return [
                    'ok' => false,
                    'error' => 'openrouter_empty_output',
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
                'error' => 'openrouter_exception: ' . $e->getMessage(),
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

    #[Route('/chat', name: 'api_ai_chat', methods: ['POST'])]
    public function chat(Request $request, HttpClientInterface $httpClient, \Doctrine\ORM\EntityManagerInterface $em): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $prompt = trim((string) ($payload['prompt'] ?? ''));
        $model = trim((string) ($payload['model'] ?? 'gemini-1.5-flash'));

        if ($prompt === '') {
            return $this->json(['error' => 'prompt is required'], 422);
        }

        // 1. Build Global Context (Universal Knowledge)
        $taskRepo = $em->getRepository(\App\Entity\Task::class);
        $goalRepo = $em->getRepository(\App\Entity\Goal::class);
        $prodRepo = $em->getRepository(\App\Entity\Produit::class);

        $recentTasks = $taskRepo->findBy([], ['createAt' => 'DESC'], 10);
        $recentGoals = $goalRepo->findBy([], ['idGoa' => 'DESC'], 5);
        $recentProds = $prodRepo->findBy([], ['id_p' => 'DESC'], 5);

        $manifest = "WORKSPACE MANIFEST:\n\n";

        $manifest .= "TASKS:\n";
        foreach ($recentTasks as $t) {
            $manifest .= sprintf("- [ID:%d] %s | Statut: %s | Prio: %s\n", $t->getId(), $t->getTitle(), $t->getStatus(), $t->getPriority());
        }

        $manifest .= "\nGOALS (OBJECTIFS):\n";
        foreach ($recentGoals as $g) {
            $manifest .= sprintf("- [ID:%d] %s | ProgrÃ¨s: %d%%\n", $g->getIdGoa(), $g->getTitleGoa(), (int) $g->getProgressGoa());
        }

        $manifest .= "\nSTOCK (PRODUITS):\n";
        foreach ($recentProds as $p) {
            $manifest .= sprintf("- %s | QuantitÃ©: %d %s | Site: %s\n", $p->getNomP(), $p->getQuantiteStock(), $p->getUniteP(), $p->getEmplacement());
        }

        $systemPrompt = "You are NEXA AI, the Universal Agent of this workspace and a powerful General Assistant. 
You oversee Tasks, Goals, and Inventory, but you can also answer ANY general question (Weather, Date, History, Science, etc.).

Context:
- Current Date and Time: " . date('Y-m-d H:i:s') . "
- System: NEXA Workspace Management System

Linguistic Rules:
1. You MUST respond in the EXACT language of the user. 
2. If the user speaks Arabic, you MUST respond in Arabic (Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©).
3. Introduis-toi toujours comme 'NEXA Universal Agent'.

Operational Rules:
1. STRICT COMMAND RULE: Use the [NEXA_CMD] block ONLY for explicit database changes (create/update).
2. NO COMMANDS for general knowledge, greetings or general questions.
3. For weather (mÃ©tÃ©o), if you don't have real-time sensors, provide a helpful general response or use your knowledge to estimate based on the date/season, but always stay helpful.
4. Always be concise but premium in your tone.
5. For every database action, output exactly:
[NEXA_CMD]
{\"action\":\"create_task\",\"data\":{\"title\":\"...\",\"description\":\"...\",\"priority\":\"med\",\"status\":\"todo\"}}
[/NEXA_CMD]
6. Never output free-text commands like: create task: {...}

WORKSPACE MANIFEST:
" . $manifest . "\n\nUser Question: " . $prompt;

        $result = $this->callGemini($httpClient, $model, $systemPrompt);

        $responseText = $result['text'] ?? '';
        $actions = [];

        $hasMutation = false;

        // 2. Parse universal commands and execute if valid.
        $commandBlock = $this->extractNexaCommandBlock($responseText);
        if ($commandBlock !== null) {
            $responseText = trim(str_replace($commandBlock['raw'], '', $responseText));

            try {
                $command = $this->normalizeNexaCommand($commandBlock['payload']);
                if ($command !== null) {
                    $cmdData = $command['data'];

                    switch ($command['action']) {
                        case 'create_task':
                            $title = trim((string) ($cmdData['title'] ?? $cmdData['name'] ?? ''));
                            if (mb_strlen($title) < 3) {
                                $title = 'Nouvelle tache';
                            }

                            $task = new \App\Entity\Task();
                            $task->setTitle($title);
                            $task->setDescription((string) ($cmdData['description'] ?? $cmdData['desc'] ?? ''));
                            $task->setPriority($this->normalizeTaskPriority((string) ($cmdData['priority'] ?? 'med')));
                            $task->setStatus($this->normalizeTaskStatus((string) ($cmdData['status'] ?? 'todo')));

                            $dueAt = $this->parseTaskDueAt($cmdData['dueAt'] ?? $cmdData['due_date'] ?? null);
                            if ($dueAt !== null) {
                                $task->setDueAt($dueAt);
                            }

                            $em->persist($task);
                            $hasMutation = true;
                            $actions[] = 'Tache creee: ' . $task->getTitle();
                            break;

                        case 'update_task':
                            $taskId = (int) ($cmdData['id'] ?? $cmdData['task_id'] ?? 0);
                            $task = $taskRepo->find($taskId);

                            if (!$task) {
                                $actions[] = 'Tache introuvable (ID ' . $taskId . ').';
                                break;
                            }

                            if (isset($cmdData['title']) || isset($cmdData['name'])) {
                                $nextTitle = trim((string) ($cmdData['title'] ?? $cmdData['name'] ?? ''));
                                if (mb_strlen($nextTitle) >= 3) {
                                    $task->setTitle($nextTitle);
                                }
                            }
                            if (array_key_exists('description', $cmdData) || array_key_exists('desc', $cmdData)) {
                                $task->setDescription((string) ($cmdData['description'] ?? $cmdData['desc'] ?? ''));
                            }
                            if (isset($cmdData['status'])) {
                                $task->setStatus($this->normalizeTaskStatus((string) $cmdData['status']));
                            }
                            if (isset($cmdData['priority'])) {
                                $task->setPriority($this->normalizeTaskPriority((string) $cmdData['priority']));
                            }

                            $dueAt = $this->parseTaskDueAt($cmdData['dueAt'] ?? $cmdData['due_date'] ?? null);
                            if ($dueAt !== null) {
                                $task->setDueAt($dueAt);
                            }

                            $task->touch();
                            $hasMutation = true;
                            $actions[] = 'Tache mise a jour ID ' . $task->getId();
                            break;

                        case 'create_goal':
                            $goal = new \App\Entity\Goal();
                            $goal->setTitleGoa((string) ($cmdData['title'] ?? $cmdData['titleGoa'] ?? $cmdData['name'] ?? 'Nouvel Objectif'));
                            $goal->setDescriptionGoa((string) ($cmdData['description'] ?? $cmdData['desc'] ?? 'Description generee par IA'));
                            $goal->setCategoryGoa((string) ($cmdData['category'] ?? $cmdData['cat'] ?? 'General'));
                            $em->persist($goal);
                            $hasMutation = true;
                            $actions[] = 'Objectif cree: ' . $goal->getTitleGoa();
                            break;
                    }
                }
            } catch (\Throwable $e) {
                $actions[] = 'Erreur action: ' . $e->getMessage();
            }
        }

        if ($hasMutation) {
            $em->flush();
        }

        $finalText = trim($responseText);
        if ($finalText === '') {
            if (count($actions) > 0) {
                $finalText = 'Commande executee avec succes.';
            } elseif ($commandBlock !== null) {
                $finalText = 'Commande recue mais non executee.';
            } else {
                $finalText = $result['error'] ?? 'Systeme indisponible.';
            }
        }
        return $this->json([
            'ok' => $result['ok'] ?? false,
            'text' => $finalText,
            'action_performed' => count($actions) > 0,
            'actions_list' => $actions,
            'error_details' => $result['provider'] ?? null,
            'model' => $model,
        ]);
    }

    /**
     * @return array{raw: string, payload: string}|null
     */
    private function extractNexaCommandBlock(string $responseText): ?array
    {
        $patterns = [
            '/\[NEXA_CMD\](.*?)\[\/NEXA_CMD\]/is',
            '/\[NEXA_CMD:\s*(.*?)\]/is',
            '/\[NEXA_CMD\](.*)$/is',
        ];

        foreach ($patterns as $pattern) {
            $matches = [];
            if (preg_match($pattern, $responseText, $matches) === 1) {
                return [
                    'raw' => (string) $matches[0],
                    'payload' => trim((string) ($matches[1] ?? '')),
                ];
            }
        }

        return null;
    }

    /**
     * @return array{action: string, data: array<string, mixed>}|null
     */
    private function normalizeNexaCommand(string $payload): ?array
    {
        $clean = trim($payload);
        $clean = (string) (preg_replace('/^```(?:json)?\s*/i', '', $clean) ?? $clean);
        $clean = (string) (preg_replace('/\s*```$/', '', $clean) ?? $clean);
        $clean = trim($clean);

        $decoded = json_decode($clean, true);
        if (is_array($decoded)) {
            return $this->normalizeNexaCommandArray($decoded, $clean);
        }

        $jsonMatch = [];
        if (preg_match('/\{.*\}/s', $clean, $jsonMatch) !== 1) {
            return null;
        }

        $decodedPayload = json_decode($jsonMatch[0], true);
        if (!is_array($decodedPayload)) {
            return null;
        }

        $prefix = trim((string) strstr($clean, $jsonMatch[0], true));
        $action = $this->normalizeCommandAction($prefix);
        if ($action === null) {
            $action = $this->inferActionFromData($decodedPayload);
        }
        if ($action === null) {
            return null;
        }

        return [
            'action' => $action,
            'data' => $decodedPayload,
        ];
    }

    /**
     * @param array<string, mixed> $decoded
     * @return array{action: string, data: array<string, mixed>}|null
     */
    private function normalizeNexaCommandArray(array $decoded, string $raw): ?array
    {
        $action = $this->normalizeCommandAction((string) ($decoded['action'] ?? ''));
        $data = isset($decoded['data']) && is_array($decoded['data']) ? $decoded['data'] : $decoded;
        unset($data['action']);

        if ($action === null) {
            $action = $this->inferActionFromData($data);
        }
        if ($action === null) {
            $action = $this->normalizeCommandAction($raw);
        }
        if ($action === null) {
            return null;
        }

        return [
            'action' => $action,
            'data' => $data,
        ];
    }

    private function normalizeCommandAction(string $value): ?string
    {
        $action = strtolower(trim($value));
        if ($action === '') {
            return null;
        }

        $action = strtr($action, [
            'à' => 'a',
            'â' => 'a',
            'ç' => 'c',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'î' => 'i',
            'ï' => 'i',
            'ô' => 'o',
            'û' => 'u',
            'ù' => 'u',
        ]);
        $action = str_replace(['-', '_'], ' ', $action);
        $action = trim((string) (preg_replace('/\s+/', ' ', $action) ?? $action), " :");

        if (preg_match('/\b(create|add|new|creer|cree|ajouter)\b.*\b(task|tache)\b/', $action) === 1) {
            return 'create_task';
        }
        if (preg_match('/\b(update|edit|modifier|mettre a jour)\b.*\b(task|tache)\b/', $action) === 1) {
            return 'update_task';
        }
        if (preg_match('/\b(create|add|new|creer|cree|ajouter)\b.*\b(goal|objectif)\b/', $action) === 1) {
            return 'create_goal';
        }

        return match ($action) {
            'create_task', 'update_task', 'create_goal' => $action,
            default => null,
        };
    }

    /**
     * @param array<string, mixed> $data
     */
    private function inferActionFromData(array $data): ?string
    {
        if (isset($data['titleGoa']) || isset($data['category']) || isset($data['cat'])) {
            return 'create_goal';
        }

        if (isset($data['id']) && !isset($data['title']) && !isset($data['name']) && isset($data['status'])) {
            return 'update_task';
        }

        if (isset($data['title']) || isset($data['name']) || isset($data['description']) || isset($data['priority'])) {
            return 'create_task';
        }

        return null;
    }

    private function normalizeTaskPriority(string $priority): string
    {
        return match (strtolower(trim($priority))) {
            'high', 'haute', 'urgent' => 'high',
            'low', 'basse' => 'low',
            default => 'med',
        };
    }

    private function normalizeTaskStatus(string $status): string
    {
        return match (strtolower(trim($status))) {
            'doing', 'in_progress', 'in progress', 'encours', 'en cours' => 'doing',
            'done', 'completed', 'terminee', 'termine', 'finish', 'finished' => 'done',
            default => 'todo',
        };
    }

    private function parseTaskDueAt(mixed $value): ?\DateTimeImmutable
    {
        if (!is_string($value) || trim($value) === '') {
            return null;
        }

        try {
            return new \DateTimeImmutable(trim($value));
        } catch (\Throwable $e) {
            return null;
        }
    }



}

