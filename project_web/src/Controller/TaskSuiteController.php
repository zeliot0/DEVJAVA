<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/task-suite')]
final class TaskSuiteController extends AbstractController
{
    #[Route('', name: 'app_task_suite_hub', methods: ['GET'])]
    public function hub(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        $today = new \DateTimeImmutable('today');

        $total = count($tasks);
        $done = 0;
        $doing = 0;
        $high = 0;
        $overdue = 0;

        foreach ($tasks as $task) {
            if (!$task instanceof Task) {
                continue;
            }

            if ($task->getStatus() === 'done') {
                $done++;
            }
            if ($task->getStatus() === 'doing') {
                $doing++;
            }
            if ($task->getPriority() === 'high') {
                $high++;
            }

            $due = $task->getDueAt();
            if ($due && $due < $today && $task->getStatus() !== 'done') {
                $overdue++;
            }
        }

        $completionRate = $total > 0 ? (int) round(($done / $total) * 100) : 0;

        return $this->render('task_suite/hub.html.twig', [
            'kpis' => [
                'total' => $total,
                'done' => $done,
                'doing' => $doing,
                'high' => $high,
                'overdue' => $overdue,
                'completionRate' => $completionRate,
            ],
        ]);
    }

    #[Route('/planner', name: 'app_task_suite_planner', methods: ['GET'])]
    public function planner(TaskRepository $taskRepository): Response
    {
        $today = new \DateTimeImmutable('today');
        $tasks = array_values(array_filter(
            $taskRepository->findAll(),
            fn($task) => $task instanceof Task
        ));

        $activeTasks = array_values(array_filter(
            $tasks,
            fn(Task $task) => $task->getStatus() !== 'done'
        ));

        usort($activeTasks, fn(Task $a, Task $b) => $this->scoreTask($b, $today) <=> $this->scoreTask($a, $today));

        $topTasks = array_slice(array_map(fn(Task $task) => $this->serializeTask($task), $activeTasks), 0, 5);

        $staleTasks = array_values(array_filter(
            $tasks,
            function (Task $task): bool {
                if ($task->getStatus() === 'done') {
                    return false;
                }

                $threshold = new \DateTimeImmutable('-7 days');
                return $task->getUpdateAt() < $threshold;
            }
        ));

        usort($staleTasks, fn(Task $a, Task $b) => $a->getUpdateAt() <=> $b->getUpdateAt());
        $staleTasks = array_slice(array_map(fn(Task $task) => $this->serializeTask($task), $staleTasks), 0, 8);

        $overdueTasks = array_values(array_filter(
            $tasks,
            fn(Task $task) => $task->getDueAt() && $task->getDueAt() < $today && $task->getStatus() !== 'done'
        ));
        usort($overdueTasks, fn(Task $a, Task $b) => $a->getDueAt() <=> $b->getDueAt());
        $overdueTasks = array_slice(array_map(fn(Task $task) => $this->serializeTask($task), $overdueTasks), 0, 8);

        return $this->render('task_suite/planner.html.twig', [
            'topTasks' => $topTasks,
            'staleTasks' => $staleTasks,
            'overdueTasks' => $overdueTasks,
        ]);
    }

    #[Route('/ai-studio', name: 'app_task_suite_ai_studio', methods: ['GET'])]
    public function aiStudio(): Response
    {
        return $this->render('task_suite/ai_studio.html.twig');
    }

    #[Route('/workflows', name: 'app_task_suite_workflows', methods: ['GET'])]
    public function workflows(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        return $this->render('task_suite/workflows.html.twig', [
            'tasks' => $tasks
        ]);
    }

    #[Route('/insights', name: 'app_task_suite_insights', methods: ['GET'])]
    public function insights(): Response
    {
        return $this->render('task_suite/insights.html.twig');
    }

    #[Route('/automation', name: 'app_task_suite_automation', methods: ['GET'])]
    public function automation(): Response
    {
        return $this->render('task_suite/automation.html.twig');
    }

    #[Route('/focus', name: 'app_task_suite_focus', methods: ['GET'])]
    public function focus(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findBy(['status' => ['todo', 'doing']], ['priority' => 'DESC', 'id' => 'DESC']);
        return $this->render('task_suite/focus.html.twig', [
            'tasks' => $tasks
        ]);
    }

    #[Route('/music-lounge', name: 'app_task_suite_music_lounge', methods: ['GET'])]
    public function musicLounge(): Response
    {
        return $this->render('task_suite/music_lounge.html.twig');
    }

    private function scoreTask(Task $task, \DateTimeImmutable $today): int
    {
        $priorityScore = match ($task->getPriority()) {
            'high' => 3,
            'med' => 2,
            default => 1,
        };

        $statusBonus = $task->getStatus() === 'doing' ? 2 : 0;
        $urgency = 0;

        $due = $task->getDueAt();
        if ($due) {
            $days = (int) $today->diff($due)->format('%r%a');
            if ($days < 0) {
                $urgency = 4;
            } elseif ($days <= 2) {
                $urgency = 3;
            } elseif ($days <= 7) {
                $urgency = 2;
            } else {
                $urgency = 1;
            }
        }

        return $priorityScore + $statusBonus + $urgency;
    }

    private function serializeTask(Task $task): array
    {
        return [
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'status' => $task->getStatus(),
            'priority' => $task->getPriority(),
            'dueAt' => $task->getDueAt()?->format('Y-m-d'),
            'updatedAt' => $task->getUpdateAt()->format('Y-m-d H:i'),
            'category' => $task->getCategory()?->getName(),
        ];
    }
}
