<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

class TaskRealtimePublisher
{
    public const TOPIC = 'https://nexa.local/tasks';

    public function __construct(
        private readonly HubInterface $hub,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function publish(string $action, array $payload = []): void
    {
        try {
            $data = json_encode([
                'action' => $action,
                'payload' => $payload,
                'sentAt' => (new \DateTimeImmutable())->format(DATE_ATOM),
            ], JSON_UNESCAPED_UNICODE);

            if (!is_string($data) || $data === '') {
                return;
            }

            $this->hub->publish(new Update(self::TOPIC, $data));
        } catch (\Throwable $e) {
            // Mercure should enhance realtime UX, not break task APIs.
            $this->logger->warning('Task Mercure publish failed', [
                'action' => $action,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
