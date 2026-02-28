<?php

namespace App\Command;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Service\GoogleCseImageSearchService;
use App\Service\OpenverseImageSearchService;
use App\Service\WikimediaCommonsImageSearchService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'app:produit:auto-images',
    description: 'Récupère une image (Google CSE / Openverse / Wikimedia) pour chaque produit et met à jour photoP.',
)]
final class AutoAssignProduitImagesCommand extends Command
{
    private const DEFAULT_LIMIT = 100;
    private const DEFAULT_RESULTS_PER_PRODUCT = 3;
    private const DEFAULT_SLEEP_MS = 150;
    private const DEFAULT_MAX_BYTES = 4_000_000; // ~4MB

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ProduitRepository $produitRepository,
        private readonly GoogleCseImageSearchService $googleCse,
        private readonly OpenverseImageSearchService $openverse,
        private readonly WikimediaCommonsImageSearchService $wikimedia,
        private readonly HttpClientInterface $httpClient,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('limit', null, InputOption::VALUE_REQUIRED, 'Nombre max de produits à traiter', self::DEFAULT_LIMIT)
            ->addOption('force', null, InputOption::VALUE_NONE, 'Réécrire la photo même si elle existe déjà')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Ne rien modifier en base (affiche seulement ce qui serait fait)')
            ->addOption('store-url', null, InputOption::VALUE_NONE, 'Stocker l’URL distante au lieu de télécharger l’image')
            ->addOption('results', null, InputOption::VALUE_REQUIRED, 'Nombre de résultats à tester par produit (1-10)', self::DEFAULT_RESULTS_PER_PRODUCT)
            ->addOption('sleep-ms', null, InputOption::VALUE_REQUIRED, 'Pause entre produits (ms) pour éviter le quota', self::DEFAULT_SLEEP_MS)
            ->addOption('max-bytes', null, InputOption::VALUE_REQUIRED, 'Taille max de l’image à télécharger (bytes)', self::DEFAULT_MAX_BYTES);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $googleConfigured = $this->googleCse->isConfigured();
        if (!$googleConfigured) {
            $io->note('Google CSE non configuré → utilisation Openverse (sans clé).');
        }

        $limit = max(1, min(2000, (int) $input->getOption('limit')));
        $resultsPerProduct = max(1, min(10, (int) $input->getOption('results')));
        $sleepMs = max(0, min(5000, (int) $input->getOption('sleep-ms')));
        $maxBytes = max(50_000, min(25_000_000, (int) $input->getOption('max-bytes')));

        $force = (bool) $input->getOption('force');
        $dryRun = (bool) $input->getOption('dry-run');
        $storeUrl = (bool) $input->getOption('store-url');

        $produits = $this->findProduitsToProcess($limit, $force);
        if (count($produits) === 0) {
            $io->success('Aucun produit à traiter.');
            return Command::SUCCESS;
        }

        $uploadsDir = rtrim($this->projectDir, '/\\') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'produits';
        if (!$storeUrl && !is_dir($uploadsDir)) {
            @mkdir($uploadsDir, 0775, true);
        }

        $io->writeln(sprintf('Produits à traiter: <info>%d</info> (force=%s, store-url=%s, dry-run=%s)', count($produits), $force ? 'oui' : 'non', $storeUrl ? 'oui' : 'non', $dryRun ? 'oui' : 'non'));

        $updated = 0;
        $skipped = 0;
        $errors = 0;

        $io->progressStart(count($produits));

        foreach ($produits as $i => $produit) {
            $query = $this->buildQueryForProduit($produit);
            if ($query === '') {
                $skipped++;
                $io->progressAdvance();
                continue;
            }

            $search = $googleConfigured
                ? $this->googleCse->searchImages($query, $resultsPerProduct)
                : $this->openverse->searchImages($query, $resultsPerProduct);

            // If Google is configured but returns nothing, fallback to Openverse.
            if ($googleConfigured && (count($search['items'] ?? []) === 0)) {
                $search = $this->openverse->searchImages($query, $resultsPerProduct);
            }

            // If Openverse returns nothing, fallback to Wikimedia Commons.
            if (count($search['items'] ?? []) === 0) {
                $search = $this->wikimedia->searchImages($query, $resultsPerProduct);
            }

            if (!empty($search['error']) || empty($search['items'])) {
                $errors++;
                $io->progressAdvance();
                if ($sleepMs > 0) {
                    usleep($sleepMs * 1000);
                }
                continue;
            }

            $chosen = null;
            foreach ($search['items'] as $item) {
                $candidateUrls = [];
                if (!empty($item['imageUrl'])) {
                    $candidateUrls[] = (string) $item['imageUrl'];
                }
                if (!empty($item['thumbnailUrl'])) {
                    $candidateUrls[] = (string) $item['thumbnailUrl'];
                }

                foreach ($candidateUrls as $candidateUrl) {
                    if (!$this->isValidHttpUrl($candidateUrl)) {
                        continue;
                    }

                    if ($storeUrl) {
                        if (strlen($candidateUrl) > 255) {
                            continue;
                        }
                        $chosen = $candidateUrl;
                        break 2;
                    }

                    $downloadedFilename = $this->downloadImageToUploads($candidateUrl, $uploadsDir, $maxBytes);
                    if ($downloadedFilename !== null) {
                        $chosen = $downloadedFilename;
                        break 2;
                    }
                }
            }

            if ($chosen === null) {
                $skipped++;
                $io->progressAdvance();
                if ($sleepMs > 0) {
                    usleep($sleepMs * 1000);
                }
                continue;
            }

            if (!$dryRun) {
                $produit->setPhotoP($chosen);
            }

            $updated++;

            if (!$dryRun && $updated % 20 === 0) {
                $this->em->flush();
            }

            $io->progressAdvance();

            if ($sleepMs > 0) {
                usleep($sleepMs * 1000);
            }
        }

