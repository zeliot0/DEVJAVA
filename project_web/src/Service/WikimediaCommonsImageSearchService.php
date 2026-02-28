<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class WikimediaCommonsImageSearchService
{
    private const ENDPOINT = 'https://commons.wikimedia.org/w/api.php';
    private const CACHE_TTL_SECONDS = 21600; // 6h

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private LoggerInterface $logger,
    ) {}

    /**
     * @return array{items: list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>, error: ?string}
     */
    public function searchImages(string $query, int $limit = 24): array
    {
        $query = trim($query);
        if ($query === '') {
            return ['items' => [], 'error' => null];
        }

        $limit = max(1, min(50, $limit));

        $cacheKey = 'wikimedia_commons_images.' . sha1($query . '|' . $limit);

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($query, $limit): array {
            try {
                $items = $this->fetchImages($query, $limit);
                $item->expiresAfter(self::CACHE_TTL_SECONDS);

                return ['items' => $items, 'error' => null];
            } catch (\RuntimeException $e) {
                $item->expiresAfter(60);
                return ['items' => [], 'error' => $e->getMessage()];
            } catch (\Throwable $e) {
                $item->expiresAfter(60);

                $this->logger->error('Wikimedia Commons image search failed.', [
                    'exception' => $e,
                    'query' => $query,
                ]);

                return ['items' => [], 'error' => 'Erreur lors de la recuperation depuis Wikimedia Commons.'];
            }
        });
    }

    /**
     * @return list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>
     *
     * @throws ExceptionInterface
     */
    private function fetchImages(string $query, int $limit): array
    {
        $response = $this->httpClient->request('GET', self::ENDPOINT, [
            'query' => [
                'action' => 'query',
                'format' => 'json',
                'generator' => 'search',
                'gsrsearch' => $query,
                'gsrlimit' => $limit,
                'gsrnamespace' => 6, // File:
                'prop' => 'imageinfo',
                'iiprop' => 'url|mime',
                'iiurlwidth' => 900,
            ],
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'NEXA/1.0 (Symfony)',
            ],
        ]);

        $data = $response->toArray(false);
        if (!is_array($data)) {
            return [];
        }

        if (isset($data['error']) && is_array($data['error'])) {
            $info = (string) ($data['error']['info'] ?? 'Erreur API.');
            throw new \RuntimeException('Wikimedia Commons: ' . $info);
        }

        $pages = $data['query']['pages'] ?? null;
        if (!is_array($pages) || count($pages) === 0) {
            return [];
        }

        $results = [];

        foreach ($pages as $page) {
            if (!is_array($page)) {
                continue;
            }

            $title = trim((string) ($page['title'] ?? 'Image'));
            if ($title === '') {
                $title = 'Image';
            }

            $imageinfo = $page['imageinfo'][0] ?? null;
            if (!is_array($imageinfo)) {
                continue;
            }

            $mime = strtolower((string) ($imageinfo['mime'] ?? ''));
            if ($mime !== '' && !str_starts_with($mime, 'image/')) {
                continue;
            }
            if ($mime === 'image/svg+xml') {
                continue;
            }

            $imageUrl = trim((string) ($imageinfo['url'] ?? ''));
            $thumbnailUrl = trim((string) ($imageinfo['thumburl'] ?? ''));

            if ($imageUrl === '' && $thumbnailUrl === '') {
                continue;
            }

            $contextUrl = trim((string) ($imageinfo['descriptionurl'] ?? ''));

            $results[] = [
                'title' => $title,
                'snippet' => 'Wikimedia Commons',
                'imageUrl' => $imageUrl,
                'thumbnailUrl' => $thumbnailUrl,
                'contextUrl' => $contextUrl,
                'displayLink' => 'Wikimedia Commons',
            ];

            if (count($results) >= $limit) {
                break;
            }
        }

        return $results;
    }
}

