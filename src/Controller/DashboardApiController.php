<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ExecutionRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardApiController extends AbstractController
{
    #[Route('/api/dashboard/stats', name: 'api_dashboard_stats', methods: ['GET'])]
    public function stats(
        UserRepository $userRepo,
        TaskRepository $taskRepo,
        ExecutionRepository $executionRepo,
        CategoryRepository $categoryRepo
    ): JsonResponse {
        $tasksByStatus = [
            'todo' => $taskRepo->count(['status' => 'todo']),
            'doing' => $taskRepo->count(['status' => 'doing']),
            'done' => $taskRepo->count(['status' => 'done']),
        ];

        $tasksByPriority = [
            'low' => $taskRepo->count(['priority' => 'low']),
            'med' => $taskRepo->count(['priority' => 'med']),
            'high' => $taskRepo->count(['priority' => 'high']),
        ];

        return $this->json([
            'totals' => [
                'users' => $userRepo->count([]),
                'tasks' => $taskRepo->count([]),
                'executions' => $executionRepo->count([]),
                'categories' => $categoryRepo->count([]),
            ],
            'tasksByStatus' => $tasksByStatus,
            'tasksByPriority' => $tasksByPriority,
        ]);
    }
}
