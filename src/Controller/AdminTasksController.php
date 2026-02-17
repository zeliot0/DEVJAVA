<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminTasksController extends AbstractController
{
    #[Route('/admin/tasks', name: 'admin_tasks')]
    public function index(TaskRepository $taskRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $allTasks = $taskRepo->findAll();

      
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

       
        $monthLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
        $monthData = [12, 19, 3, 5, 2, 3, 10, 15, 8, 12, 20, 25]; 

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
    public function delete(Request $request, int $id, TaskRepository $taskRepo, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if (!$this->isCsrfTokenValid('admin_delete_task_'.$id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_tasks');
        }

        $task = $taskRepo->find($id);
        if ($task) {
            $em->remove($task);
            $em->flush();
            $this->addFlash('success', 'Tâche supprimée avec succès.');
        }
        return $this->redirectToRoute('admin_tasks');
    }
}
