<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/analytics')]
final class AnalyticsApiController extends AbstractController
{
    #[Route('/throughput', name: 'api_analytics_throughput', methods: ['GET'])]
    public function throughput(Request $request, TaskRepository $taskRepo): JsonResponse
    {
        $from = $this->parseDate($request->query->get('from'), 'first day of this month');
        $to = $this->parseDate($request->query->get('to'), 'tomorrow');

        $tasks = $taskRepo->createQueryBuilder('t')
            ->andWhere('t.updateAt >= :from')
            ->andWhere('t.updateAt < :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->getQuery()
            ->getResult();

        $days = [];
        foreach ($tasks as $task) {
            if ($task->getStatus() !== 'done') {
                continue;
            }
            $key = $task->getUpdateAt()->format('Y-m-d');
            $days[$key] = ($days[$key] ?? 0) + 1;
        }
        ksort($days);

        return $this->json([
            'ok' => true,
            'from' => $from->format('Y-m-d'),
            'to' => $to->modify('-1 day')->format('Y-m-d'),
            'data' => $days,
        ]);
    }

    #[Route('/workload', name: 'api_analytics_workload', methods: ['GET'])]
    public function workload(Request $request, TaskRepository $taskRepo): JsonResponse
    {
        $groupBy = (string) $request->query->get('groupBy', 'status');
        $allowed = ['status', 'priority', 'category'];
        if (!in_array($groupBy, $allowed, true)) {
            return $this->json(['error' => 'groupBy must be status|priority|category'], 422);
        }

        $tasks = $taskRepo->createQueryBuilder('t')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->getQuery()
            ->getResult();

        $data = [];
        foreach ($tasks as $task) {
            $key = match ($groupBy) {
                'priority' => $task->getPriority(),
                'category' => $task->getCategory()?->getName() ?? 'uncategorized',
                default => $task->getStatus(),
            };
            $data[$key] = ($data[$key] ?? 0) + 1;
        }
        ksort($data);

        return $this->json([
            'ok' => true,
            'groupBy' => $groupBy,
            'data' => $data,
        ]);
    }

    #[Route('/cycle-time', name: 'api_analytics_cycle_time', methods: ['GET'])]
    public function cycleTime(TaskRepository $taskRepo): JsonResponse
    {
        $doneTasks = $taskRepo->createQueryBuilder('t')
            ->andWhere('t.status = :done')
            ->setParameter('done', 'done')
            ->getQuery()
            ->getResult();

        $samples = 0;
        $totalHours = 0.0;
        foreach ($doneTasks as $task) {
            if (!$task instanceof Task) {
                continue;
            }
            $created = $task->getCreateAt();
            $updated = $task->getUpdateAt();
            $seconds = $updated->getTimestamp() - $created->getTimestamp();
            if ($seconds < 0) {
                continue;
            }
            $samples++;
            $totalHours += ($seconds / 3600);
        }

        $averageHours = $samples > 0 ? round($totalHours / $samples, 2) : 0.0;

        return $this->json([
            'ok' => true,
            'samples' => $samples,
            'averageHours' => $averageHours,
        ]);
    }

    private function parseDate(mixed $value, string $fallback): \DateTimeImmutable
    {
        $raw = is_string($value) ? trim($value) : '';
        if ($raw === '') {
            return new \DateTimeImmutable($fallback);
        }
        try {
            return new \DateTimeImmutable($raw);
        } catch (\Throwable) {
            return new \DateTimeImmutable($fallback);
        }
    }
}
