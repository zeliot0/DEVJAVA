<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class OpenverseImageSearchService
{
    private const ENDPOINT = 'https://api.openverse.org/v1/images';
    private const CACHE_TTL_SECONDS = 21600; // 6h

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private LoggerInterface $logger,
    ) {}

    /**
     * @return array{items: list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>, error: ?string}
     */
    public function searchImages(string $query, int $limit = 24, int $page = 1): array
    {
        $query = trim($query);
        if ($query === '') {
            return ['items' => [], 'error' => null];
        }

        $limit = max(1, min(100, $limit));
        $page = max(1, min(100, $page));

        $cacheKey = 'openverse_images.' . sha1(implode('|', [$query, (string) $limit, (string) $page]));

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($query, $limit, $page): array {
            try {
                $items = $this->fetchImages($query, $limit, $page);
                $item->expiresAfter(self::CACHE_TTL_SECONDS);

                return ['items' => $items, 'error' => null];
            } catch (\RuntimeException $e) {
                $item->expiresAfter(60);
                return ['items' => [], 'error' => $e->getMessage()];
            } catch (\Throwable $e) {
                $item->expiresAfter(60);

                $this->logger->error('Openverse image search failed.', [
                    'exception' => $e,
                    'query' => $query,
                ]);

                return ['items' => [], 'error' => 'Erreur lors de la recuperation depuis Openverse.'];
            }
        });
    }

    /**
     * @return list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>
     *
     * @throws ExceptionInterface
     */
    private function fetchImages(string $query, int $limit, int $page): array
    {
        $pageSize = min(50, $limit);

        $response = $this->httpClient->request('GET', self::ENDPOINT, [
            'query' => [
                'q' => $query,
                'page_size' => $pageSize,
                'page' => $page,
            ],
            'headers' => [
                'Accept' => 'application/json',
                // Openverse asks for a UA identifying the client.
                'User-Agent' => 'NEXA/1.0 (Symfony)',
            ],
        ]);

        $data = $response->toArray(false);

        if (is_array($data) && isset($data['detail']) && is_string($data['detail'])) {
            throw new \RuntimeException('Openverse: ' . $data['detail']);
        }

        $rawResults = $data['results'] ?? [];
        if (!is_array($rawResults) || count($rawResults) === 0) {
            return [];
        }

        $results = [];

        foreach ($rawResults as $raw) {
            if (!is_array($raw)) {
                continue;
            }

            $imageUrl = trim((string) ($raw['url'] ?? ''));
            $thumbnailUrl = trim((string) ($raw['thumbnail'] ?? $raw['thumbnail_url'] ?? ''));
            $contextUrl = trim((string) ($raw['foreign_landing_url'] ?? $raw['detail_url'] ?? ''));

            if ($imageUrl === '' && $thumbnailUrl === '') {
                continue;
            }

            $provider = trim((string) ($raw['provider'] ?? 'Openverse'));
            $license = trim((string) ($raw['license'] ?? ''));
            $creator = trim((string) ($raw['creator'] ?? ''));

            $title = trim((string) ($raw['title'] ?? 'Image'));
            if ($title === '') {
                $title = 'Image';
            }

            $snippetParts = [];
            if ($creator !== '') {
                $snippetParts[] = $creator;
            }
            if ($license !== '') {
                $snippetParts[] = strtoupper($license);
            }
            $snippet = implode(' • ', $snippetParts);
            if ($snippet === '') {
                $snippet = 'Openverse';
            }

            $results[] = [
                'title' => $title,
                'snippet' => $snippet,
                'imageUrl' => $imageUrl,
                'thumbnailUrl' => $thumbnailUrl,
                'contextUrl' => $contextUrl,
                'displayLink' => $provider !== '' ? $provider : 'Openverse',
            ];

            if (count($results) >= $limit) {
                break;
            }
        }

        return $results;
    }
}
