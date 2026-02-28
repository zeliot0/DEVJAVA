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
        $latQuery = $request->query->get('lat');
        $lonQuery = $request->query->get('lon');
        $lat = null;
        $lon = null;
        $placeName = $city;
        $country = null;

        if (is_numeric($latQuery) && is_numeric($lonQuery)) {
            $lat = (float) $latQuery;
            $lon = (float) $lonQuery;

            try {
                $reverseGeo = $httpClient->request('GET', 'https://geocoding-api.open-meteo.com/v1/reverse', [
                    'query' => [
                        'latitude' => $lat,
                        'longitude' => $lon,
                        'language' => 'fr',
                        'format' => 'json',
                    ],
                ])->toArray();

                $first = $reverseGeo['results'][0] ?? null;
                if (is_array($first)) {
                    $placeName = (string) ($first['name'] ?? $placeName);
                    $country = $first['country'] ?? null;
                }
            } catch (TransportExceptionInterface|\Throwable) {
                // Keep coordinates-only fallback if reverse geocoding fails.
            }
        } else {
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
            $placeName = (string) ($first['name'] ?? $city);
            $country = $first['country'] ?? null;
        }

        try {
            $forecast = $httpClient->request('GET', 'https://api.open-meteo.com/v1/forecast', [
                'query' => [
                    'latitude' => $lat,
                    'longitude' => $lon,
                    'current' => 'temperature_2m,relative_humidity_2m,apparent_temperature,weather_code,wind_speed_10m,precipitation,cloud_cover',
                    'daily' => 'weather_code,temperature_2m_max,temperature_2m_min,sunrise,sunset,precipitation_probability_max',
                    'timezone' => 'auto',
                    'forecast_days' => 5,
                ],
            ])->toArray();
        } catch (TransportExceptionInterface|\Throwable) {
            return $this->json($this->fallbackWeather($placeName, 'provider_unavailable'));
        }

        $current = $forecast['current'] ?? [];
        $daily = $forecast['daily'] ?? [];

        $days = [];
        $dates = $daily['time'] ?? [];
        $max = $daily['temperature_2m_max'] ?? [];
        $min = $daily['temperature_2m_min'] ?? [];
        $codes = $daily['weather_code'] ?? [];
        $sunrise = $daily['sunrise'] ?? [];
        $sunset = $daily['sunset'] ?? [];
        $precipMax = $daily['precipitation_probability_max'] ?? [];
        $count = min(count($dates), count($max), count($min), count($codes), count($sunrise), count($sunset), count($precipMax));

        for ($i = 0; $i < $count; $i++) {
            $date = (string) $dates[$i];
            $days[] = [
                'date' => $date,
                'dayName' => $this->dayName($date),
                'tempMax' => $max[$i],
                'tempMin' => $min[$i],
                'weatherCode' => $codes[$i],
                'weatherLabel' => $this->weatherLabel((int) $codes[$i]),
                'sunrise' => $sunrise[$i],
                'sunset' => $sunset[$i],
                'precipitationProbability' => $precipMax[$i],
            ];
        }

        return $this->json([
            'ok' => true,
            'source' => 'open-meteo',
            'data' => [
                'city' => $placeName,
                'country' => $country,
                'latitude' => $lat,
                'longitude' => $lon,
                'timezone' => $forecast['timezone'] ?? null,
                'current' => [
                    'temperature' => $current['temperature_2m'] ?? null,
                    'apparentTemperature' => $current['apparent_temperature'] ?? null,
                    'humidity' => $current['relative_humidity_2m'] ?? null,
                    'windSpeed' => $current['wind_speed_10m'] ?? null,
                    'precipitation' => $current['precipitation'] ?? null,
                    'cloudCover' => $current['cloud_cover'] ?? null,
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
                'dayName' => $this->dayName($date->format('Y-m-d')),
                'tempMax' => $max,
                'tempMin' => $min,
                'weatherCode' => $code,
                'weatherLabel' => $this->weatherLabel($code),
                'sunrise' => $date->setTime(6, 45)->format('Y-m-d\TH:i'),
                'sunset' => $date->setTime(18, 20)->format('Y-m-d\TH:i'),
                'precipitationProbability' => 15 + ($i * 10),
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
                'timezone' => null,
                'current' => [
                    'temperature' => 22,
                    'apparentTemperature' => 23,
                    'humidity' => 55,
                    'windSpeed' => 14,
                    'precipitation' => 0,
                    'cloudCover' => 35,
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
            $code === 0 => 'Ciel degage',
            in_array($code, [1, 2, 3], true) => 'Partiellement nuageux',
            in_array($code, [45, 48], true) => 'Brouillard',
            in_array($code, [51, 53, 55, 56, 57], true) => 'Bruine',
            in_array($code, [61, 63, 65, 66, 67], true) => 'Pluie',
            in_array($code, [71, 73, 75, 77], true) => 'Neige',
            in_array($code, [80, 81, 82], true) => 'Averses',
            in_array($code, [85, 86], true) => 'Averses de neige',
            in_array($code, [95, 96, 99], true) => 'Orage',
            default => 'Inconnu',
        };
    }

    private function dayName(string $date): string
    {
        $days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
        $ts = strtotime($date);
        if ($ts === false) {
            return '';
        }

        return $days[(int) date('w', $ts)] ?? '';
    }
}
