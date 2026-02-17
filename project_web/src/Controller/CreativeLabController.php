<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreativeLabController extends AbstractController
{
    private const CHALLENGES = [
        [
            'id' => 'map',
            'question' => 'J ai des villes sans maisons et des rivieres sans eau. Qui suis-je ?',
            'answers' => ['carte', 'une carte'],
        ],
        [
            'id' => 'echo',
            'question' => 'Je parle sans bouche et j entends sans oreilles. Qui suis-je ?',
            'answers' => ['echo', 'écho'],
        ],
        [
            'id' => 'shadow',
            'question' => 'Je vous suis partout mais disparais dans le noir. Qui suis-je ?',
            'answers' => ['ombre', 'mon ombre'],
        ],
        [
            'id' => 'clock',
            'question' => 'Je fais le tour du monde tout en restant dans un coin. Qui suis-je ?',
            'answers' => ['timbre', 'un timbre'],
        ],
    ];

    #[Route('/creative-lab', name: 'app_creative_lab', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('creative_lab/index.html.twig');
    }

    #[Route('/api/creative-lab/challenge', name: 'app_api_creative_lab_challenge', methods: ['GET'])]
    public function challenge(): JsonResponse
    {
        $challenge = self::CHALLENGES[array_rand(self::CHALLENGES)];

        return $this->json([
            'id' => $challenge['id'],
            'question' => $challenge['question'],
        ]);
    }

    #[Route('/api/creative-lab/challenge/check', name: 'app_api_creative_lab_challenge_check', methods: ['POST'])]
    public function checkChallenge(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            $payload = $request->request->all();
        }

        $id = (string) ($payload['id'] ?? '');
        $answer = (string) ($payload['answer'] ?? '');
        if ($id === '' || $answer === '') {
            return $this->json([
                'ok' => false,
                'message' => 'Challenge ou reponse manquant.',
            ], 400);
        }

        $challenge = null;
        foreach (self::CHALLENGES as $item) {
            if (($item['id'] ?? '') === $id) {
                $challenge = $item;
                break;
            }
        }

        if ($challenge === null) {
            return $this->json([
                'ok' => false,
                'message' => 'Challenge introuvable.',
            ], 404);
        }

        $normalizedAnswer = $this->normalize($answer);
        $isCorrect = false;
        foreach (($challenge['answers'] ?? []) as $valid) {
            if ($this->normalize((string) $valid) === $normalizedAnswer) {
                $isCorrect = true;
                break;
            }
        }

        return $this->json([
            'ok' => $isCorrect,
            'message' => $isCorrect
                ? 'Bonne reponse. Bravo.'
                : 'Pas encore. Essayez encore.',
        ]);
    }

    private function normalize(string $value): string
    {
        $normalized = trim(mb_strtolower($value));
        $converted = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $normalized);
        if ($converted !== false) {
            $normalized = $converted;
        }

        return preg_replace('/\s+/', ' ', $normalized) ?? $normalized;
    }
}
