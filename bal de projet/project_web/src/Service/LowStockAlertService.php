<?php

namespace App\Service;

use App\Entity\Produit;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class LowStockAlertService
{
    private const THRESHOLD = 5;
    private const DEFAULT_RECIPIENT = 'malekabdnbei.dadi@esprit.tn';
    private const DEFAULT_SENDER = 'malekabdnbei.dadi@esprit.tn';

    public function __construct(
        private MailerInterface $mailer,
        #[Autowire('%env(MAILER_DSN)%')]
        private string $mailerDsn,
        #[Autowire('%env(default::MAILER_DEFAULT_RECIPIENT)%')]
        private ?string $defaultRecipient,
        #[Autowire('%env(default::MAILER_DEFAULT_SENDER)%')]
        private ?string $defaultSender,
        private LoggerInterface $logger,
    ) {}

    public function notifyIfCrossedThreshold(Produit $produit, ?int $previousStock = null): ?bool
    {
        $currentStock = $produit->getQuantiteStock();
        if ($currentStock === null) {
            return null;
        }

        $currentStock = (int) $currentStock;
        if ($currentStock >= self::THRESHOLD) {
            return null;
        }

        // Avoid spamming: notify only when crossing from >= THRESHOLD to < THRESHOLD.
        if ($previousStock !== null && $previousStock < self::THRESHOLD) {
            return null;
        }

        $dsn = trim((string) $this->mailerDsn);
        if ($dsn === '' || str_starts_with($dsn, 'null://')) {
            $this->logger->warning('Low stock alert: MAILER_DSN not configured (null transport).', [
                'produit_id' => $produit->getIdP(),
                'stock' => $currentStock,
            ]);
            return false;
        }

        $to = $produit->getEmailP() ?: $this->resolveDefaultRecipient();

        $email = (new Email())
            ->from($this->resolveDefaultSender())
            ->to($to)
            ->subject(sprintf('Alerte stock critique: %s (%d)', (string) $produit->getNomP(), $currentStock))
            ->text($this->buildTextBody($produit, $currentStock));

        try {
            $this->mailer->send($email);
            return true;
        } catch (TransportExceptionInterface $e) {
            $this->logger->error('Low stock alert: mailer transport error', [
                'exception' => $e,
                'produit_id' => $produit->getIdP(),
                'to' => $to,
                'stock' => $currentStock,
            ]);

            return false;
        } catch (\Throwable $e) {
            $this->logger->error('Low stock alert: unexpected error while sending email', [
                'exception' => $e,
                'produit_id' => $produit->getIdP(),
                'to' => $to,
                'stock' => $currentStock,
            ]);

            return false;
        }
    }

    private function buildTextBody(Produit $produit, int $stock): string
    {
        $dateAjout = $produit->getDateAjout();
        $dateExpiration = $produit->getDateExpiration();

        $lines = [
            'ALERTE STOCK CRITIQUE',
            '',
            'Produit: ' . (string) $produit->getNomP(),
            'Categorie: ' . (string) $produit->getCategorieP(),
            'Stock: ' . $stock . ' ' . (string) $produit->getUniteP(),
            'Emplacement: ' . (string) $produit->getEmplacement(),
        ];

        if ($dateAjout) {
            $lines[] = 'Date ajout: ' . $dateAjout->format('Y-m-d');
        }

        if ($dateExpiration) {
            $lines[] = 'Date expiration: ' . $dateExpiration->format('Y-m-d');
        }

        return implode("\n", $lines);
    }

    private function resolveDefaultRecipient(): string
    {
        $value = trim((string) $this->defaultRecipient);
        if ($value !== '') {
            return $value;
        }

        return self::DEFAULT_RECIPIENT;
    }

    private function resolveDefaultSender(): string
    {
        $value = trim((string) $this->defaultSender);
        if ($value !== '') {
            return $value;
        }

        $dsn = trim((string) $this->mailerDsn);
        if ($dsn !== '') {
            $parts = parse_url($dsn);
            if (is_array($parts) && isset($parts['user'])) {
                $user = urldecode((string) $parts['user']);
                if ($user !== '' && str_contains($user, '@')) {
                    return $user;
                }
            }
        }

        return self::DEFAULT_SENDER;
    }
}
