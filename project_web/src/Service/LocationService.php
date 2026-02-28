<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class LocationService
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $token = ''
    ) {}

    /**
     * @return array{country: string, city: string, latitude: ?float, longitude: ?float}
     */
    public function getLocation(?string $ip): array
    {
        if ($ip === null || trim($ip) === '') {
            return [
                'country' => 'Unknown',
                'city' => 'Unknown',
                'latitude' => null,
                'longitude' => null,
            ];
        }

        if (trim($this->token) === '') {
            return [
                'country' => 'Unknown',
                'city' => 'Unknown',
                'latitude' => null,
                'longitude' => null,
            ];
        }

        // Local/private IPs cannot be geolocated precisely by IPInfo.
        if ($this->isLocalOrPrivateIp($ip)) {
            return [
                'country' => 'Local',
                'city' => 'Localhost',
                'latitude' => null,
                'longitude' => null,
            ];
        }

        try {
            $response = $this->client->request('GET', sprintf('https://ipinfo.io/%s/json', $ip), [
                'query' => [
                    'token' => $this->token,
                ],
            ]);

            $data = $response->toArray(false);
            $coords = explode(',', (string) ($data['loc'] ?? ''));
            $latitude = isset($coords[0]) && is_numeric($coords[0]) ? (float) $coords[0] : null;
            $longitude = isset($coords[1]) && is_numeric($coords[1]) ? (float) $coords[1] : null;

            return [
                'country' => (string) ($data['country'] ?? 'Unknown'),
                'city' => (string) ($data['city'] ?? 'Unknown'),
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
        } catch (\Throwable) {
            return [
                'country' => 'Unknown',
                'city' => 'Unknown',
                'latitude' => null,
                'longitude' => null,
            ];
        }
    }

    private function isLocalOrPrivateIp(string $ip): bool
    {
        $normalizedIp = trim($ip);

        if ($normalizedIp === '127.0.0.1' || $normalizedIp === '::1') {
            return true;
        }

        return filter_var(
            $normalizedIp,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === false;
    }
}
