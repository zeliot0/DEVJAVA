<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SecurityService
{
    public function __construct(
        private readonly HttpClientInterface $client
    ) {}

    public function isPasswordCompromised(string $password): bool
    {
        $password = trim($password);
        if ($password === '') {
            return false;
        }

        $hash = strtoupper(sha1($password));
        $prefix = substr($hash, 0, 5);
        $suffix = substr($hash, 5);

        try {
            $response = $this->client->request('GET', sprintf('https://api.pwnedpasswords.com/range/%s', $prefix), [
                'headers' => [
                    // keep explicit user-agent for HIBP compatibility
                    'User-Agent' => 'NEXA-Security-Check',
                ],
                'timeout' => 8,
            ]);

            $body = (string) $response->getContent(false);
            foreach (preg_split("/\r\n|\n|\r/", $body) ?: [] as $line) {
                if ($line === '' || !str_contains($line, ':')) {
                    continue;
                }
                [$leakedSuffix] = explode(':', $line, 2);
                if (strtoupper(trim($leakedSuffix)) === $suffix) {
                    return true;
                }
            }
        } catch (\Throwable) {
            // In case of remote outage, do not block registration.
            return false;
        }

        return false;
    }
}

