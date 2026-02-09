<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/jobs')]
final class JobApiController extends AbstractController
{
    #[Route('', name: 'api_jobs_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true) ?: [];
        $type = trim((string) ($payload['type'] ?? 'generic'));

        $id = $this->newJobId();
        $now = (new \DateTimeImmutable())->format('Y-m-d H:i:s');

        $job = [
            'id' => $id,
            'type' => $type,
            'status' => 'done',
            'createdAt' => $now,
            'startedAt' => $now,
            'finishedAt' => $now,
            'progress' => 100,
            'result' => [
                'message' => 'Job executed successfully',
                'payload' => $payload['payload'] ?? null,
            ],
        ];

        $this->saveJob($job);

        return $this->json([
            'ok' => true,
            'data' => [
                'id' => $id,
                'status' => $job['status'],
            ],
        ], 201);
    }

    #[Route('/{id}', name: 'api_jobs_status', methods: ['GET'])]
    public function status(string $id): JsonResponse
    {
        $job = $this->loadJob($id);
        if (!$job) {
            return $this->json(['error' => 'Job not found'], 404);
        }

        return $this->json([
            'ok' => true,
            'data' => [
                'id' => $job['id'],
                'type' => $job['type'],
                'status' => $job['status'],
                'progress' => $job['progress'],
                'createdAt' => $job['createdAt'],
                'startedAt' => $job['startedAt'],
                'finishedAt' => $job['finishedAt'],
            ],
        ]);
    }

    #[Route('/{id}/result', name: 'api_jobs_result', methods: ['GET'])]
    public function result(string $id): JsonResponse
    {
        $job = $this->loadJob($id);
        if (!$job) {
            return $this->json(['error' => 'Job not found'], 404);
        }

        return $this->json([
            'ok' => true,
            'data' => [
                'id' => $job['id'],
                'status' => $job['status'],
                'result' => $job['result'] ?? null,
            ],
        ]);
    }

    private function newJobId(): string
    {
        return 'job_' . bin2hex(random_bytes(8));
    }

    private function getJobsDir(): string
    {
        return $this->getParameter('kernel.project_dir') . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'api_jobs';
    }

    private function getJobPath(string $id): string
    {
        return $this->getJobsDir() . DIRECTORY_SEPARATOR . $id . '.json';
    }

    private function saveJob(array $job): void
    {
        $dir = $this->getJobsDir();
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        file_put_contents(
            $this->getJobPath((string) $job['id']),
            json_encode($job, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }

    private function loadJob(string $id): ?array
    {
        $path = $this->getJobPath($id);
        if (!is_file($path)) {
            return null;
        }

        $raw = file_get_contents($path);
        $data = is_string($raw) ? json_decode($raw, true) : null;

        return is_array($data) ? $data : null;
    }
}
