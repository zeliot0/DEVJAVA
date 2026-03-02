<?php

namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class MotivationMessagesService
{
    private array $messages = [];

    public function __construct()
    {
        // Chemin relatif simple
        $filePath = __DIR__ . '/../../config/data/motivation_data.yaml';

        if (file_exists($filePath)) {
            $this->messages = Yaml::parseFile($filePath);
        } else {
            $this->messages = ['motivation_messages' => []];
        }
    }

    public function getMessagesByMood(string $mood): array
    {
        return $this->messages['motivation_messages'][$mood] ?? [];
    }

    public function getRandomMessage(string $mood): ?array
    {
        $messages = $this->getMessagesByMood($mood);

        if (empty($messages)) {
            return null;
        }

        return $messages[array_rand($messages)];
    }

    public function getAllMessages(): array
    {
        return $this->messages['motivation_messages'] ?? [];
    }

    public function getAvailableMoods(): array
    {
        return array_keys($this->messages['motivation_messages'] ?? []);
    }
}