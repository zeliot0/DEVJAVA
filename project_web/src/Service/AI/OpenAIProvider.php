<?php

namespace App\Service\AI;

use OpenAI\Client;

class OpenAIProvider implements AIProviderInterface
{
    private Client $client;

    public function __construct()
    {
        // create the client using environment variable, fallback to empty
        $apiKey = $_ENV['OPENAI_API_KEY'] ?? $_SERVER['OPENAI_API_KEY'] ?? getenv('OPENAI_API_KEY') ?: '';
        $apiKey = trim((string) $apiKey);
        if ($apiKey === '') {
            throw new \RuntimeException('OPENAI_API_KEY is not configured.');
        }
        $this->client = \OpenAI::client(trim($apiKey));
    }

    public function analyze(string $prompt): array
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
            'temperature' => 0.2,
            'max_tokens' => 300,
        ]);

        $text = $response->choices[0]->message->content ?? '';
        $json = json_decode(trim((string) $text), true);
        if (is_array($json)) {
            return $json;
        }

        // fallback return raw
        return ['text' => $text];
    }
}
