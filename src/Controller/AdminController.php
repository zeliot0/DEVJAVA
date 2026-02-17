<?php

namespace App\Controller;

use App\Repository\ExecutionRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[Route('/admin', name: 'app_admin')]
    public function index(
        UserRepository $userRepository,
        TaskRepository $taskRepository,
        ExecutionRepository $executionRepository
    ): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('admin/dashboard.html.twig', [
            'totalUsers' => $userRepository->count([]),
            'totalTasks' => $taskRepository->count([]),
            'totalExecutions' => $executionRepository->count([]),
            'latestUsers' => $userRepository->findBy([], ['id_user' => 'DESC'], 5),
            'latestTasks' => $taskRepository->findBy([], ['id' => 'DESC'], 5),
        ]);
    }
}
