<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Theme;
use App\Entity\UserResponse;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceController extends AbstractController
{
    #[Route('/conscience', name: 'app_conscience_index', methods: ['GET'])]
    public function index(
        Request $request,
        ThemeRepository $themeRepository,
        EntityManagerInterface $em
    ): Response {
        $search = trim((string) $request->query->get('q', ''));
        $sort = (string) $request->query->get('sort', 'smart');
        $allowedSorts = ['smart', 'newest', 'priority_desc', 'priority_asc', 'questions_desc'];
        $isAdmin = $this->isGranted('ROLE_ADMIN');

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'smart';
        }

        $themes = $themeRepository->findForConscience($search, $sort, $isAdmin);
        $themeStats = $this->buildThemeStats($themes, $em, new \DateTimeImmutable());
        $focusThemes = $this->buildFocusThemes($themes, $themeStats);

        if ($request->isXmlHttpRequest()) {
            return $this->render('conscience/_themes_list.html.twig', [
                'themes' => $themes,
                'themeStats' => $themeStats,
            ]);
        }

        $totalActiveQuestions = 0;
        $totalPending = 0;
        $totalAnswered = 0;
        foreach ($themeStats as $stats) {
            $totalActiveQuestions += (int) ($stats['activeQuestions'] ?? 0);
            $totalPending += (int) ($stats['pending'] ?? 0);
            $totalAnswered += (int) ($stats['answered'] ?? 0);
        }

        $globalProgress = $totalActiveQuestions > 0
            ? (int) round(($totalAnswered / $totalActiveQuestions) * 100)
            : 0;

        return $this->render('conscience/index.html.twig', [
            'themes' => $themes,
            'themeStats' => $themeStats,
            'focusThemes' => $focusThemes,
            'search' => $search,
            'sort' => $sort,
            'totalActiveQuestions' => $totalActiveQuestions,
            'totalPending' => $totalPending,
            'globalProgress' => $globalProgress,
        ]);
    }

    /**
     * @param Theme[] $themes
     * @return array<int, array<string, int>>
     */
    private function buildThemeStats(array $themes, EntityManagerInterface $em, \DateTimeImmutable $now): array
    {
        if ($themes === []) {
            return [];
        }

        $questionsByTheme = [];
        $allActiveQuestions = [];

        foreach ($themes as $theme) {
            $themeId = $theme->getIdT();
            if ($themeId === null) {
                continue;
            }

            $activeQuestions = [];
            foreach ($theme->getQuestions() as $question) {
                if ($question->isActif()) {
                    $activeQuestions[] = $question;
                    $allActiveQuestions[] = $question;
                }
            }

            $questionsByTheme[$themeId] = $activeQuestions;
        }

        $latestByQuestion = $this->latestResponsesByQuestion($allActiveQuestions, $em);
        $stats = [];

        foreach ($themes as $theme) {
            $themeId = $theme->getIdT();
            if ($themeId === null) {
                continue;
            }

            $activeQuestions = $questionsByTheme[$themeId] ?? [];
            $answered = 0;
            $pending = 0;

            foreach ($activeQuestions as $question) {
                $questionId = $question->getId();
                if ($questionId === null) {
                    continue;
                }

                $isAnswered = $this->isAnsweredInCurrentWindow(
                    $question,
                    $latestByQuestion[$questionId] ?? null,
                    $now
                );

                if ($isAnswered) {
                    $answered++;
                } else {
                    $pending++;
                }
            }

            $activeCount = count($activeQuestions);
            $progress = $activeCount > 0 ? (int) round(($answered / $activeCount) * 100) : 0;

            $stats[$themeId] = [
                'activeQuestions' => $activeCount,
                'answered' => $answered,
                'pending' => $pending,
                'progress' => $progress,
            ];
        }

        return $stats;
    }

    /**
     * @param Question[] $questions
     * @return array<int, UserResponse>
     */
    private function latestResponsesByQuestion(array $questions, EntityManagerInterface $em): array
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

        $latestByQuestion = [];
        foreach ($responses as $response) {
            $questionId = $response->getQuestion()?->getId();
            if ($questionId === null || isset($latestByQuestion[$questionId])) {
                continue;
            }
            $latestByQuestion[$questionId] = $response;
        }

        return $latestByQuestion;
    }

    private function isAnsweredInCurrentWindow(
        Question $question,
        ?UserResponse $response,
        \DateTimeImmutable $now
    ): bool {
        if ($response === null || $response->getDate() === null) {
            return false;
        }

        $windowStart = $this->getWindowStart($question->getFrequence() ?? 'quotidienne', $now);
        $responseDate = \DateTimeImmutable::createFromMutable($response->getDate())->setTime(0, 0);

        return $responseDate >= $windowStart;
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
     * @param Theme[] $themes
     * @param array<int, array<string, int>> $statsByTheme
     * @return Theme[]
     */
    private function buildFocusThemes(array $themes, array $statsByTheme): array
    {
        $sorted = $themes;

        usort($sorted, static function (Theme $a, Theme $b) use ($statsByTheme): int {
            $statsA = $statsByTheme[$a->getIdT() ?? 0] ?? ['pending' => 0, 'activeQuestions' => 0, 'progress' => 0];
            $statsB = $statsByTheme[$b->getIdT() ?? 0] ?? ['pending' => 0, 'activeQuestions' => 0, 'progress' => 0];

            $scoreA = ((int) ($statsA['pending'] ?? 0) * 100)
                + ((int) ($a->getPriorite() ?? 1) * 20)
                + ((int) ($statsA['activeQuestions'] ?? 0) * 5);

            $scoreB = ((int) ($statsB['pending'] ?? 0) * 100)
                + ((int) ($b->getPriorite() ?? 1) * 20)
                + ((int) ($statsB['activeQuestions'] ?? 0) * 5);

            return $scoreB <=> $scoreA;
        });

        return array_slice($sorted, 0, 3);
    }
}
