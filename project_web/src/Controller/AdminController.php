<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use App\Repository\ExecutionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(
        UserRepository $userRepo,
        TaskRepository $taskRepo,
        ExecutionRepository $exeRepo
    ): Response {
        return $this->render('admin/dashboard.html.twig', [
            'totalUsers' => $userRepo->count([]),
            'totalTasks' => $taskRepo->count([]),
            'totalExecutions' => $exeRepo->count([]),
            'latestUsers' => $userRepo->findBy([], ['id_user' => 'DESC'], 5),
            'latestTasks' => $taskRepo->findBy([], ['id' => 'DESC'], 5),
            'latestExecutions' => $exeRepo->findBy([], ['id_exe' => 'DESC'], 5),
        ]);
    }
}
