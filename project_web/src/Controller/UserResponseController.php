<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Task;
use App\Entity\Theme;
use App\Entity\UserResponse;
use App\Form\UserResponseType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserResponseController extends AbstractController
{
    #[Route('/question/{id}/answer', name: 'app_user_answer')]
    public function answer(
        Question $question,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        if (!$question->isActif()) {
            $this->addFlash('warning', 'Cette question est inactive.');

            return $this->redirectToRoute('app_theme_answer', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        $now = new \DateTimeImmutable();
        $answers = $this->currentWindowAnswersByQuestion([$question], $em, $now);

        if (isset($answers[$question->getId()])) {
            $this->addFlash('warning', 'Vous avez deja repondu pour cette periode.');

            return $this->redirectToRoute('app_theme_answer', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        $response = new UserResponse();
        $response->setQuestion($question);
        $response->setDate(new \DateTime($now->format('Y-m-d')));
        $response->setCreatedAt($now);

        $form = $this->createForm(UserResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($response);
            $em->flush();

            return $this->redirectToRoute('app_theme_rapport', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        return $this->render('user_response/answer.html.twig', [
            'form' => $form->createView(),
            'question' => $question,
        ]);
    }

    #[Route('/theme/{id}/answer', name: 'app_theme_answer', methods: ['GET', 'POST'])]
    public function answerByTheme(
        Theme $theme,
        Request $request,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): Response {
        $questions = $questionRepository->findActiveByThemeOrdered($theme);
        $now = new \DateTimeImmutable();
        $answers = $this->currentWindowAnswersByQuestion($questions, $em, $now);

        if ($request->isMethod('POST')) {
            $savedCount = 0;

            foreach ($questions as $question) {
                $questionId = $question->getId();
                if ($questionId === null || isset($answers[$questionId])) {
                    continue;
                }

                $value = $request->request->get('q' . $questionId);
                if (!is_scalar($value) || trim((string) $value) === '') {
                    continue;
                }

                $response = new UserResponse();
                $response->setQuestion($question);
                $response->setValeur(trim((string) $value));
                $response->setDate(new \DateTime($now->format('Y-m-d')));
                $response->setCreatedAt($now);

                $em->persist($response);
                $savedCount++;
            }

            if ($savedCount > 0) {
                $em->flush();
                $this->addFlash('success', sprintf('%d reponse(s) enregistree(s).', $savedCount));
            } else {
                $this->addFlash('info', 'Aucune nouvelle reponse a enregistrer pour cette periode.');
            }

            return $this->redirectToRoute('app_theme_rapport', [
                'id' => $theme->getIdT(),
            ]);
        }

        $answeredCount = count($answers);
        $pendingCount = max(0, count($questions) - $answeredCount);

        return $this->render('question/user/question/answer_by_theme.html.twig', [
            'theme' => $theme,
            'questions' => $questions,
            'answers' => $answers,
            'answeredCount' => $answeredCount,
            'pendingCount' => $pendingCount,
        ]);
    }

    #[Route('/theme/{id}/rapport', name: 'app_theme_rapport')]
    public function themeRapport(
        Theme $theme,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): Response {
        $analysis = $this->buildThemeAnalysis($theme, $em, $questionRepository);

        return $this->render('user_response/rapport.twig', [
            'theme' => $theme,
            'details' => $analysis['details'],
            'insights' => $analysis['insights'],
            'taskSuggestions' => $analysis['taskSuggestions'],
        ]);
    }

    #[Route('/theme/{id}/insights', name: 'app_theme_insights', methods: ['GET'])]
    public function themeInsights(
        Theme $theme,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): JsonResponse {
        $analysis = $this->buildThemeAnalysis($theme, $em, $questionRepository);

        return new JsonResponse($analysis['insights']);
    }

    #[Route('/theme/{id}/task-suggestions', name: 'app_theme_task_suggestions', methods: ['GET'])]
    public function themeTaskSuggestions(
        Theme $theme,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): JsonResponse {
        $analysis = $this->buildThemeAnalysis($theme, $em, $questionRepository);

        return new JsonResponse([
            'ok' => true,
            'data' => $analysis['taskSuggestions'],
        ]);
    }

    #[Route('/theme/{id}/task-suggestions/accept', name: 'app_theme_task_suggestion_accept', methods: ['POST'])]
    public function acceptThemeTaskSuggestion(
        Theme $theme,
        Request $request,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true) ?? [];
        $suggestionId = (string) ($payload['suggestionId'] ?? '');
        if ($suggestionId === '') {
            return new JsonResponse(['error' => 'suggestionId is required'], 422);
        }

        $analysis = $this->buildThemeAnalysis($theme, $em, $questionRepository);
        $suggestion = null;
        foreach ($analysis['taskSuggestions'] as $item) {
            if ((string) ($item['id'] ?? '') === $suggestionId) {
                $suggestion = $item;
                break;
            }
        }

        if ($suggestion === null) {
            return new JsonResponse(['error' => 'Suggestion introuvable'], 404);
        }

        $title = (string) ($suggestion['title'] ?? '');
        if ($title === '') {
            return new JsonResponse(['error' => 'Titre invalide'], 422);
        }

        $existing = $em->getRepository(Task::class)
            ->createQueryBuilder('t')
            ->andWhere('t.title = :title')
            ->andWhere('t.status != :done')
            ->setParameter('title', $title)
            ->setParameter('done', 'done')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($existing instanceof Task) {
            return new JsonResponse([
                'ok' => true,
                'created' => false,
                'message' => 'Une tache similaire existe deja.',
                'task' => $this->taskToArray($existing),
            ]);
        }

        $task = new Task();
        $task->setTitle($title);
        $task->setDescription((string) ($suggestion['description'] ?? ''));
        $task->setStatus($this->normalizeTaskStatus((string) ($suggestion['status'] ?? 'todo')));
        $task->setPriority($this->normalizeTaskPriority((string) ($suggestion['priority'] ?? 'med')));
        $dueAt = (string) ($suggestion['dueAt'] ?? '');
        if ($dueAt !== '') {
            try {
                $task->setDueAt(new \DateTimeImmutable($dueAt));
            } catch (\Throwable) {
                $task->setDueAt(null);
            }
        }
        $task->touch();

        $em->persist($task);
        $em->flush();

        return new JsonResponse([
            'ok' => true,
            'created' => true,
            'task' => $this->taskToArray($task),
        ], 201);
    }

    #[Route('/theme/{id}/rapport/pdf', name: 'app_theme_rapport_pdf')]
    public function themeRapportPdf(
        Theme $theme,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): Response {
        if (!class_exists(Dompdf::class) || !class_exists(Options::class)) {
            $this->addFlash('error', 'PDF: dompdf/dompdf n\'est pas installe. Execute: composer require dompdf/dompdf');

            return $this->redirectToRoute('app_theme_rapport', ['id' => $theme->getIdT()]);
        }

        $questions = $questionRepository->findActiveByThemeOrdered($theme);
        $responses = array_values($this->latestResponsesByQuestion($questions, $em));
        $details = $this->buildReportDetails($responses);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $html = $this->renderView('user_response/rapport_pdf.html.twig', [
            'theme' => $theme,
            'details' => $details,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        return new Response(
            $pdfContent,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="rapport-' . $theme->getNom() . '.pdf"',
            ]
        );
    }

    /**
     * @param Question[] $questions
     * @return array<int, UserResponse>
     */
    private function latestResponsesByQuestion(array $questions, EntityManagerInterface $em): array
    {
        $responsesByQuestion = $this->responsesByQuestion($questions, $em);
        $latestByQuestion = [];
        foreach ($responsesByQuestion as $questionId => $items) {
            if ($items === []) {
                continue;
            }
            $latestByQuestion[$questionId] = $items[0];
        }

        return $latestByQuestion;
    }

    /**
     * @param Question[] $questions
     * @return array<int, UserResponse[]>
     */
    private function responsesByQuestion(array $questions, EntityManagerInterface $em): array
    {
        if ($questions === []) {
            return [];
        }

        $responses = $em->getRepository(UserResponse::class)
            ->createQueryBuilder('r')
            ->andWhere('r.question IN (:questions)')
            ->setParameter('questions', $questions)
            ->orderBy('r.createdAt', 'DESC')
            ->addOrderBy('r.id_r', 'DESC')
            ->getQuery()
            ->getResult();

        $grouped = [];
        foreach ($responses as $response) {
            $questionId = $response->getQuestion()?->getId();
            if ($questionId === null) {
                continue;
            }
            $grouped[$questionId] ??= [];
            $grouped[$questionId][] = $response;
        }

        return $grouped;
    }

    /**
     * @param Question[] $questions
     * @return array<int, UserResponse>
     */
    private function currentWindowAnswersByQuestion(
        array $questions,
        EntityManagerInterface $em,
        \DateTimeImmutable $now
    ): array {
        $latestByQuestion = $this->latestResponsesByQuestion($questions, $em);
        $answers = [];

        foreach ($questions as $question) {
            $questionId = $question->getId();
            if ($questionId === null || !isset($latestByQuestion[$questionId])) {
                continue;
            }

            $latestResponse = $latestByQuestion[$questionId];
            $responseDate = $latestResponse->getDate();
            if ($responseDate === null) {
                continue;
            }

            $windowStart = $this->getWindowStart($question->getFrequence() ?? 'quotidienne', $now);
            $responseDateImmutable = \DateTimeImmutable::createFromMutable($responseDate)->setTime(0, 0);

            if ($responseDateImmutable >= $windowStart) {
                $answers[$questionId] = $latestResponse;
            }
        }

        return $answers;
    }

    private function getWindowStart(string $frequence, \DateTimeImmutable $reference): \DateTimeImmutable
    {
        $today = $reference->setTime(0, 0);

        return match ($frequence) {
            'hebdomadaire' => $today->modify('monday this week'),
            'mensuelle' => $today->modify('first day of this month'),
            default => $today,
        };
    }

    /**
     * @param UserResponse[] $responses
     * @return array<int, array<string, mixed>>
     */
    private function buildReportDetails(array $responses): array
    {
        $details = [];

        foreach ($responses as $response) {
            $question = $response->getQuestion();
            if ($question === null) {
                continue;
            }

            $value = $response->getValeur();
            $ideal = $question->getValeurIdeale();

            $ok = null;
            $advice = 'Information utile pour votre suivi.';
            $gap = null;
            $gapPercent = null;

            if ($question->getTypeReponse() === 'number' && $ideal !== null && is_numeric((string) $value)) {
                $ok = (float) $value >= (float) $ideal;
                $gap = (float) $value - (float) $ideal;
                $gapPercent = (float) $ideal !== 0.0
                    ? (($gap / (float) $ideal) * 100.0)
                    : null;
                $advice = $ok
                    ? 'Bonne habitude maintenue.'
                    : 'A ameliorer pour atteindre la cible.';
            }

            if ($question->getTypeReponse() === 'boolean') {
                $ok = $value === '1';
                $advice = $ok
                    ? 'Bonne habitude maintenue.'
                    : 'A ameliorer: cette reponse indique un risque.';
            }

            $details[] = [
                'questionId' => $question->getId(),
                'question' => $question->getTexte(),
                'type' => $question->getTypeReponse(),
                'value' => $value,
                'ideal' => $ideal,
                'unite' => $question->getUnite(),
                'ok' => $ok,
                'advice' => $advice,
                'date' => $response->getCreatedAt(),
                'niveau' => $question->getNiveau(),
                'genereTache' => $question->isGenereTache(),
                'frequence' => $question->getFrequence(),
                'gap' => $gap,
                'gapPercent' => $gapPercent,
            ];
        }

        return $details;
    }

    /**
     * @param array<int, array<string, mixed>> $details
     * @return array<string, mixed>
     */
    private function buildSmartInsights(array $details, int $totalQuestions, array $responsesByQuestion): array
    {
        $totalResponses = count($details);
        $good = 0;
        $warn = 0;
        $neutral = 0;
        $recommendations = [];
        $strengths = [];
        $alerts = [];

        $weightMap = [
            'tres_faible' => 1,
            'faible' => 2,
            'moyen' => 3,
            'eleve' => 4,
            'critique' => 5,
        ];

        $weightedObtained = 0.0;
        $weightedMax = 0.0;
        $weightedRisk = 0.0;
        $freshnessAccumulator = 0;
        $consistencyAccumulator = 0.0;
        $confidenceKnown = 0;
        $confidenceTotal = 0;
        $trend = [
            'up' => 0,
            'down' => 0,
            'flat' => 0,
            'unknown' => 0,
        ];

        foreach ($details as $item) {
            $ok = $item['ok'] ?? null;
            $niveau = (string) ($item['niveau'] ?? 'moyen');
            $weight = (float) ($weightMap[$niveau] ?? 3);
            $weightedMax += $weight;

            if ($ok === true) {
                $good++;
                $weightedObtained += $weight;
                $strengths[] = $this->buildStrength($item);
            } elseif ($ok === false) {
                $warn++;
                $weightedRisk += $weight;
                $recommendations[] = $this->buildRecommendation($item);
                $alerts[] = $this->buildAlert($item);
            } else {
                $neutral++;
                $weightedObtained += $weight * 0.6;
            }

            $questionId = (int) ($item['questionId'] ?? 0);
            $history = $responsesByQuestion[$questionId] ?? [];
            $trendSignal = $this->detectTrend($item, $history);
            $trend[$trendSignal]++;

            $freshnessAccumulator += $this->freshnessPoints($item);
            $consistencyAccumulator += $this->consistencyPoints($trendSignal, $ok);
            $confidenceTotal++;
            if (count($history) >= 2) {
                $confidenceKnown++;
            }
        }

        usort($recommendations, fn (array $a, array $b): int => ($b['priority'] ?? 0) <=> ($a['priority'] ?? 0));
        $recommendations = array_slice($recommendations, 0, 4);
        usort($alerts, fn (array $a, array $b): int => ($b['priority'] ?? 0) <=> ($a['priority'] ?? 0));
        $alerts = array_slice($alerts, 0, 3);
        $strengths = array_slice($strengths, 0, 3);

        $score = $totalResponses > 0 ? (int) round(($good / $totalResponses) * 100) : 0;
        $completionRate = $totalQuestions > 0 ? (int) round(($totalResponses / $totalQuestions) * 100) : 0;
        $pending = max(0, $totalQuestions - $totalResponses);
        $weightedScore = $weightedMax > 0 ? (int) round(($weightedObtained / $weightedMax) * 100) : 0;
        $riskIndex = $weightedMax > 0 ? (int) round((($weightedRisk + ($pending * 2)) / ($weightedMax + ($totalQuestions * 2))) * 100) : 0;
        $freshnessScore = $totalResponses > 0 ? (int) round($freshnessAccumulator / $totalResponses) : 0;
        $consistencyScore = $totalResponses > 0 ? (int) round($consistencyAccumulator / $totalResponses) : 0;
        $confidenceScore = $confidenceTotal > 0 ? (int) round(($confidenceKnown / $confidenceTotal) * 100) : 0;

        $momentum = 'Demarrage';
        if ($weightedScore >= 85 && $trend['down'] === 0) {
            $momentum = 'Excellent';
        } elseif ($weightedScore >= 70) {
            $momentum = 'Stable';
        } elseif ($weightedScore >= 50) {
            $momentum = 'Fragile';
        } elseif ($weightedScore > 0) {
            $momentum = 'Critique';
        }

        if ($recommendations === [] && $totalResponses > 0) {
            $recommendations[] = [
                'title' => 'Constance',
                'message' => 'Maintenez ces habitudes et continuez a repondre regulierement.',
                'priority' => 1,
            ];
        }

        if ($pending > 0) {
            $recommendations[] = [
                'title' => 'Questions en attente',
                'message' => sprintf('Il reste %d question(s) active(s) sans reponse recente.', $pending),
                'priority' => 5,
            ];
        }

        if ($trend['down'] > $trend['up']) {
            $recommendations[] = [
                'title' => 'Trend negatif detecte',
                'message' => 'Plusieurs indicateurs se degradent par rapport aux reponses precedentes. Prioriser un plan de correction cette semaine.',
                'priority' => 6,
            ];
        }

        $summary = $this->buildExecutiveSummary($weightedScore, $riskIndex, $completionRate, $momentum, $trend);
        $maturityLevel = $this->determineMaturityLevel(
            $weightedScore,
            $riskIndex,
            $freshnessScore,
            $consistencyScore,
            $completionRate
        );
        $actionPlan = $this->buildActionPlan($recommendations, $alerts, $strengths, $pending, $trend);

        return [
            'totalQuestions' => $totalQuestions,
            'totalResponses' => $totalResponses,
            'pending' => $pending,
            'good' => $good,
            'warn' => $warn,
            'neutral' => $neutral,
            'score' => $score,
            'weightedScore' => $weightedScore,
            'riskIndex' => $riskIndex,
            'freshnessScore' => $freshnessScore,
            'consistencyScore' => $consistencyScore,
            'confidenceScore' => $confidenceScore,
            'completionRate' => $completionRate,
            'momentum' => $momentum,
            'maturityLevel' => $maturityLevel,
            'trend' => $trend,
            'summary' => $summary,
            'strengths' => $strengths,
            'alerts' => $alerts,
            'recommendations' => $recommendations,
            'actionPlan' => $actionPlan,
        ];
    }

    /**
     * @param array<string, mixed> $item
     * @return array<string, mixed>
     */
    private function buildStrength(array $item): array
    {
        return [
            'title' => 'Point fort',
            'message' => sprintf('Bonne execution sur "%s".', (string) ($item['question'] ?? '')),
        ];
    }

    /**
     * @param array<string, mixed> $item
     * @return array<string, mixed>
     */
    private function buildAlert(array $item): array
    {
        $niveau = (string) ($item['niveau'] ?? 'moyen');
        $priorityMap = [
            'tres_faible' => 1,
            'faible' => 2,
            'moyen' => 3,
            'eleve' => 4,
            'critique' => 5,
        ];

        return [
            'title' => 'Alerte prioritaire',
            'message' => sprintf('Risque detecte sur "%s".', (string) ($item['question'] ?? '')),
            'priority' => $priorityMap[$niveau] ?? 3,
        ];
    }

    /**
     * @param array<string, mixed> $item
     * @param UserResponse[] $history
     */
    private function detectTrend(array $item, array $history): string
    {
        if (count($history) < 2) {
            return 'unknown';
        }

        $latest = $history[0]->getValeur();
        $previous = $history[1]->getValeur();
        $type = (string) ($item['type'] ?? '');
        $ideal = $item['ideal'] ?? null;

        if ($type === 'number' && is_numeric((string) $latest) && is_numeric((string) $previous) && $ideal !== null) {
            $latestGap = abs((float) $ideal - (float) $latest);
            $previousGap = abs((float) $ideal - (float) $previous);

            if ($latestGap < $previousGap) {
                return 'up';
            }
            if ($latestGap > $previousGap) {
                return 'down';
            }

            return 'flat';
        }

        if ($type === 'boolean') {
            $latestOk = $latest === '1';
            $previousOk = $previous === '1';
            if ($latestOk && !$previousOk) {
                return 'up';
            }
            if (!$latestOk && $previousOk) {
                return 'down';
            }

            return 'flat';
        }

        return 'unknown';
    }

    /**
     * @param array<string, int> $trend
     */
    private function buildExecutiveSummary(
        int $weightedScore,
        int $riskIndex,
        int $completionRate,
        string $momentum,
        array $trend
    ): string {
        return sprintf(
            'Score qualite %d%%, risque %d%%, couverture %d%%. Momentum %s (up:%d, down:%d).',
            $weightedScore,
            $riskIndex,
            $completionRate,
            $momentum,
            (int) ($trend['up'] ?? 0),
            (int) ($trend['down'] ?? 0)
        );
    }

    /**
     * @param array<string, mixed> $item
     */
    private function freshnessPoints(array $item): int
    {
        $date = $item['date'] ?? null;
        if (!$date instanceof \DateTimeInterface) {
            return 0;
        }

        $now = new \DateTimeImmutable();
        $days = (int) $date->diff($now)->format('%a');

        if ($days <= 1) {
            return 100;
        }
        if ($days <= 3) {
            return 85;
        }
        if ($days <= 7) {
            return 70;
        }
        if ($days <= 14) {
            return 50;
        }

        return 30;
    }

    private function consistencyPoints(string $trendSignal, ?bool $ok): float
    {
        return match ($trendSignal) {
            'up' => 95.0,
            'flat' => $ok === true ? 80.0 : 60.0,
            'down' => 35.0,
            default => $ok === true ? 75.0 : 55.0,
        };
    }

    private function determineMaturityLevel(
        int $weightedScore,
        int $riskIndex,
        int $freshnessScore,
        int $consistencyScore,
        int $completionRate
    ): string {
        $composite = (int) round(
            ($weightedScore * 0.35)
            + ((100 - $riskIndex) * 0.25)
            + ($freshnessScore * 0.15)
            + ($consistencyScore * 0.15)
            + ($completionRate * 0.10)
        );

        if ($composite >= 85) {
            return 'Optimise';
        }
        if ($composite >= 70) {
            return 'Maitrise';
        }
        if ($composite >= 55) {
            return 'En progression';
        }

        return 'A renforcer';
    }

    /**
     * @param array<int, array<string, mixed>> $recommendations
     * @param array<int, array<string, mixed>> $alerts
     * @param array<int, array<string, mixed>> $strengths
     * @param array<string, int> $trend
     * @return array<string, array<int, array<string, string>>>
     */
    private function buildActionPlan(
        array $recommendations,
        array $alerts,
        array $strengths,
        int $pending,
        array $trend
    ): array {
        $immediate = [];
        $weekly = [];
        $strategic = [];

        foreach ($alerts as $alert) {
            $immediate[] = [
                'title' => (string) ($alert['title'] ?? 'Alerte'),
                'action' => (string) ($alert['message'] ?? ''),
            ];
        }

        if ($pending > 0) {
            $immediate[] = [
                'title' => 'Couverture incomplete',
                'action' => sprintf('Completer %d reponse(s) manquante(s) pour fiabiliser l\'analyse.', $pending),
            ];
        }

        foreach ($recommendations as $recommendation) {
            $weekly[] = [
                'title' => (string) ($recommendation['title'] ?? 'Action hebdo'),
                'action' => (string) ($recommendation['message'] ?? ''),
            ];
        }

        if (($trend['down'] ?? 0) > 0) {
            $strategic[] = [
                'title' => 'Stabiliser la tendance',
                'action' => 'Mettre en place un rituel de revue hebdomadaire des indicateurs en baisse.',
            ];
        }

        if ($strengths !== []) {
            $strategic[] = [
                'title' => 'Capitaliser sur les points forts',
                'action' => 'Standardiser les bonnes pratiques detectees et les reproduire sur les axes faibles.',
            ];
        }

        if ($strategic === []) {
            $strategic[] = [
                'title' => 'Amelioration continue',
                'action' => 'Maintenir le suivi et ajuster les objectifs a la hausse progressivement.',
            ];
        }

        return [
            'immediate' => array_slice($immediate, 0, 3),
            'weekly' => array_slice($weekly, 0, 4),
            'strategic' => array_slice($strategic, 0, 3),
        ];
    }

    /**
     * @param array<string, mixed> $item
     * @return array<string, mixed>
     */
    private function buildRecommendation(array $item): array
    {
        $niveau = (string) ($item['niveau'] ?? 'moyen');
        $priorityMap = [
            'tres_faible' => 1,
            'faible' => 2,
            'moyen' => 3,
            'eleve' => 4,
            'critique' => 5,
        ];

        $priority = $priorityMap[$niveau] ?? 3;
        if (($item['genereTache'] ?? false) === true) {
            $priority += 2;
        }

        $title = 'Action recommandee';
        $message = (string) ($item['question'] ?? 'Question');
        $type = (string) ($item['type'] ?? '');
        $ideal = $item['ideal'] ?? null;
        $unit = trim((string) ($item['unite'] ?? ''));

        if ($type === 'number' && $ideal !== null) {
            $title = 'Objectif numerique';
            $message = sprintf(
                'Monter la valeur vers %s%s pour "%s".',
                (string) $ideal,
                $unit !== '' ? ' ' . $unit : '',
                (string) ($item['question'] ?? '')
            );
        } elseif ($type === 'boolean') {
            $title = 'Habitude a corriger';
            $message = sprintf('Transformer cette reponse en "Oui": "%s".', (string) ($item['question'] ?? ''));
        } elseif ($type === 'text') {
            $title = 'Reflection guidee';
            $message = sprintf('Definir une action concrete suite a "%s".', (string) ($item['question'] ?? ''));
        }

        return [
            'title' => $title,
            'message' => $message,
            'priority' => $priority,
        ];
    }

    /**
     * @return array{details: array<int, array<string, mixed>>, insights: array<string, mixed>, taskSuggestions: array<int, array<string, mixed>>}
     */
    private function buildThemeAnalysis(
        Theme $theme,
        EntityManagerInterface $em,
        QuestionRepository $questionRepository
    ): array {
        $questions = $questionRepository->findActiveByThemeOrdered($theme);
        $responsesByQuestion = $this->responsesByQuestion($questions, $em);

        $responses = [];
        foreach ($responsesByQuestion as $items) {
            if ($items !== []) {
                $responses[] = $items[0];
            }
        }

        $details = $this->buildReportDetails($responses);
        $insights = $this->buildSmartInsights($details, count($questions), $responsesByQuestion);
        $taskSuggestions = $this->buildReportTaskSuggestions($theme, $insights, $details);

        return [
            'details' => $details,
            'insights' => $insights,
            'taskSuggestions' => $taskSuggestions,
        ];
    }

    /**
     * @param array<string, mixed> $insights
     * @return array<int, array<string, mixed>>
     */
    private function buildReportTaskSuggestions(Theme $theme, array $insights, array $details): array
    {
        $today = new \DateTimeImmutable('today');
        $themeName = trim((string) ($theme->getNom() ?? 'Conscience'));
        $suggestions = [];

        foreach ($details as $idx => $item) {
            if (($item['ok'] ?? null) !== false) {
                continue;
            }

            $question = trim((string) ($item['question'] ?? 'Question'));
            $type = (string) ($item['type'] ?? '');
            $value = (string) ($item['value'] ?? '');
            $ideal = $item['ideal'] ?? null;
            $unite = trim((string) ($item['unite'] ?? ''));

            $description = sprintf('Corriger "%s" a partir de la derniere reponse.', $question);
            $evidence = sprintf('Reponse actuelle: %s.', $value !== '' ? $value : 'vide');

            if ($type === 'number' && $ideal !== null) {
                $description = sprintf(
                    'Passer de %s%s vers %s%s pour "%s".',
                    $value,
                    $unite !== '' ? ' ' . $unite : '',
                    (string) $ideal,
                    $unite !== '' ? ' ' . $unite : '',
                    $question
                );
                $evidence = sprintf(
                    'Numerique sous objectif: reponse=%s%s, objectif=%s%s.',
                    $value,
                    $unite !== '' ? ' ' . $unite : '',
                    (string) $ideal,
                    $unite !== '' ? ' ' . $unite : ''
                );
            } elseif ($type === 'boolean') {
                $description = sprintf('Transformer la reponse en "Oui" pour "%s".', $question);
                $evidence = sprintf('Boolean defavorable detecte: reponse=%s.', $value === '1' ? 'Oui' : 'Non');
            }

            $suggestions[] = $this->makeReportTaskSuggestion(
                'resp-' . $idx,
                $theme,
                sprintf('[%s] Corriger: %s', $themeName, mb_substr($question, 0, 50)),
                $description,
                'high',
                'todo',
                $today->modify('+1 day'),
                $evidence
            );
        }

        $pending = (int) ($insights['pending'] ?? 0);
        if ($pending > 0) {
            $suggestions[] = $this->makeReportTaskSuggestion(
                'pending',
                $theme,
                sprintf('[%s] Completer %d reponse(s) manquante(s)', $themeName, $pending),
                'Completer les reponses restantes pour augmenter la fiabilite du rapport et debloquer les recommandations.',
                'high',
                'todo',
                $today,
                'Reponses manquantes detectees dans ce theme.'
            );
        }

        $alerts = (array) ($insights['alerts'] ?? []);
        foreach (array_slice($alerts, 0, 2) as $idx => $alert) {
            $priority = ((int) ($alert['priority'] ?? 3)) >= 4 ? 'high' : 'med';
            $suggestions[] = $this->makeReportTaskSuggestion(
                'alert-' . $idx,
                $theme,
                sprintf('[%s] %s', $themeName, (string) ($alert['title'] ?? 'Alerte prioritaire')),
                (string) ($alert['message'] ?? 'Traiter ce point de risque.'),
                $priority,
                'todo',
                $today->modify('+1 day'),
                sprintf('Alerte issue des reponses: %s', (string) ($alert['message'] ?? ''))
            );
        }

        $trend = (array) ($insights['trend'] ?? []);
        if ((int) ($trend['down'] ?? 0) > 0) {
            $suggestions[] = $this->makeReportTaskSuggestion(
                'trend-down',
                $theme,
                sprintf('[%s] Revue de tendance hebdomadaire', $themeName),
                'Analyser les indicateurs en baisse et definir 2 actions correctives mesurables.',
                'high',
                'todo',
                $today->modify('+2 day'),
                sprintf('Tendance negative detectee (down=%d).', (int) ($trend['down'] ?? 0))
            );
        }

        return array_slice($suggestions, 0, 4);
    }

    private function makeReportTaskSuggestion(
        string $slug,
        Theme $theme,
        string $title,
        string $description,
        string $priority,
        string $status,
        \DateTimeImmutable $dueAt,
        string $evidence
    ): array {
        return [
            'id' => sprintf('theme-%d-%s-%s', (int) ($theme->getIdT() ?? 0), $slug, $dueAt->format('Ymd')),
            'title' => $title,
            'description' => $description,
            'priority' => $this->normalizeTaskPriority($priority),
            'status' => $this->normalizeTaskStatus($status),
            'dueAt' => $dueAt->format('Y-m-d'),
            'source' => 'theme_and_responses',
            'evidence' => $evidence,
        ];
    }

    private function normalizeTaskPriority(string $priority): string
    {
        $allowed = ['low', 'med', 'high'];
        return in_array($priority, $allowed, true) ? $priority : 'med';
    }

    private function normalizeTaskStatus(string $status): string
    {
        $allowed = ['todo', 'doing', 'done'];
        return in_array($status, $allowed, true) ? $status : 'todo';
    }

    private function taskToArray(Task $task): array
    {
        return [
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'status' => $task->getStatus(),
            'priority' => $task->getPriority(),
            'dueAt' => $task->getDueAt()?->format('Y-m-d'),
        ];
    }
}
