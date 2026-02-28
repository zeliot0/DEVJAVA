<?php

namespace App\Service;

use App\Entity\Task;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class TaskDigestMailerService
{
    private const DEFAULT_RECIPIENT = 'glitchstudy404@gmail.com';
    private const DEFAULT_SENDER = 'glitchstudy404@gmail.com';

    public function __construct(
        private MailerInterface $mailer,
        #[Autowire('%env(MAILER_DSN)%')]
        private string $mailerDsn,
        #[Autowire('%env(default::MAILER_DEFAULT_RECIPIENT)%')]
        private ?string $defaultRecipient,
        #[Autowire('%env(default::MAILER_DEFAULT_SENDER)%')]
        private ?string $defaultSender,
        private LoggerInterface $logger,
    ) {}

    /**
     * @param list<Task> $tasks
     */
    public function sendDigest(array $tasks): bool
    {
        $dsn = trim((string) $this->mailerDsn);
        if ($dsn === '' || str_starts_with($dsn, 'null://')) {
            $this->logger->warning('Task digest: MAILER_DSN not configured (null transport).');
            return false;
        }

        $email = (new Email())
            ->from($this->resolveDefaultSender())
            ->to($this->resolveDefaultRecipient())
            ->subject(sprintf('Recap des taches NEXA (%s)', (new \DateTimeImmutable())->format('Y-m-d H:i')))
            ->text($this->buildTextBody($tasks));

        try {
            $this->mailer->send($email);
            return true;
        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Task digest: mailer transport error', ['exception' => $e]);
            return false;
        } catch (\Throwable $e) {
            $this->logger->error('Task digest: unexpected error', ['exception' => $e]);
            return false;
        }
    }

    /**
     * @param list<Task> $tasks
     */
    private function buildTextBody(array $tasks): string
    {
        $lines = [];
        $lines[] = 'RECAP DES TACHES';
        $lines[] = '';
        $lines[] = 'Date: ' . (new \DateTimeImmutable())->format('Y-m-d H:i');
        $lines[] = 'Total: ' . count($tasks);
        $lines[] = '';

        $todo = 0;
        $doing = 0;
        $done = 0;

        foreach ($tasks as $task) {
            $status = strtolower((string) $task->getStatus());
            if ($status === 'done') {
                $done++;
            } elseif ($status === 'doing') {
                $doing++;
            } else {
                $todo++;
            }
        }

        $lines[] = sprintf('A faire: %d | En cours: %d | Terminees: %d', $todo, $doing, $done);
        $lines[] = '';
        $lines[] = 'Liste:';

        foreach ($tasks as $task) {
            $due = $task->getDueAt();
            $dueText = $due ? $due->format('Y-m-d') : 'Sans date';
            $lines[] = sprintf(
                '- #%d | %s | statut=%s | priorite=%s | echeance=%s',
                (int) $task->getId(),
                (string) $task->getTitle(),
                (string) $task->getStatus(),
                (string) $task->getPriority(),
                $dueText
            );
        }

        if (count($tasks) === 0) {
            $lines[] = '- Aucune tache.';
        }

        return implode("\n", $lines);
    }

    private function resolveDefaultRecipient(): string
    {
        $value = trim((string) $this->defaultRecipient);
        if ($value !== '') {
            return $value;
        }

        return self::DEFAULT_RECIPIENT;
    }

    private function resolveDefaultSender(): string
    {
        $value = trim((string) $this->defaultSender);
        if ($value !== '') {
            return $value;
        }

        $dsn = trim((string) $this->mailerDsn);
        if ($dsn !== '') {
            $parts = parse_url($dsn);
            if (is_array($parts) && isset($parts['user'])) {
                $user = urldecode((string) $parts['user']);
                if ($user !== '' && str_contains($user, '@')) {
                    return $user;
                }
            }
        }

        return self::DEFAULT_SENDER;
    }
}
