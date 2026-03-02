<?php

namespace App\Controller;

use App\Entity\Execution;
use App\Repository\ExecutionRepository;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/executions')]
final class ExecutionApiController extends AbstractController
{
    #[Route('', name: 'api_executions_list', methods: ['GET'])]
    public function list(Request $request, ExecutionRepository $repo): JsonResponse
    {
        $taskId = (int) $request->query->get('task_id', 0);
        if ($taskId <= 0) {
            return $this->json(['ok' => true, 'data' => []]);
        }

        $items = $repo->findBy(['task' => $taskId], ['id_exe' => 'DESC']);

        $data = array_map(static function (Execution $e) {
            return [
                'id' => $e->getIdExe(),
                'title' => $e->getTitleExe(),
                'desc' => $e->getDescExe(),
                'status' => $e->getStatusExe(),
            ];
        }, $items);

        return $this->json(['ok' => true, 'data' => $data]);
    }

    #[Route('', name: 'api_executions_create', methods: ['POST'])]
    public function create(Request $request, TaskRepository $taskRepo, EntityManagerInterface $em): JsonResponse
    {
        $p = json_decode($request->getContent(), true) ?: [];

        $taskId = (int) ($p['task_id'] ?? 0);
        $task = $taskId ? $taskRepo->find($taskId) : null;
        if (!$task) {
            return $this->json(['ok' => false, 'message' => 'Task introuvable'], 400);
        }

        $title = trim((string) ($p['title'] ?? ''));
        $desc = trim((string) ($p['desc'] ?? ''));
        $status = (string) ($p['status'] ?? 'todo');

        if ($title === '' || $desc === '') {
            return $this->json(['ok' => false, 'message' => 'Titre et description obligatoires'], 400);
        }

        $e = new Execution();
        $e->setTask($task);

        
        $e->setTitleExe($title);
        $e->setDescExe($desc);
        $e->setStatusExe($status);

        $em->persist($e);
        $em->flush();

        $id = $e->getIdExe();

        return $this->json(['ok' => true, 'id' => $id]);
    }

    #[Route('/{id}', name: 'api_executions_update', methods: ['PUT'])]
    public function update(int $id, Request $request, ExecutionRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $e = $repo->find($id);
        if (!$e)
            return $this->json(['ok' => false, 'message' => 'Execution introuvable'], 404);

        $p = json_decode($request->getContent(), true) ?: [];

        if (array_key_exists('title', $p)) {
            $e->setTitleExe(trim((string) $p['title']));
        }

        if (array_key_exists('desc', $p)) {
            $e->setDescExe(trim((string) $p['desc']));
        }

        if (array_key_exists('status', $p)) {
            $e->setStatusExe((string) $p['status']);
        }

        $em->flush();
        return $this->json(['ok' => true]);
    }

    #[Route('/{id}', name: 'api_executions_delete', methods: ['DELETE'])]
    public function delete(int $id, ExecutionRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $e = $repo->find($id);
        if (!$e)
            return $this->json(['ok' => false, 'message' => 'Execution introuvable'], 404);

        $em->remove($e);
        $em->flush();

        return $this->json(['ok' => true]);
    }
}
