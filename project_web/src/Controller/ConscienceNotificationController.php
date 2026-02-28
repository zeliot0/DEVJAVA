<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserNotificationRepository;
use App\Service\ConscienceNotificationService;
use App\Service\ConsciencePendingService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceNotificationController extends AbstractController
{
    #[Route('/api/conscience/notifications', name: 'app_conscience_notifications', methods: ['GET'])]
    public function index(
        UserNotificationRepository $notificationRepository,
        ConsciencePendingService $consciencePendingService,
        ConscienceNotificationService $conscienceNotificationService,
        EntityManagerInterface $em
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            return new JsonResponse([
                'notifications' => [],
                'pendingCount' => 0,
            ]);
        }

        $pending = $consciencePendingService->countPendingForUserFollowedThemes($user);
        if ($pending <= 0) {
            $pending = $consciencePendingService->countPendingForAllActiveThemes();
        }
        $conscienceNotificationService->ensureDailyPendingReminder($user, $pending);
        $notifications = $notificationRepository->findUnreadByUser($user, 20);

        $items = [];
        foreach ($notifications as $notification) {
            $items[] = [
                'id' => $notification->getId(),
                'type' => $notification->getType(),
                'message' => $notification->getMessage(),
                'createdAt' => $notification->getCreatedAt()->format(DATE_ATOM),
            ];
            $notification->setIsRead(true);
        }

        if ($notifications !== []) {
            $em->flush();
        }

        return new JsonResponse([
            'notifications' => $items,
            'pendingCount' => $pending,
        ]);
    }
}
