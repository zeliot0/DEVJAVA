<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\ConscienceCoachingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/conscience')]
final class ConscienceAiController extends AbstractController
{
    #[Route('/sentiment', name: 'app_conscience_sentiment', methods: ['POST'])]
    public function sentiment(Request $request, ConscienceCoachingService $conscienceCoachingService): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            $payload = $request->request->all();
        }

        $text = trim((string) ($payload['text'] ?? $payload['message'] ?? ''));
        if ($text === '') {
            return $this->json(['error' => 'text is required'], 422);
        }

        return $this->json([
            'ok' => true,
            'data' => $conscienceCoachingService->analyzeText($text),
        ]);
    }

    #[Route('/coaching', name: 'app_conscience_coaching', methods: ['GET', 'POST'])]
    public function coaching(Request $request, ConscienceCoachingService $conscienceCoachingService): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['error' => 'unauthorized'], 401);
        }

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            $payload = [];
        }

        $message = trim((string) ($payload['message'] ?? $request->query->get('message', '')));
        $data = $conscienceCoachingService->buildForUser($user, $message !== '' ? $message : null);

        return $this->json([
            'ok' => true,
            'data' => $data,
        ]);
    }
}

