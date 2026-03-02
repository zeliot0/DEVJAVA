<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryApiController extends AbstractController
{
    #[Route('/api/categories', name: 'api_categories_list', methods: ['GET'])]
    public function list(CategoryRepository $repo): JsonResponse
    {
        $cats = $repo->findBy([], ['id' => 'DESC']);
        return $this->json(array_map(fn(Category $c) => $this->toArray($c), $cats));
    }

    #[Route('/api/categories/{id}', name: 'api_categories_show', methods: ['GET'])]
    public function show(Category $category): JsonResponse
    {
        return $this->json($this->toArray($category));
    }

    #[Route('/api/categories', name: 'api_categories_create', methods: ['POST'])]
    public function create(
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): JsonResponse
    {
        $d = json_decode($request->getContent(), true);
        if (!is_array($d)) return $this->json(['error' => 'Invalid JSON'], 400);

        $cat = new Category();
        $preErrors = $this->hydrate($cat, $d, false);
        if (!empty($preErrors)) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $preErrors,
            ], 422);
        }

        $violations = $validator->validate($cat);
        if (count($violations) > 0) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $this->violationsToErrors($violations),
            ], 422);
        }

        $em->persist($cat);
        $em->flush();

        return $this->json($this->toArray($cat), 201);
    }

    #[Route('/api/categories/{id}', name: 'api_categories_update', methods: ['PATCH', 'PUT'])]
    public function update(
        Category $category,
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): JsonResponse {
        $d = json_decode($request->getContent(), true);
        if (!is_array($d)) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        $preErrors = $this->hydrate($category, $d, true);
        if (!empty($preErrors)) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $preErrors,
            ], 422);
        }

        $violations = $validator->validate($category);
        if (count($violations) > 0) {
            return $this->json([
                'error' => 'Validation failed',
                'errors' => $this->violationsToErrors($violations),
            ], 422);
        }

        $category->touch();
        $em->flush();

        return $this->json($this->toArray($category));
    }

    #[Route('/api/categories/{id}', name: 'api_categories_delete', methods: ['DELETE'])]
    public function delete(Category $category, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($category);
        $em->flush();

        return $this->json(['ok' => true]);
    }

    private function hydrate(Category $cat, array $d, bool $isUpdate): array
    {
        $errors = [];

        if (!$isUpdate || array_key_exists('name', $d)) {
            $name = trim((string) ($d['name'] ?? ''));
            if ($name === '') {
                $errors['name'][] = 'name is required';
            } else {
                $cat->setName($name);
            }
        }

        if (array_key_exists('description', $d)) {
            $desc = $d['description'];
            $cat->setDescription(($desc === null || trim((string) $desc) === '') ? null : (string) $desc);
        }

        if (array_key_exists('color', $d)) {
            $color = $d['color'];
            $cat->setColor(($color === null || trim((string) $color) === '') ? null : (string) $color);
        }

        if (array_key_exists('icon', $d)) {
            $icon = $d['icon'];
            $cat->setIcon(($icon === null || trim((string) $icon) === '') ? null : (string) $icon);
        }

        if (array_key_exists('isActive', $d)) {
            $cat->setIsActive((bool) $d['isActive']);
        }

        if (array_key_exists('position', $d)) {
            $pos = $d['position'];
            $cat->setPosition(($pos === null || $pos === '') ? null : (int) $pos);
        }

        if (array_key_exists('taskLimit', $d)) {
            $taskLimit = $d['taskLimit'];
            $cat->setTaskLimit(($taskLimit === null || $taskLimit === '') ? null : (int) $taskLimit);
        }

        if (array_key_exists('visibility', $d)) {
            $vis = $d['visibility'];
            $cat->setVisibility(($vis === null || trim((string) $vis) === '') ? null : (string) $vis);
        }

        if (array_key_exists('no', $d)) {
            $no = trim((string) $d['no']);
            if ($no === '') {
                $errors['no'][] = 'no cannot be empty';
            } else {
                $cat->setNo($no);
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

    private function toArray(Category $c): array
    {
        return [
            'id' => $c->getId(),
            'name' => $c->getName(),
            'description' => $c->getDescription(),
            'color' => $c->getColor(),
            'icon' => $c->getIcon(),
            'isActive' => $c->getIsActive(),
            'position' => $c->getPosition(),
            'visibility' => $c->getVisibility(),
            'taskLimit' => $c->getTaskLimit(),
            'createAt' => $c->getCreateAt()->format('Y-m-d H:i:s'),
            'updateAt' => $c->getUpdateAt()?->format('Y-m-d H:i:s'),
            'no' => $c->getNo(),
        ];
    }
}
