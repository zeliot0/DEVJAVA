<?php

namespace App\Service;

use App\Entity\Theme;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class NewsFocusService
{
    private const NEWSAPI_ENDPOINT = 'https://newsapi.org/v2/everything';
    private const MEDIASTACK_ENDPOINT = 'http://api.mediastack.com/v1/news';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly CacheInterface $cache,
        private readonly LoggerInterface $logger,
        private readonly string $newsApiKey = '',
        private readonly string $mediastackKey = ''
    ) {
    }

    /**
     * @param Theme[] $themes
     * @return array<int, array<int, array<string, string>>>
     */
    public function buildForThemes(array $themes, int $limitPerTheme = 2): array
    {
        $result = [];
        foreach ($themes as $theme) {
            $themeId = $theme->getIdT();
            if ($themeId === null) {
                continue;
            }

            $topics = $this->buildTopicCandidates($theme);
            $articles = [];
            foreach ($topics as $topic) {
                $articles = $this->fetchByTopic($topic, $limitPerTheme);
                if ($articles !== []) {
                    break;
                }
            }

            $result[$themeId] = $articles;
        }

        return $result;
    }

    /**
     * @return string[]
     */
    private function buildTopicCandidates(Theme $theme): array
    {
        $candidates = [];

        $name = trim((string) $theme->getNom());
        if ($name !== '') {
            $candidates[] = $name;
        }

        $intention = trim((string) $theme->getIntention());
        if ($intention !== '') {
            $intentionShort = $this->firstWords($intention, 6);
            if ($intentionShort !== '') {
                $candidates[] = $intentionShort;
            }
        }

        $description = trim((string) $theme->getDescriptionQ());
        if ($description !== '') {
            $descriptionShort = $this->firstWords($description, 6);
            if ($descriptionShort !== '') {
                $candidates[] = $descriptionShort;
            }
        }

        return array_values(array_unique($candidates));
    }

    private function firstWords(string $value, int $maxWords): string
    {
        $clean = preg_replace('/\s+/', ' ', trim($value)) ?? trim($value);
        if ($clean === '') {
            return '';
        }

        $parts = explode(' ', $clean);
        return trim(implode(' ', array_slice($parts, 0, $maxWords)));
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function fetchByTopic(string $topic, int $limit): array
    {
        if ($topic === '') {
            return [];
        }

        $cacheKey = 'conscience_news_focus_' . md5($topic . '|' . (string) $limit);

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($topic, $limit): array {
            $item->expiresAfter(900);

            $articles = $this->fetchFromNewsApi($topic, $limit);
            if ($articles !== []) {
                return $articles;
            }

            return $this->fetchFromMediastack($topic, $limit);
        });
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function fetchFromNewsApi(string $topic, int $limit): array
    {
        $apiKey = trim($this->newsApiKey);
        if ($apiKey === '') {
            return [];
        }

        try {
            $response = $this->httpClient->request('GET', self::NEWSAPI_ENDPOINT, [
                'query' => [
                    'q' => $topic,
                    'language' => 'fr',
                    'sortBy' => 'publishedAt',
                    'pageSize' => max(5, $limit),
                    'apiKey' => $apiKey,
                ],
                'timeout' => 8,
            ]);

            $payload = $response->toArray(false);
            $rows = $payload['articles'] ?? [];
            if (!is_array($rows)) {
                return [];
            }

            return $this->normalizeNewsApiRows($rows, $limit);
        } catch (ExceptionInterface|\Throwable $e) {
            $this->logger->warning('NewsAPI fetch failed', ['topic' => $topic, 'error' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * @param array<int, mixed> $rows
     * @return array<int, array<string, string>>
     */
    private function normalizeNewsApiRows(array $rows, int $limit): array
    {
        $items = [];
        $seen = [];

        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $title = trim((string) ($row['title'] ?? ''));
            $url = trim((string) ($row['url'] ?? ''));
            if ($title === '' || $url === '' || !filter_var($url, FILTER_VALIDATE_URL)) {
                continue;
            }

            if (isset($seen[$url])) {
                continue;
            }
            $seen[$url] = true;

            $source = '';
            if (isset($row['source']) && is_array($row['source'])) {
                $source = trim((string) ($row['source']['name'] ?? ''));
            }

            $items[] = [
                'title' => $title,
                'url' => $url,
                'source' => $source,
                'publishedAt' => trim((string) ($row['publishedAt'] ?? '')),
            ];

            if (count($items) >= $limit) {
                break;
            }
        }

        return $items;
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function fetchFromMediastack(string $topic, int $limit): array
    {
        $apiKey = trim($this->mediastackKey);
        if ($apiKey === '') {
            return [];
        }

        try {
            $response = $this->httpClient->request('GET', self::MEDIASTACK_ENDPOINT, [
                'query' => [
                    'access_key' => $apiKey,
                    'keywords' => $topic,
                    'languages' => 'fr',
                    'sort' => 'published_desc',
                    'limit' => max(5, $limit),
                ],
                'timeout' => 8,
            ]);

            $payload = $response->toArray(false);
            $rows = $payload['data'] ?? [];
            if (!is_array($rows)) {
                return [];
            }

            return $this->normalizeMediastackRows($rows, $limit);
        } catch (ExceptionInterface|\Throwable $e) {
            $this->logger->warning('Mediastack fetch failed', ['topic' => $topic, 'error' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * @param array<int, mixed> $rows
     * @return array<int, array<string, string>>
     */
    private function normalizeMediastackRows(array $rows, int $limit): array
    {
        $items = [];
        $seen = [];

        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $title = trim((string) ($row['title'] ?? ''));
            $url = trim((string) ($row['url'] ?? ''));
            if ($title === '' || $url === '' || !filter_var($url, FILTER_VALIDATE_URL)) {
                continue;
            }

            if (isset($seen[$url])) {
                continue;
            }
            $seen[$url] = true;

            $source = trim((string) ($row['source'] ?? ''));
            $items[] = [
                'title' => $title,
                'url' => $url,
                'source' => $source,
                'publishedAt' => trim((string) ($row['published_at'] ?? '')),
            ];

            if (count($items) >= $limit) {
                break;
            }
        }

        return $items;
    }
}
