<?php

namespace App\Controller;

use App\Entity\Execution;
use App\Entity\Task;
use App\Repository\ConscienceFeedbackRepository;
use App\Repository\ExecutionRepository;
use App\Repository\GoalRepository;
use App\Repository\MouvementRepository;
use App\Repository\ProduitRepository;
use App\Repository\QuestionRepository;
use App\Repository\TaskRepository;
use App\Repository\ThemeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[Route('/admin', name: 'app_admin')]
    public function index(
        Request $request,
        UserRepository $userRepository,
        TaskRepository $taskRepository,
        ExecutionRepository $executionRepository,
        GoalRepository $goalRepository,
        ProduitRepository $produitRepository,
        MouvementRepository $mouvementRepository,
        ThemeRepository $themeRepository,
        QuestionRepository $questionRepository,
        ConscienceFeedbackRepository $conscienceFeedbackRepository,
        \App\Repository\RegistrationAttemptRepository $registrationAttemptRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $periodMap = [
            '7d' => 7,
            '30d' => 30,
            '90d' => 90,
        ];

        $periodKey = (string) $request->query->get('period', '30d');
        if (!isset($periodMap[$periodKey])) {
            $periodKey = '30d';
        }

        $statusFilter = (string) $request->query->get('status', 'all');
        if (!\in_array($statusFilter, ['all', 'todo', 'doing', 'done'], true)) {
            $statusFilter = 'all';
        }

        $search = trim((string) $request->query->get('q', ''));
        $searchLower = mb_strtolower($search);
        $periodDays = $periodMap[$periodKey];

        $today = new \DateTimeImmutable('today');
        $periodStart = $today->modify('-' . ($periodDays - 1) . ' days')->setTime(0, 0, 0);
        $previousPeriodStart = $periodStart->modify('-' . $periodDays . ' days');
        $periodEnd = $today->setTime(23, 59, 59);
        $previousPeriodEnd = $periodStart->modify('-1 second');

        $totalUsers = $userRepository->count([]);
        $totalTasks = $taskRepository->count([]);
        $totalExecutions = $executionRepository->count([]);

        $todoTasks = $taskRepository->count(['status' => 'todo']);
        $doingTasks = $taskRepository->count(['status' => 'doing']);
        $doneTasks = $taskRepository->count(['status' => 'done']);

        $completionRate = $totalTasks > 0 ? round(($doneTasks / $totalTasks) * 100, 1) : 0.0;
        $openTasks = $todoTasks + $doingTasks;

        $taskCreatedPeriod = $this->countTasksBetween($taskRepository, $periodStart, $periodEnd);
        $taskCreatedPrevious = $this->countTasksBetween($taskRepository, $previousPeriodStart, $previousPeriodEnd);

        $executionCreatedPeriod = $this->countExecutionsBetween($executionRepository, $periodStart, $periodEnd);
        $executionCreatedPrevious = $this->countExecutionsBetween($executionRepository, $previousPeriodStart, $previousPeriodEnd);

        $overdueTasks = (int) $taskRepository->createQueryBuilder('t')
            ->select('COUNT(t)')
            ->andWhere('t.status != :done')
            ->andWhere('t.dueAt IS NOT NULL')
            ->andWhere('t.dueAt < :today')
            ->setParameter('done', 'done')
            ->setParameter('today', $today)
            ->getQuery()
            ->getSingleScalarResult();

        $dueSoonTasks = (int) $taskRepository->createQueryBuilder('t')
            ->select('COUNT(t)')
            ->andWhere('t.status != :done')
            ->andWhere('t.dueAt IS NOT NULL')
            ->andWhere('t.dueAt >= :today')
            ->andWhere('t.dueAt <= :soon')
            ->setParameter('done', 'done')
            ->setParameter('today', $today)
            ->setParameter('soon', $today->modify('+7 days'))
            ->getQuery()
            ->getSingleScalarResult();

        $taskPeriodShare = $totalTasks > 0 ? round(min(100, ($taskCreatedPeriod / $totalTasks) * 100), 1) : 0.0;
        $executionPeriodShare = $totalExecutions > 0 ? round(min(100, ($executionCreatedPeriod / $totalExecutions) * 100), 1) : 0.0;
        $overdueRatio = $openTasks > 0 ? round(min(100, ($overdueTasks / $openTasks) * 100), 1) : 0.0;

        $feedbackOverview = $conscienceFeedbackRepository->getOverviewStats();
        $avgSatisfaction = isset($feedbackOverview['avg']) ? (float) $feedbackOverview['avg'] : 0.0;

        $goalsTotal = $goalRepository->count([]);
        $goalsInProgress = $goalRepository->count(['statusGoa' => 'EN_COURS']);
        $themesTotal = $themeRepository->count([]);
        $themesActive = $themeRepository->count(['actif' => true]);
        $questionsTotal = $questionRepository->count([]);
        $questionsActive = $questionRepository->count(['actif' => true]);
        $productsTotal = $produitRepository->count([]);

        $lowStockProducts = (int) $produitRepository->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->andWhere('p.quantite_stock <= :threshold')
            ->setParameter('threshold', 10)
            ->getQuery()
            ->getSingleScalarResult();

        $mouvementsTotal = $mouvementRepository->count([]);
        $mouvementsPeriod = (int) $mouvementRepository->createQueryBuilder('m')
            ->select('COUNT(m)')
            ->andWhere('m.date_mouvement >= :start')
            ->setParameter('start', \DateTime::createFromImmutable($periodStart))
            ->getQuery()
            ->getSingleScalarResult();

        $latestTasksQb = $taskRepository->createQueryBuilder('t')
            ->orderBy('t.createAt', 'DESC')
            ->setMaxResults(8);

        if ($searchLower !== '') {
            $latestTasksQb
                ->andWhere('LOWER(t.title) LIKE :term OR LOWER(t.description) LIKE :term')
                ->setParameter('term', '%' . $searchLower . '%');
        }

        if ($statusFilter !== 'all') {
            $latestTasksQb
                ->andWhere('t.status = :statusFilter')
                ->setParameter('statusFilter', $statusFilter);
        }

        /** @var array<int, Task> $latestTasks */
        $latestTasks = $latestTasksQb->getQuery()->getResult();

        $latestUsers = array_slice($userRepository->findForAdminList($search ?? '', 'newest'), 0, 8);
        $userEmails = array_map(fn($u) => $u->getEmail(), $latestUsers);
        $latestAttempts = $registrationAttemptRepository->findLatestByEmails($userEmails);
        $latestRegistrationAttempts = $registrationAttemptRepository->findLatest(6);
        $totalRegistrationAttempts = $registrationAttemptRepository->count([]);
        $rejectedRegistrationAttempts = $registrationAttemptRepository->count(['status' => 'rejected']);

        $chartLabels = [];
        $chartKeys = [];
        for ($i = $periodDays - 1; $i >= 0; --$i) {
            $date = $today->modify('-' . $i . ' days');
            $chartKeys[] = $date->format('Y-m-d');
            $chartLabels[] = $date->format('d M');
        }

        $taskCreatedSeries = array_fill_keys($chartKeys, 0);
        $taskCompletedSeries = array_fill_keys($chartKeys, 0);
        $executionSeries = array_fill_keys($chartKeys, 0);

        /** @var array<int, Task> $tasksForSeries */
        $tasksForSeries = $taskRepository->createQueryBuilder('t')
            ->andWhere('t.createAt >= :start OR t.updateAt >= :start')
            ->setParameter('start', $periodStart)
            ->getQuery()
            ->getResult();

        foreach ($tasksForSeries as $task) {
            $createdKey = $task->getCreateAt()->format('Y-m-d');
            if (isset($taskCreatedSeries[$createdKey])) {
                ++$taskCreatedSeries[$createdKey];
            }

            if ($task->getStatus() === 'done') {
                $completedKey = $task->getUpdateAt()->format('Y-m-d');
                if (isset($taskCompletedSeries[$completedKey])) {
                    ++$taskCompletedSeries[$completedKey];
                }
            }
        }

        /** @var array<int, Execution> $executionsForSeries */
        $executionsForSeries = $executionRepository->createQueryBuilder('e')
            ->andWhere('e.createAt_exe IS NOT NULL')
            ->andWhere('e.createAt_exe >= :start')
            ->setParameter('start', $periodStart)
            ->getQuery()
            ->getResult();

        foreach ($executionsForSeries as $execution) {
            $createdAt = $execution->getCreateAtExe();
            if ($createdAt === null) {
                continue;
            }

            $executionKey = $createdAt->format('Y-m-d');
            if (isset($executionSeries[$executionKey])) {
                ++$executionSeries[$executionKey];
            }
        }

        $taskCreatedValues = array_values($taskCreatedSeries);
        $taskCompletedValues = array_values($taskCompletedSeries);
        $executionValues = array_values($executionSeries);

        $taskCreatedTotal = array_sum($taskCreatedValues);
        $taskCompletedTotal = array_sum($taskCompletedValues);
        $executionTotalPeriod = array_sum($executionValues);

        $chartMax = (float) max(1, ...$taskCreatedValues, ...$taskCompletedValues, ...$executionValues);
        $chartLabelStep = max(1, (int) floor($periodDays / 6));

        $taskCreatedPath = $this->buildLinePath($taskCreatedValues, $chartMax);
        $taskCreatedAreaPath = $this->buildAreaPath($taskCreatedValues, $chartMax);
        $taskCompletedPath = $this->buildLinePath($taskCompletedValues, $chartMax);
        $executionPath = $this->buildLinePath($executionValues, $chartMax);

        $taskTrend = $this->buildTrend($taskCreatedPeriod, $taskCreatedPrevious);
        $executionTrend = $this->buildTrend($executionCreatedPeriod, $executionCreatedPrevious);

        return $this->render('admin/dashboard.html.twig', [
            'search' => $search,
            'periodKey' => $periodKey,
            'periodDays' => $periodDays,
            'statusFilter' => $statusFilter,
            'totalUsers' => $totalUsers,
            'totalTasks' => $totalTasks,
            'totalExecutions' => $totalExecutions,
            'openTasks' => $openTasks,
            'doneTasks' => $doneTasks,
            'completionRate' => $completionRate,
            'overdueTasks' => $overdueTasks,
            'dueSoonTasks' => $dueSoonTasks,
            'taskPeriodShare' => $taskPeriodShare,
            'executionPeriodShare' => $executionPeriodShare,
            'overdueRatio' => $overdueRatio,
            'taskCreatedPeriod' => $taskCreatedPeriod,
            'executionCreatedPeriod' => $executionCreatedPeriod,
            'taskTrend' => $taskTrend,
            'executionTrend' => $executionTrend,
            'latestUsers' => $latestUsers,
            'latestAttempts' => $latestAttempts,
            'latestRegistrationAttempts' => $latestRegistrationAttempts,
            'totalRegistrationAttempts' => $totalRegistrationAttempts,
            'rejectedRegistrationAttempts' => $rejectedRegistrationAttempts,
            'latestTasks' => $latestTasks,
            'chartLabels' => $chartLabels,
            'chartLabelStep' => $chartLabelStep,
            'chartMax' => (int) $chartMax,
            'taskCreatedValues' => $taskCreatedValues,
            'taskCompletedValues' => $taskCompletedValues,
            'executionValues' => $executionValues,
            'taskCreatedTotal' => $taskCreatedTotal,
            'taskCompletedTotal' => $taskCompletedTotal,
            'executionTotalPeriod' => $executionTotalPeriod,
            'taskCreatedPath' => $taskCreatedPath,
            'taskCreatedAreaPath' => $taskCreatedAreaPath,
            'taskCompletedPath' => $taskCompletedPath,
            'executionPath' => $executionPath,
            'goalsTotal' => $goalsTotal,
            'goalsInProgress' => $goalsInProgress,
            'themesTotal' => $themesTotal,
            'themesActive' => $themesActive,
            'questionsTotal' => $questionsTotal,
            'questionsActive' => $questionsActive,
            'productsTotal' => $productsTotal,
            'lowStockProducts' => $lowStockProducts,
            'mouvementsTotal' => $mouvementsTotal,
            'mouvementsPeriod' => $mouvementsPeriod,
            'feedbackTotal' => (int) ($feedbackOverview['total'] ?? 0),
            'avgSatisfaction' => $avgSatisfaction,
            'todoTasks' => $todoTasks,
            'doingTasks' => $doingTasks,
        ]);
    }

    private function countTasksBetween(
        TaskRepository $taskRepository,
        \DateTimeImmutable $start,
        \DateTimeImmutable $end
    ): int {
        return (int) $taskRepository->createQueryBuilder('t')
            ->select('COUNT(t)')
            ->andWhere('t.createAt >= :start')
            ->andWhere('t.createAt <= :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getQuery()
            ->getSingleScalarResult();
    }

    private function countExecutionsBetween(
        ExecutionRepository $executionRepository,
        \DateTimeImmutable $start,
        \DateTimeImmutable $end
    ): int {
        return (int) $executionRepository->createQueryBuilder('e')
            ->select('COUNT(e)')
            ->andWhere('e.createAt_exe IS NOT NULL')
            ->andWhere('e.createAt_exe >= :start')
            ->andWhere('e.createAt_exe <= :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param array<int, int> $values
     */
    private function buildLinePath(
        array $values,
        float $maxValue,
        int $width = 900,
        int $height = 290,
        int $paddingX = 14,
        int $paddingTop = 24,
        int $paddingBottom = 24
    ): string {
        $count = count($values);
        if ($count === 0) {
            return '';
        }

        $maxValue = max(1.0, $maxValue);
        $plotWidth = $width - ($paddingX * 2);
        $plotHeight = $height - $paddingTop - $paddingBottom;
        $stepX = $count > 1 ? $plotWidth / ($count - 1) : 0.0;

        $parts = [];
        foreach ($values as $index => $value) {
            $x = $paddingX + ($index * $stepX);
            $y = $paddingTop + ($plotHeight - (($value / $maxValue) * $plotHeight));
            $point = round($x, 2) . ' ' . round($y, 2);
            $parts[] = $index === 0 ? 'M' . $point : 'L' . $point;
        }

        return implode(' ', $parts);
    }

    /**
     * @param array<int, int> $values
     */
    private function buildAreaPath(
        array $values,
        float $maxValue,
        int $width = 900,
        int $height = 290,
        int $paddingX = 14,
        int $paddingTop = 24,
        int $paddingBottom = 24
    ): string {
        $count = count($values);
        if ($count === 0) {
            return '';
        }

        $line = $this->buildLinePath($values, $maxValue, $width, $height, $paddingX, $paddingTop, $paddingBottom);
        $plotWidth = $width - ($paddingX * 2);
        $stepX = $count > 1 ? $plotWidth / ($count - 1) : 0.0;
        $firstX = round((float) $paddingX, 2);
        $lastX = round($paddingX + (($count - 1) * $stepX), 2);
        $baselineY = round((float) ($height - $paddingBottom), 2);

        return $line . ' L' . $lastX . ' ' . $baselineY . ' L' . $firstX . ' ' . $baselineY . ' Z';
    }

    /**
     * @return array{direction:string, percent:float, label:string}
     */
    private function buildTrend(int $current, int $previous): array
    {
        if ($previous <= 0) {
            if ($current <= 0) {
                return [
                    'direction' => 'flat',
                    'percent' => 0.0,
                    'label' => '0%',
                ];
            }

            return [
                'direction' => 'up',
                'percent' => 100.0,
                'label' => '+100%',
            ];
        }

        $raw = (($current - $previous) / $previous) * 100;
        $direction = 'flat';
        if ($raw > 0.01) {
            $direction = 'up';
        } elseif ($raw < -0.01) {
            $direction = 'down';
        }

        $rounded = round($raw, 1);
        $prefix = $rounded > 0 ? '+' : '';

        return [
            'direction' => $direction,
            'percent' => abs($rounded),
            'label' => $prefix . $rounded . '%',
        ];
    }
}
