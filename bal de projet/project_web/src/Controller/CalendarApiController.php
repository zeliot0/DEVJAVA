<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/calendar')]
final class CalendarApiController extends AbstractController
{
    #[Route('/events', name: 'api_calendar_events', methods: ['GET'])]
    public function events(Request $request, TaskRepository $taskRepo): JsonResponse
    {
        $from = $this->parseDate((string) $request->query->get('from', ''), new \DateTimeImmutable('first day of this month'));
        $to = $this->parseDate((string) $request->query->get('to', ''), new \DateTimeImmutable('last day of this month'));
        $status = trim((string) $request->query->get('status', ''));

        $qb = $taskRepo->createQueryBuilder('t')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->andWhere('t.dueAt IS NOT NULL')
            ->andWhere('t.dueAt >= :from')
            ->andWhere('t.dueAt <= :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->orderBy('t.dueAt', 'ASC');

        if ($status !== '') {
            $qb->andWhere('t.status = :status')->setParameter('status', $status);
        }

        $tasks = $qb->getQuery()->getResult();
        $events = array_map(fn(Task $task) => $this->toEvent($task), $tasks);

        return $this->json([
            'ok' => true,
            'data' => $events,
            'meta' => [
                'from' => $from->format('Y-m-d'),
                'to' => $to->format('Y-m-d'),
                'count' => count($events),
            ],
        ]);
    }

    private function parseDate(string $raw, \DateTimeImmutable $fallback): \DateTimeImmutable
    {
        $raw = trim($raw);
        if ($raw === '') {
            return $fallback;
        }

        try {
            return new \DateTimeImmutable($raw);
        } catch (\Throwable) {
            return $fallback;
        }
    }

    private function toEvent(Task $task): array
    {
        $category = $task->getCategory();

        return [
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'start' => $task->getDueAt()?->format('Y-m-d'),
            'end' => $task->getDueAt()?->format('Y-m-d'),
            'allDay' => true,
            'status' => $task->getStatus(),
            'priority' => $task->getPriority(),
            'category' => $category ? [
                'id' => $category->getId(),
                'name' => $category->getName(),
                'color' => $category->getColor(),
            ] : null,
        ];
    }
}
