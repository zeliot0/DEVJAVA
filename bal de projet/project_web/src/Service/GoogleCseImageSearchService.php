<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class GoogleCseImageSearchService
{
    private const ENDPOINT = 'https://www.googleapis.com/customsearch/v1';
    private const MAX_RESULTS_PER_REQUEST = 10;
    private const CACHE_TTL_SECONDS = 21600; // 6h

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private LoggerInterface $logger,
        #[Autowire('%env(default::GOOGLE_CSE_API_KEY)%')]
        private ?string $apiKey,
        #[Autowire('%env(default::GOOGLE_CSE_CX)%')]
        private ?string $cx,
        #[Autowire('%env(default::GOOGLE_CSE_RIGHTS)%')]
        private ?string $rights,
    ) {}

    public function isConfigured(): bool
    {
        $apiKey = trim((string) $this->apiKey);
        $cx = trim((string) $this->cx);

        if ($apiKey === '' || $cx === '') {
            return false;
        }

        $upperApiKey = strtoupper($apiKey);
        $upperCx = strtoupper($cx);

        $apiKeyPlaceholders = ['CHANGE_ME', 'TON_API_KEY', 'YOUR_API_KEY'];
        $cxPlaceholders = ['CHANGE_ME', 'TON_CX', 'YOUR_CX'];

        if (in_array($upperApiKey, $apiKeyPlaceholders, true) || in_array($upperCx, $cxPlaceholders, true)) {
            return false;
        }

        return true;
    }

    /**
     * @return array{items: list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>, error: ?string}
     */
    public function searchImages(string $query, int $limit = 24, int $startIndex = 1): array
    {
        $query = trim($query);
        if ($query === '') {
            return ['items' => [], 'error' => null];
        }

        if (!$this->isConfigured()) {
            return ['items' => [], 'error' => 'Google CSE non configure (GOOGLE_CSE_API_KEY / GOOGLE_CSE_CX).'];
        }

        $limit = max(1, min(100, $limit));
        $startIndex = max(1, $startIndex);

        $cacheKey = 'google_cse_images.' . sha1(implode('|', [$query, (string) $limit, (string) $startIndex, (string) $this->rights]));

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($query, $limit, $startIndex): array {
            try {
                $items = $this->fetchImages($query, $limit, $startIndex);
                $item->expiresAfter(self::CACHE_TTL_SECONDS);

                return ['items' => $items, 'error' => null];
            } catch (\RuntimeException $e) {
                // Keep errors cached for a short time to avoid "sticky" failures when the user fixes keys.
                $item->expiresAfter(60);

                return ['items' => [], 'error' => $e->getMessage()];
            } catch (\Throwable $e) {
                $item->expiresAfter(60);

                $this->logger->error('Google CSE image search failed.', [
                    'exception' => $e,
                    'query' => $query,
                ]);

                return ['items' => [], 'error' => 'Erreur lors de la recuperation depuis Google.'];
            }
        });
    }

    /**
     * @return list<array{title: string, snippet: string, imageUrl: string, thumbnailUrl: string, contextUrl: string, displayLink: string}>
     *
     * @throws ExceptionInterface
     */
    private function fetchImages(string $query, int $limit, int $startIndex): array
    {
        $results = [];

        $remaining = $limit;
        $start = $startIndex;
        $maxRequests = min(10, (int) ceil($limit / self::MAX_RESULTS_PER_REQUEST));
        $requestCount = 0;

        while ($remaining > 0 && $requestCount < $maxRequests) {
            $num = min(self::MAX_RESULTS_PER_REQUEST, $remaining);

            $params = [
                'key' => $this->apiKey,
                'cx' => $this->cx,
                'q' => $query,
                'searchType' => 'image',
                'safe' => 'active',
                'imgType' => 'photo',
                'num' => $num,
                'start' => $start,
            ];

            $rights = trim((string) $this->rights);
            if ($rights !== '') {
                $params['rights'] = $rights;
            }

            $response = $this->httpClient->request('GET', self::ENDPOINT, [
                'query' => $params,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $data = $response->toArray(false);
            if (is_array($data) && isset($data['error']) && is_array($data['error'])) {
                $message = (string) ($data['error']['message'] ?? '');
                $code = (string) ($data['error']['code'] ?? '');

                $prefix = 'Google CSE';
                if ($code !== '') {
                    $prefix .= ' (' . $code . ')';
                }

                $details = trim($message) !== '' ? $message : 'Erreur API.';
                throw new \RuntimeException($prefix . ': ' . $details);
            }

            $items = $data['items'] ?? [];
            if (!is_array($items) || count($items) === 0) {
                break;
            }

            foreach ($items as $raw) {
                if (!is_array($raw)) {
                    continue;
                }

                $imageUrl = (string) ($raw['link'] ?? '');
                $thumbnailUrl = (string) ($raw['image']['thumbnailLink'] ?? '');
                if ($imageUrl === '' && $thumbnailUrl === '') {
                    continue;
                }

                $results[] = [
                    'title' => (string) ($raw['title'] ?? 'Image'),
                    'snippet' => (string) ($raw['snippet'] ?? ''),
                    'imageUrl' => $imageUrl,
                    'thumbnailUrl' => $thumbnailUrl,
                    'contextUrl' => (string) ($raw['image']['contextLink'] ?? ''),
                    'displayLink' => (string) ($raw['displayLink'] ?? ''),
                ];

                if (count($results) >= $limit) {
                    break;
                }
            }

            $remaining = $limit - count($results);
            $start += $num;
            $requestCount++;
        }

        return $results;
    }
}
