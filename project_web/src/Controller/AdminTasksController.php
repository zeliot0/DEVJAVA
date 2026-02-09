<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminTasksController extends AbstractController
{
    #[Route('/admin/tasks', name: 'admin_tasks')]
    public function index(TaskRepository $taskRepo): Response
    {
        $allTasks = $taskRepo->findAll();

        // Prepare stats for charts
        $statusLabels = ['À faire', 'En cours', 'Terminé'];
        $statusData = [
            $taskRepo->count(['status' => 'todo']),
            $taskRepo->count(['status' => 'doing']),
            $taskRepo->count(['status' => 'done'])
        ];

        $priorityLabels = ['Basse', 'Moyenne', 'Haute'];
        $priorityData = [
            $taskRepo->count(['priority' => 'low']),
            $taskRepo->count(['priority' => 'med']),
            $taskRepo->count(['priority' => 'high'])
        ];

        // Monthly stats (mocked if no created_at exists, but assuming standard NEXA structure)
        $monthLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
        $monthData = [12, 19, 3, 5, 2, 3, 10, 15, 8, 12, 20, 25]; // Simulation

        return $this->render('admin/tasks.html.twig', [
            'tasks' => $allTasks,
            'charts' => [
                'status' => ['labels' => $statusLabels, 'data' => $statusData],
                'priority' => ['labels' => $priorityLabels, 'data' => $priorityData],
                'months' => ['labels' => $monthLabels, 'data' => $monthData]
            ]
        ]);
    }

    #[Route('/admin/tasks/delete/{id}', name: 'admin_tasks_delete', methods: ['POST'])]
    public function delete(int $id, TaskRepository $taskRepo, EntityManagerInterface $em): Response
    {
        $task = $taskRepo->find($id);
        if ($task) {
            $em->remove($task);
            $em->flush();
            $this->addFlash('success', 'Tâche supprimée avec succès.');
        }
        return $this->redirectToRoute('admin_tasks');
    }
}
