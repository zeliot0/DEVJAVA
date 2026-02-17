<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/tasks')]
final class AdvancedTaskApiController extends AbstractController
{
    #[Route('/today', name: 'api_tasks_today', methods: ['GET'])]
    public function today(TaskRepository $taskRepo): JsonResponse
    {
        $today = new \DateTimeImmutable('today');
        $tomorrow = $today->modify('+1 day');

        $tasks = $taskRepo->createQueryBuilder('t')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->andWhere('t.dueAt >= :today')
            ->andWhere('t.dueAt < :tomorrow')
            ->setParameter('today', $today)
            ->setParameter('tomorrow', $tomorrow)
            ->orderBy('t.priority', 'DESC')
            ->addOrderBy('t.updateAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->json([
            'ok' => true,
            'data' => array_map(fn(Task $t) => $this->toArray($t), $tasks),
        ]);
    }

    #[Route('/overdue', name: 'api_tasks_overdue', methods: ['GET'])]
    public function overdue(TaskRepository $taskRepo): JsonResponse
    {
        $today = new \DateTimeImmutable('today');

        $tasks = $taskRepo->createQueryBuilder('t')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->andWhere('t.dueAt < :today')
            ->andWhere('t.status != :done')
            ->setParameter('today', $today)
            ->setParameter('done', 'done')
            ->orderBy('t.dueAt', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->json([
            'ok' => true,
            'data' => array_map(fn(Task $t) => $this->toArray($t), $tasks),
        ]);
    }

    #[Route('/batch/status', name: 'api_tasks_batch_status', methods: ['POST'])]
    public function batchStatus(
        Request $request,
        TaskRepository $taskRepo,
        EntityManagerInterface $em
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true) ?: [];

        $ids = array_values(array_unique(array_map('intval', (array) ($payload['ids'] ?? []))));
        $status = (string) ($payload['status'] ?? '');

        if ($ids === [] || !in_array($status, ['todo', 'doing', 'done'], true)) {
            return $this->json(['error' => 'ids[] and valid status are required'], 422);
        }

        $tasks = $taskRepo->createQueryBuilder('t')
            ->andWhere('t.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult();

        foreach ($tasks as $task) {
            $task->setStatus($status);
            $task->touch();
        }

        $em->flush();

        return $this->json([
            'ok' => true,
            'updated' => count($tasks),
        ]);
    }

    #[Route('/batch/delete', name: 'api_tasks_batch_delete', methods: ['POST'])]
    public function batchDelete(
        Request $request,
        TaskRepository $taskRepo,
        EntityManagerInterface $em
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true) ?: [];
        $ids = array_values(array_unique(array_map('intval', (array) ($payload['ids'] ?? []))));

        if ($ids === []) {
            return $this->json(['error' => 'ids[] is required'], 422);
        }

        $tasks = $taskRepo->createQueryBuilder('t')
            ->andWhere('t.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult();

        foreach ($tasks as $task) {
            $em->remove($task);
        }

        $em->flush();

        return $this->json([
            'ok' => true,
            'deleted' => count($tasks),
        ]);
    }

    #[Route('/auto-prioritize', name: 'api_tasks_auto_prioritize', methods: ['POST'])]
    public function autoPrioritize(
        Request $request,
        TaskRepository $taskRepo,
        EntityManagerInterface $em
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true) ?: [];
        $ids = array_values(array_unique(array_map('intval', (array) ($payload['ids'] ?? []))));

        $qb = $taskRepo->createQueryBuilder('t')->leftJoin('t.category', 'c')->addSelect('c');
        if ($ids !== []) {
            $qb->andWhere('t.id IN (:ids)')->setParameter('ids', $ids);
        }

        $tasks = $qb->getQuery()->getResult();

        $updated = 0;
        foreach ($tasks as $task) {
            $next = $this->computePriority($task);
            if ($task->getPriority() !== $next) {
                $task->setPriority($next);
                $task->touch();
                $updated++;
            }
        }

        $em->flush();

        return $this->json([
            'ok' => true,
            'updated' => $updated,
            'totalProcessed' => count($tasks),
        ]);
    }

    private function computePriority(Task $task): string
    {
        $due = $task->getDueAt();
        if (!$due) {
            return 'med';
        }

        $today = new \DateTimeImmutable('today');
        $days = (int) $today->diff($due)->format('%r%a');

        if ($days < 0) {
            return 'high';
        }
        if ($days <= 2) {
            return 'high';
        }
        if ($days <= 7) {
            return 'med';
        }

        return 'low';
    }

    private function toArray(Task $task): array
    {
        $cat = $task->getCategory();

        return [
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'status' => $task->getStatus(),
            'priority' => $task->getPriority(),
            'dueAt' => $task->getDueAt()?->format('Y-m-d'),
            'categoryId' => $cat?->getId(),
            'categoryName' => $cat?->getName(),
            'categoryColor' => $cat?->getColor(),
            'categoryIcon' => $cat?->getIcon(),
            'createAt' => $task->getCreateAt()->format('Y-m-d H:i:s'),
            'updateAt' => $task->getUpdateAt()->format('Y-m-d H:i:s'),
        ];
    }
}
