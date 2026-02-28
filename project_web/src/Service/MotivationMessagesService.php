<?php

namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class MotivationMessagesService
{
    private array $messages = [];
    private string $filePath;

    public function __construct()
    {
        $this->filePath = __DIR__ . '/../../config/data/motivation_data.yaml';

        if (file_exists($this->filePath)) {
            $this->messages = Yaml::parseFile($this->filePath);
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

    public function getMessage(string $mood, int $index): ?array
    {
        $mood = $this->normalizeMood($mood);
        $items = $this->messages['motivation_messages'][$mood] ?? null;
        if (!is_array($items) || !isset($items[$index]) || !is_array($items[$index])) {
            return null;
        }

        return $items[$index];
    }

    public function addMessage(string $mood, array $message): void
    {
        $mood = $this->normalizeMood($mood);
        if ($mood === '') {
            throw new \InvalidArgumentException('Mood invalide.');
        }

        if (!isset($this->messages['motivation_messages'][$mood]) || !is_array($this->messages['motivation_messages'][$mood])) {
            $this->messages['motivation_messages'][$mood] = [];
        }

        $this->messages['motivation_messages'][$mood][] = $this->normalizeMessage($message);
        $this->save();
    }

    public function updateMessage(string $mood, int $index, array $message): bool
    {
        $mood = $this->normalizeMood($mood);
        if (
            !isset($this->messages['motivation_messages'][$mood]) ||
            !is_array($this->messages['motivation_messages'][$mood]) ||
            !isset($this->messages['motivation_messages'][$mood][$index])
        ) {
            return false;
        }

        $this->messages['motivation_messages'][$mood][$index] = $this->normalizeMessage($message);
        $this->save();

        return true;
    }

    public function deleteMessage(string $mood, int $index): bool
    {
        $mood = $this->normalizeMood($mood);
        if (
            !isset($this->messages['motivation_messages'][$mood]) ||
            !is_array($this->messages['motivation_messages'][$mood]) ||
            !isset($this->messages['motivation_messages'][$mood][$index])
        ) {
            return false;
        }

        unset($this->messages['motivation_messages'][$mood][$index]);
        $this->messages['motivation_messages'][$mood] = array_values($this->messages['motivation_messages'][$mood]);

        if ($this->messages['motivation_messages'][$mood] === []) {
            unset($this->messages['motivation_messages'][$mood]);
        }

        $this->save();

        return true;
    }

    private function normalizeMood(string $mood): string
    {
        $mood = strtolower(trim($mood));
        return preg_replace('/[^a-z0-9_-]/', '', $mood) ?? '';
    }

    private function normalizeMessage(array $message): array
    {
        return [
            'arabic' => trim((string) ($message['arabic'] ?? '')),
            'french' => trim((string) ($message['french'] ?? '')),
            'english' => trim((string) ($message['english'] ?? '')),
            'source' => trim((string) ($message['source'] ?? '')),
        ];
    }

    private function save(): void
    {
        if (!isset($this->messages['motivation_messages']) || !is_array($this->messages['motivation_messages'])) {
            $this->messages['motivation_messages'] = [];
        }

        ksort($this->messages['motivation_messages']);

        $yaml = Yaml::dump($this->messages, 6, 2);
        file_put_contents($this->filePath, $yaml);
    }
}
