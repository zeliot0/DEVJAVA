<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class EmailReputationService
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $apiKey = ''
    ) {}

    public function isEmailSafe(string $email): bool
    {
        if (trim($this->apiKey) === '') {
            // If the external reputation API is not configured, do not block registration.
            return true;
        }

        try {
            $response = $this->client->request('GET', 'https://emailreputation.abstractapi.com/v1/', [
                'query' => [
                    'api_key' => $this->apiKey,
                    'email' => $email,
                ],
            ]);

            $data = $response->toArray(false);

            $deliverable = (string) ($data['email_deliverability']['status'] ?? '');
            $risk = (string) ($data['email_risk']['address_risk_status'] ?? '');
            $disposable = (bool) ($data['email_quality']['is_disposable'] ?? true);

            return $deliverable === 'deliverable'
                && $risk === 'low'
                && $disposable === false;
        } catch (\Throwable) {
            return false;
        }
    }
}
