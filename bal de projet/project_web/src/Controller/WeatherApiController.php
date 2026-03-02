<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/weather')]
final class WeatherApiController extends AbstractController
{
    #[Route('/current', name: 'api_weather_current', methods: ['GET'])]
    public function current(Request $request, HttpClientInterface $httpClient): JsonResponse
    {
        $city = trim((string) $request->query->get('city', 'Tunis'));

        try {
            $geo = $httpClient->request('GET', 'https://geocoding-api.open-meteo.com/v1/search', [
                'query' => [
                    'name' => $city,
                    'count' => 1,
                    'language' => 'fr',
                    'format' => 'json',
                ],
            ])->toArray();
        } catch (TransportExceptionInterface|\Throwable) {
            return $this->json($this->fallbackWeather($city, 'provider_unavailable'));
        }

        $first = $geo['results'][0] ?? null;
        if (!is_array($first)) {
            return $this->json($this->fallbackWeather($city, 'city_not_found'));
        }

        $lat = (float) ($first['latitude'] ?? 0);
        $lon = (float) ($first['longitude'] ?? 0);

        try {
            $forecast = $httpClient->request('GET', 'https://api.open-meteo.com/v1/forecast', [
                'query' => [
                    'latitude' => $lat,
                    'longitude' => $lon,
                    'current' => 'temperature_2m,relative_humidity_2m,apparent_temperature,weather_code,wind_speed_10m',
                    'daily' => 'weather_code,temperature_2m_max,temperature_2m_min',
                    'timezone' => 'auto',
                    'forecast_days' => 5,
                ],
            ])->toArray();
        } catch (TransportExceptionInterface|\Throwable) {
            return $this->json($this->fallbackWeather((string) ($first['name'] ?? $city), 'provider_unavailable'));
        }

        $current = $forecast['current'] ?? [];
        $daily = $forecast['daily'] ?? [];

        $days = [];
        $dates = $daily['time'] ?? [];
        $max = $daily['temperature_2m_max'] ?? [];
        $min = $daily['temperature_2m_min'] ?? [];
        $codes = $daily['weather_code'] ?? [];
        $count = min(count($dates), count($max), count($min), count($codes));

        for ($i = 0; $i < $count; $i++) {
            $days[] = [
                'date' => $dates[$i],
                'tempMax' => $max[$i],
                'tempMin' => $min[$i],
                'weatherCode' => $codes[$i],
                'weatherLabel' => $this->weatherLabel((int) $codes[$i]),
            ];
        }

        return $this->json([
            'ok' => true,
            'source' => 'open-meteo',
            'data' => [
                'city' => $first['name'] ?? $city,
                'country' => $first['country'] ?? null,
                'latitude' => $lat,
                'longitude' => $lon,
                'current' => [
                    'temperature' => $current['temperature_2m'] ?? null,
                    'apparentTemperature' => $current['apparent_temperature'] ?? null,
                    'humidity' => $current['relative_humidity_2m'] ?? null,
                    'windSpeed' => $current['wind_speed_10m'] ?? null,
                    'weatherCode' => $current['weather_code'] ?? null,
                    'weatherLabel' => $this->weatherLabel((int) ($current['weather_code'] ?? -1)),
                    'time' => $current['time'] ?? null,
                ],
                'forecast' => $days,
            ],
        ]);
    }

    private function fallbackWeather(string $city, string $reason): array
    {
        $today = new \DateTimeImmutable('today');
        $forecast = [];
        $codes = [1, 2, 3, 61, 80];

        for ($i = 0; $i < 5; $i++) {
            $date = $today->modify('+' . $i . ' day');
            $min = 12 + $i;
            $max = 20 + $i;
            $code = $codes[$i % count($codes)];
            $forecast[] = [
                'date' => $date->format('Y-m-d'),
                'tempMax' => $max,
                'tempMin' => $min,
                'weatherCode' => $code,
                'weatherLabel' => $this->weatherLabel($code),
            ];
        }

        return [
            'ok' => true,
            'source' => 'fallback',
            'warning' => $reason,
            'data' => [
                'city' => $city,
                'country' => null,
                'latitude' => null,
                'longitude' => null,
                'current' => [
                    'temperature' => 22,
                    'apparentTemperature' => 23,
                    'humidity' => 55,
                    'windSpeed' => 14,
                    'weatherCode' => 1,
                    'weatherLabel' => $this->weatherLabel(1),
                    'time' => (new \DateTimeImmutable())->format('Y-m-d\TH:i'),
                ],
                'forecast' => $forecast,
            ],
        ];
    }

    private function weatherLabel(int $code): string
    {
        return match (true) {
            $code === 0 => 'Clear sky',
            in_array($code, [1, 2, 3], true) => 'Partly cloudy',
            in_array($code, [45, 48], true) => 'Fog',
            in_array($code, [51, 53, 55, 56, 57], true) => 'Drizzle',
            in_array($code, [61, 63, 65, 66, 67], true) => 'Rain',
            in_array($code, [71, 73, 75, 77], true) => 'Snow',
            in_array($code, [80, 81, 82], true) => 'Rain showers',
            in_array($code, [85, 86], true) => 'Snow showers',
            in_array($code, [95, 96, 99], true) => 'Thunderstorm',
            default => 'Unknown',
        };
    }
}
