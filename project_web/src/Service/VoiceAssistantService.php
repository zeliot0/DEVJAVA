<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class VoiceAssistantService
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $openAiApiKey = ''
    ) {}

    /**
     * @param array<int, array{role:string,text:string}> $history
     * @return array{reply:string,source:string,intent:string,action:?string,data:array<string,mixed>}
     */
    public function interpret(string $message, array $history): array
    {
        $fallback = $this->fallbackInterpret($message, $history);
        $apiKey = trim($this->openAiApiKey);

        if ($apiKey === '') {
            return $fallback;
        }

        $messages = [
            [
                'role' => 'system',
                'content' => $this->systemPrompt(),
            ],
        ];

        foreach (array_slice($history, -8) as $line) {
            $role = (($line['role'] ?? 'user') === 'assistant') ? 'assistant' : 'user';
            $content = trim((string) ($line['text'] ?? ''));
            if ($content !== '') {
                $messages[] = ['role' => $role, 'content' => $content];
            }
        }

        $messages[] = ['role' => 'user', 'content' => $message];

        try {
            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4o-mini',
                    'temperature' => 0.2,
                    'max_tokens' => 220,
                    'messages' => $messages,
                    'response_format' => [
                        'type' => 'json_object',
                    ],
                ],
                'timeout' => 10,
            ]);

            $payload = $response->toArray(false);
            $content = trim((string) ($payload['choices'][0]['message']['content'] ?? ''));
            if ($content === '') {
                return $fallback;
            }

            $json = json_decode($content, true);
            if (!is_array($json)) {
                return $fallback;
            }

            $intent = (string) ($json['intent'] ?? 'chat');
            $action = isset($json['action']) ? (string) $json['action'] : null;
            $reply = trim((string) ($json['reply'] ?? ''));
            $data = is_array($json['data'] ?? null) ? $json['data'] : [];

            if ($reply === '') {
                $reply = $fallback['reply'];
            }

            return [
                'reply' => $reply,
                'source' => 'openai',
                'intent' => $intent,
                'action' => $action,
                'data' => $data,
            ];
        } catch (\Throwable) {
            return $fallback;
        }
    }

    /**
     * @param array<int, array{role:string,text:string}> $history
     * @return array{reply:string,source:string,intent:string,action:?string,data:array<string,mixed>}
     */
    private function fallbackInterpret(string $message, array $history): array
    {
        $text = $this->normalize($message);

        if ($this->containsAny($text, ['bonjour', 'salut', 'cc'])) {
            return $this->result('Bonjour. Dites-moi ce que vous voulez faire dans NEXA.', 'fallback', 'chat', null, []);
        }

        if ($this->containsAny($text, ['merci'])) {
            return $this->result('Avec plaisir.', 'fallback', 'chat', null, []);
        }

        if ($this->containsAny($text, ['annuler', 'cancel'])) {
            return $this->result('Action annulee.', 'fallback', 'cancel', null, []);
        }

        if ($this->containsAny($text, ['supprimer tache', 'effacer tache', 'delete task'])) {
            $title = $this->extractAfterKeyword($text, ['supprimer tache', 'effacer tache', 'delete task']);
            return $this->result('Je prepare la suppression de la tache demandee.', 'fallback', 'delete_task', null, ['title' => $title]);
        }

        if ($this->containsAny($text, ['combien', 'nombre']) && $this->containsAny($text, ['tache', 'task'])) {
            return $this->result('Je calcule le nombre de taches.', 'fallback', 'count_tasks', null, []);
        }

        if ($this->containsAny($text, ['liste tache', 'mes taches', 'show tasks', 'voir taches'])) {
            return $this->result('Je recupere vos taches.', 'fallback', 'list_tasks', null, []);
        }

        if ($this->containsAny($text, ['creer tache', 'cree tache', 'ajouter tache', 'create task'])) {
            $title = $this->extractAfterKeyword($text, ['creer tache', 'cree tache', 'ajouter tache', 'create task']);
            return $this->result('Je vais creer la tache.', 'fallback', 'create_task', null, ['title' => $title]);
        }

        if ($this->containsAny($text, ['inscription', 'inscrire', 'inscri', 'insrit', 'register'])) {
            return $this->result('J ouvre la page d inscription.', 'fallback', 'navigate', 'app_register', []);
        }

        if ($this->containsAny($text, ['connexion', 'connecter', 'login'])) {
            return $this->result('J ouvre la page de connexion.', 'fallback', 'navigate', 'app_login', []);
        }

        if ($this->containsAny($text, ['profil', 'profile'])) {
            return $this->result('J ouvre votre profil.', 'fallback', 'navigate', 'app_profile', []);
        }

        if ($this->containsAny($text, ['mot de passe oublie', 'reset'])) {
            return $this->result('J ouvre la page mot de passe oublie.', 'fallback', 'navigate', 'app_forgot_password', []);
        }

        if ($this->containsAny($text, ['dashboard admin', 'admin dashboard'])) {
            return $this->result('J ouvre le dashboard admin.', 'fallback', 'navigate', 'admin_dashboard', []);
        }

        if ($this->containsAny($text, ['utilisateurs', 'users admin', 'gestion utilisateurs'])) {
            return $this->result('J ouvre la liste des utilisateurs.', 'fallback', 'navigate', 'admin_users', []);
        }

        if ($this->containsAny($text, ['tache', 'task'])) {
            return $this->result('J ouvre vos taches.', 'fallback', 'navigate', 'app_task_index', []);
        }

        $lastAssistant = null;
        for ($i = count($history) - 1; $i >= 0; $i--) {
            if (($history[$i]['role'] ?? '') === 'assistant') {
                $lastAssistant = (string) ($history[$i]['text'] ?? '');
                break;
            }
        }

        if ($lastAssistant !== null) {
            return $this->result('D accord. ' . $lastAssistant, 'fallback', 'chat', null, []);
        }

        return $this->result('Je vous ecoute. Dites: creer tache, ouvrir profil, ou ouvrir inscription.', 'fallback', 'chat', null, []);
    }

    private function systemPrompt(): string
    {
        return <<<PROMPT
You are NEXA Assistant, a French voice assistant for a Symfony productivity app.
You must return ONLY valid JSON object with keys:
- intent: one of [navigate, create_task, list_tasks, count_tasks, delete_task, cancel, chat]
- action: route name or null (for navigate intent, use route names: app_login, app_register, app_profile, app_forgot_password, app_task_index, admin_dashboard, admin_users, admin_registration_attempts, app_landing)
- reply: short French sentence for user (max 25 words)
- data: object for extracted values (e.g. title, due_hint, confirm)
Rules:
- Understand misspellings in French.
- If user asks to open/go to page => intent navigate.
- If user asks create task => intent create_task and extract title in data.title.
- If user asks list/count tasks => use list_tasks or count_tasks.
- If user asks delete task => intent delete_task and extract data.title if possible.
- If unclear => intent chat.
Return ONLY JSON.
PROMPT;
    }

    /**
     * @param array<string,mixed> $data
     * @return array{reply:string,source:string,intent:string,action:?string,data:array<string,mixed>}
     */
    private function result(string $reply, string $source, string $intent, ?string $action, array $data): array
    {
        return [
            'reply' => $reply,
            'source' => $source,
            'intent' => $intent,
            'action' => $action,
            'data' => $data,
        ];
    }

    /**
     * @param string[] $needles
     */
    private function containsAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($needle !== '' && str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string[] $keys
     */
    private function extractAfterKeyword(string $text, array $keys): string
    {
        foreach ($keys as $key) {
            $pos = strpos($text, $key);
            if ($pos !== false) {
                $value = trim(substr($text, $pos + strlen($key)));
                if ($value !== '') {
                    return $value;
                }
            }
        }

        return '';
    }

    private function normalize(string $text): string
    {
        $text = mb_strtolower($text);
        $converted = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        if (is_string($converted) && $converted !== '') {
            $text = strtolower($converted);
        }

        $text = str_replace("'", ' ', $text);
        $text = preg_replace('/[^a-z0-9\s]/', ' ', $text) ?? $text;
        $text = preg_replace('/\s+/', ' ', $text) ?? $text;

        return trim($text);
    }
}
