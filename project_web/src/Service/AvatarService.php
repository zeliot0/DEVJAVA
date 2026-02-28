<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AvatarService
{
    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    public function generateAndStore(?string $seed, string $targetDir): ?string
    {
        $seed = trim((string) $seed);
        if ($seed === '') {
            $seed = 'nexa-user-' . bin2hex(random_bytes(4));
        }

        if (!is_dir($targetDir) && !mkdir($targetDir, 0775, true) && !is_dir($targetDir)) {
            return null;
        }

        try {
            // Comic/cartoon avatar style (matches playful product UI).
            $comicAvatarUrl = sprintf(
                'https://api.dicebear.com/9.x/adventurer/png?seed=%s&radius=50&backgroundType=gradientLinear',
                rawurlencode($seed)
            );

            $comicAvatar = $this->downloadPng($comicAvatarUrl, $targetDir);
            if ($comicAvatar !== null) {
                return $comicAvatar;
            }

            // Fallback comic style.
            $fallbackUrl = sprintf(
                'https://api.dicebear.com/9.x/fun-emoji/png?seed=%s&radius=50&backgroundType=gradientLinear',
                rawurlencode($seed)
            );

            return $this->downloadPng($fallbackUrl, $targetDir);
        } catch (\Throwable) {
            return null;
        }
    }

    private function downloadPng(string $url, string $targetDir): ?string
    {
        $response = $this->httpClient->request('GET', $url);
        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $content = $response->getContent();
        if ($content === '') {
            return null;
        }

        $filename = bin2hex(random_bytes(16)) . '.png';
        $path = rtrim($targetDir, '/\\') . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($path, $content);

        return $filename;
    }
}
