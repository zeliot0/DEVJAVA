<?php

namespace App\Service;

use App\Entity\Theme;
use App\Entity\User;
use App\Entity\UserNotification;
use App\Repository\ThemeFollowRepository;
use App\Repository\UserNotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class ConscienceNotificationService
{
    public const USER_TOPIC_PREFIX = 'https://nexa.local/conscience/user/';
    public const THEME_TOPIC_PREFIX = 'https://nexa.local/conscience/theme/';

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ThemeFollowRepository $themeFollowRepository,
        private readonly UserNotificationRepository $userNotificationRepository,
        private readonly HubInterface $hub,
        private readonly NotifierInterface $notifier,
        private readonly LoggerInterface $logger
    ) {
    }

    public function notifyNewQuestionForTheme(Theme $theme, ?User $actor = null): int
    {
        $themeName = (string) ($theme->getNom() ?? 'ce theme');
        $follows = $this->themeFollowRepository->findBy(['theme' => $theme]);
        $sent = 0;

        foreach ($follows as $follow) {
            $targetUser = $follow->getUser();
            if (!$targetUser instanceof User) {
                continue;
            }

            if ($actor instanceof User && $targetUser->getId() === $actor->getId()) {
                continue;
            }

            $message = sprintf('Nouveau contenu dans %s.', $themeName);
            $notification = (new UserNotification())
                ->setUser($targetUser)
                ->setType('new_theme_question')
                ->setMessage($message);

            $this->em->persist($notification);
            $this->publishRealtime($targetUser, [
                'type' => 'new_theme_question',
                'themeId' => $theme->getIdT(),
                'themeName' => $themeName,
                'message' => $message,
                'sentAt' => (new \DateTimeImmutable())->format(DATE_ATOM),
            ]);

            $this->sendEmailNotification($targetUser, 'Nouveau contenu Conscience', $message);
            $sent++;
        }

        if ($sent > 0) {
            $this->em->flush();
        }

        return $sent;
    }

    public function ensureDailyPendingReminder(User $user, int $pendingCount, ?\DateTime $day = null): bool
    {
        if ($pendingCount <= 0) {
            return false;
        }

        $day ??= new \DateTime('today');
        $alreadySent = $this->userNotificationRepository->findOneBy([
            'user' => $user,
            'type' => 'daily_pending',
            'notificationDate' => $day,
        ]);

        if ($alreadySent instanceof UserNotification) {
            return false;
        }

        $message = sprintf('Tu as %d questions non repondues.', $pendingCount);
        $notification = (new UserNotification())
            ->setUser($user)
            ->setType('daily_pending')
            ->setMessage($message)
            ->setNotificationDate($day);

        $this->em->persist($notification);
        $this->em->flush();

        $this->publishRealtime($user, [
            'type' => 'daily_pending',
            'pending' => $pendingCount,
            'message' => $message,
            'date' => $day->format('Y-m-d'),
        ]);
        $this->sendEmailNotification($user, 'Rappel Conscience', $message);

        return true;
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function publishRealtime(User $user, array $payload): void
    {
        try {
            $userId = $user->getId();
            if ($userId === null) {
                return;
            }

            $topic = self::USER_TOPIC_PREFIX . $userId;
            $data = json_encode($payload, JSON_UNESCAPED_UNICODE);
            if (!is_string($data) || $data === '') {
                return;
            }

            $this->hub->publish(new Update($topic, $data));
        } catch (\Throwable $e) {
            $this->logger->warning('Conscience Mercure publish failed', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function sendEmailNotification(User $user, string $subject, string $message): void
    {
        $email = $user->getEmail();
        if (!is_string($email) || trim($email) === '') {
            return;
        }

        try {
            $notification = new Notification($subject, ['email']);
            $notification->content($message);
            $this->notifier->send($notification, new Recipient($email));
        } catch (\Throwable $e) {
            $this->logger->warning('Conscience notifier send failed', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
