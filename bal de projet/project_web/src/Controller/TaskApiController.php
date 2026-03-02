<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\CategoryRepository;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class TaskApiController extends AbstractController
{
    #[Route('/api/tasks', name: 'api_tasks_list', methods: ['GET'])]
    public function list(Request $request, TaskRepository $repo): JsonResponse
    {
        $withMeta = filter_var($request->query->get('withMeta', false), FILTER_VALIDATE_BOOL);
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = max(1, min(100, (int) $request->query->get('limit', 20)));

        $status = (string) $request->query->get('status', '');
        $priority = (string) $request->query->get('priority', '');
        $categoryId = (int) $request->query->get('categoryId', 0);
        $q = trim((string) $request->query->get('q', ''));

        $qb = $repo->createQueryBuilder('t')
            ->leftJoin('t.category', 'c')
            ->addSelect('c');

        if ($status !== '') {
            $qb->andWhere('t.status = :status')->setParameter('status', $status);
        }
        if ($priority !== '') {
            $qb->andWhere('t.priority = :priority')->setParameter('priority', $priority);
        }
        if ($categoryId > 0) {
            $qb->andWhere('c.id = :categoryId')->setParameter('categoryId', $categoryId);
        }
        if ($q !== '') {
            $qb
                ->andWhere('LOWER(t.title) LIKE :q OR LOWER(t.description) LIKE :q')
                ->setParameter('q', '%' . strtolower($q) . '%');
        }

        $total = (int) (clone $qb)
            ->select('COUNT(t.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $tasks = $qb
            ->orderBy('t.updateAt', 'DESC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $data = array_map(fn(Task $t) => $this->toArray($t), $tasks);
        if (!$withMeta) {
            return $this->json($data);
        }

        return $this->json([
            'data' => $data,
            'meta' => [
                'page' => $page,
                'limit' => $limit,
                'total' => $total,
                'totalPages' => (int) ceil($total / $limit),
            ],
        ]);
    }

    #[Route('/api/tasks/{id}', name: 'api_tasks_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Task $task): JsonResponse
    {
        return $this->json($this->toArray($task));
    }

    #[Route('/api/tasks', name: 'api_tasks_create', methods: ['POST'])]
    public function create(
        Request $request,
        EntityManagerInterface $em,
        CategoryRepository $catRepo,
        ValidatorInterface $validator
    ): JsonResponse {
        $d = json_decode($request->getContent(), true) ?? [];

        $task = new Task();

        
        $preErrors = $this->hydrate($task, $d, $catRepo);
        if (!empty($preErrors)) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $preErrors,
            ], 422);
        }

        $task->touch();

   
        $violations = $validator->validate($task);
        if (count($violations) > 0) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $this->violationsToErrors($violations),
            ], 422);
        }

        $em->persist($task);
        $em->flush();

        return $this->json($this->toArray($task), 201);
    }

    #[Route('/api/tasks/{id}', name: 'api_tasks_update', methods: ['PATCH','PUT'], requirements: ['id' => '\d+'])]
    public function update(
        Task $task,
        Request $request,
        EntityManagerInterface $em,
        CategoryRepository $catRepo,
        ValidatorInterface $validator
    ): JsonResponse {
        $d = json_decode($request->getContent(), true) ?? [];

        $preErrors = $this->hydrate($task, $d, $catRepo);
        if (!empty($preErrors)) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $preErrors,
            ], 422);
        }

        $task->touch();

        $violations = $validator->validate($task);
        if (count($violations) > 0) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $this->violationsToErrors($violations),
            ], 422);
        }

        $em->flush();
        return $this->json($this->toArray($task));
    }

    #[Route('/api/tasks/{id}', name: 'api_tasks_delete', methods: ['DELETE'], requirements: ['id' => '\d+'])]
    public function delete(Task $task, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($task);
        $em->flush();
        return $this->json(['ok' => true]);
    }
    private function hydrate(Task $t, array $d, CategoryRepository $catRepo): array
    {
        $errors = [];

        if (isset($d['title'])) {
            $t->setTitle((string) $d['title']);
        }

        if (array_key_exists('description', $d)) {
            $desc = $d['description'];
            $t->setDescription(($desc !== null) ? (string)$desc : null);
        }

       
        if (isset($d['priority'])) {
            $t->setPriority((string)$d['priority']);
        }
        if (isset($d['status'])) {
            $t->setStatus((string)$d['status']);
        }

        
        if (array_key_exists('dueAt', $d)) {
            $due = $d['dueAt'];

            if ($due === null || $due === '') {
                $t->setDueAt(null);
            } else {
                try {
                    $t->setDueAt(new \DateTimeImmutable((string)$due));
                } catch (\Throwable) {
                    $errors['dueAt'][] = "Format date invalide (ex: 2026-01-31).";
                }
            }
        }

        
        if (array_key_exists('categoryId', $d)) {
            if ($d['categoryId'] === null || $d['categoryId'] === '' || $d['categoryId'] === 0) {
                $t->setCategory(null);
            } else {
                $catId = (int) $d['categoryId'];
                $cat = $catRepo->find($catId);
                if (!$cat) {
                    $errors['categoryId'][] = "Catégorie introuvable (id=$catId).";
                } else {
                    $t->setCategory($cat);
                }
            }
        }

        return $errors;
    }

    private function violationsToErrors(ConstraintViolationListInterface $violations): array
    {
        $errors = [];
        foreach ($violations as $v) {
            $field = (string) $v->getPropertyPath();
            $errors[$field][] = $v->getMessage();
        }
        return $errors;
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
            'createAt' => $task->getCreateAt()->format('Y-m-d H:i:s'),
            'updateAt' => $task->getUpdateAt()->format('Y-m-d H:i:s'),

            
            'categoryId' => $cat?->getId(),
            'categoryName' => $cat?->getName(),
            'categoryColor' => $cat?->getColor(),
            'categoryIcon' => $cat?->getIcon(),
        ];
    }
}
