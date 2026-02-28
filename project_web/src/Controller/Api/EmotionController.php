<?php

namespace App\Controller\Api;

use App\Service\EmotionalAssistantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Cache\CacheItemPoolInterface;

class EmotionController extends AbstractController
{
    private const EMOTION_COOLDOWN_SECONDS = 30;
    private const PROVIDER_RATE_LIMIT_COOLDOWN_SECONDS = 90;
    private const PROVIDER_QUOTA_COOLDOWN_SECONDS = 900;

    private EmotionalAssistantService $assistant;
    private CacheItemPoolInterface $cache;

    public function __construct(EmotionalAssistantService $assistant, CacheItemPoolInterface $cache)
    {
        $this->assistant = $assistant;
        $this->cache = $cache;
    }

    #[Route('/api/emotion', name: 'api_emotion_detect', methods: ['POST'])]
    #[Route('/emotion/analyze', name: 'emotion_analyze', methods: ['POST'])]
    public function detect(Request $request): JsonResponse
    {
        $identifier = $this->buildIdentifier($request);
        $lockKey = 'emotion_detect_lock_'.$identifier;
        $now = time();

        $lockItem = $this->cache->getItem($lockKey);
        $lock = $lockItem->isHit() ? (array) $lockItem->get() : [];
        $until = (int) ($lock['until'] ?? 0);
        if ($until > $now) {
            $retryAfter = $until - $now;
            return new JsonResponse([
                'ok' => false,
                'error' => sprintf('Rate limit: reessayez dans %d seconde(s).', $retryAfter),
                'retry_after' => $retryAfter,
                'rate_limited' => true,
            ], 429);
        }

        $data = json_decode($request->getContent() ?? '', true);
        $image = $data['image'] ?? null;
        if (!$image) {
            return new JsonResponse(['error' => 'image required'], 400);
        }
        try {
            $result = $this->assistant->detectEmotionFromImage($image);

            $lockItem->set(['until' => $now + self::EMOTION_COOLDOWN_SECONDS]);
            $lockItem->expiresAfter(self::EMOTION_COOLDOWN_SECONDS);
            $this->cache->save($lockItem);

            return new JsonResponse([
                'ok' => true,
                'emotion' => $result['emotion'] ?? null,
                'intensity' => $result['intensity'] ?? null,
                'confidence' => $result['confidence'] ?? null,
            ]);
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            if (str_contains(strtolower($message), 'rate limit')) {
                $lower = strtolower($message);
                $cooldown = self::PROVIDER_RATE_LIMIT_COOLDOWN_SECONDS;
                $userMessage = 'Rate limit atteint. Reessayez dans 90 secondes.';
                if (str_contains($lower, 'quota') || str_contains($lower, 'insufficient_quota')) {
                    $cooldown = self::PROVIDER_QUOTA_COOLDOWN_SECONDS;
                    $userMessage = 'Quota API insuffisant. Verifiez votre compte fournisseur puis reessayez.';
                }

                $lockItem->set(['until' => $now + $cooldown]);
                $lockItem->expiresAfter($cooldown);
                $this->cache->save($lockItem);

                return new JsonResponse([
                    'ok' => false,
                    'error' => $userMessage,
                    'retry_after' => $cooldown,
                    'rate_limited' => true,
                ], 429);
            }
            return new JsonResponse([
                'ok' => false,
                'error' => $message,
            ], 503);
        }
    }

    #[Route('/api/emotion/status', name: 'api_emotion_status', methods: ['GET'])]
    public function status(Request $request): JsonResponse
    {
        $identifier = $this->buildIdentifier($request);
        $lockKey = 'emotion_detect_lock_'.$identifier;
        $lockItem = $this->cache->getItem($lockKey);
        $lock = $lockItem->isHit() ? (array) $lockItem->get() : [];
        $retryAfter = max(0, ((int) ($lock['until'] ?? 0)) - time());

        return new JsonResponse([
            'ok' => true,
            'available' => $retryAfter === 0,
            'retry_after' => $retryAfter,
        ]);
    }

    private function buildIdentifier(Request $request): string
    {
        $userPart = $this->getUser() ? 'u_'.$this->getUser()->getUserIdentifier() : 'guest';
        $ip = $request->getClientIp() ?? 'unknown';
        return sha1($userPart.'|'.$ip);
    }
}