        $io->progressFinish();

        if (!$dryRun) {
            $this->em->flush();
        }

        $io->success(sprintf('Terminé: %d mis à jour, %d ignorés, %d erreurs.', $updated, $skipped, $errors));
        $io->writeln('Astuce: tu peux relancer la commande avec `--limit=...` et `--force` si besoin.');

        return Command::SUCCESS;
    }

    /**
     * @return list<Produit>
     */
    private function findProduitsToProcess(int $limit, bool $force): array
    {
        $qb = $this->produitRepository->createQueryBuilder('p')
            ->orderBy('p.id_p', 'ASC')
            ->setMaxResults($limit);

        if (!$force) {
            $qb->andWhere('p.photo_p IS NULL OR p.photo_p = :empty')
                ->setParameter('empty', '');
        }

        /** @var list<Produit> $rows */
        $rows = $qb->getQuery()->getResult();
        return $rows;
    }

    private function buildQueryForProduit(Produit $produit): string
    {
        $name = trim((string) $produit->getNomP());
        $cat = trim((string) $produit->getCategorieP());

        $query = trim($name . ' ' . $cat);
        return $query;
    }

    private function isValidHttpUrl(string $url): bool
    {
        $url = trim($url);
        if ($url === '') {
            return false;
        }

        $parts = parse_url($url);
        if (!is_array($parts)) {
            return false;
        }

        $scheme = strtolower((string) ($parts['scheme'] ?? ''));
        if (!in_array($scheme, ['http', 'https'], true)) {
            return false;
        }

        return true;
    }

    private function downloadImageToUploads(string $url, string $uploadsDir, int $maxBytes): ?string
    {
        try {
            $response = $this->httpClient->request('GET', $url, [
                'headers' => [
                    'Accept' => 'image/avif,image/webp,image/apng,image/*,*/*;q=0.8',
                    'User-Agent' => 'Mozilla/5.0 (compatible; NEXA/1.0; +https://example.invalid)',
                ],
                'max_redirects' => 3,
                'timeout' => 15,
            ]);

            $status = $response->getStatusCode();
            if ($status < 200 || $status >= 300) {
                return null;
            }

            $headers = $response->getHeaders(false);
            $contentType = '';
            if (isset($headers['content-type'][0])) {
                $contentType = strtolower(trim(explode(';', (string) $headers['content-type'][0])[0]));
            }

            if ($contentType !== '' && !str_starts_with($contentType, 'image/')) {
                return null;
            }

            if ($contentType === 'image/svg+xml') {
                return null;
            }

            $content = $response->getContent(false);
            if ($content === '' || strlen($content) > $maxBytes) {
                return null;
            }

            $ext = $this->guessExtension($url, $contentType);
            if ($ext === 'svg') {
                return null;
            }
            $filename = sprintf('%s.%s', bin2hex(random_bytes(16)), $ext);
            $path = rtrim($uploadsDir, '/\\') . DIRECTORY_SEPARATOR . $filename;

            $written = @file_put_contents($path, $content);
            if ($written === false) {
                return null;
            }

            return $filename;
        } catch (\Throwable) {
            return null;
        }
    }

    private function guessExtension(string $url, string $contentType): string
    {
        return match ($contentType) {
            'image/jpeg', 'image/jpg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'image/avif' => 'avif',
            'image/svg+xml' => 'svg',
            default => $this->guessExtensionFromUrl($url) ?? 'jpg',
        };
    }

    private function guessExtensionFromUrl(string $url): ?string
    {
        $path = (string) parse_url($url, PHP_URL_PATH);
        $ext = strtolower((string) pathinfo($path, PATHINFO_EXTENSION));

        if ($ext === '') {
            return null;
        }

        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'svg'], true)) {
            return null;
        }

        return $ext === 'jpeg' ? 'jpg' : $ext;
    }
}
