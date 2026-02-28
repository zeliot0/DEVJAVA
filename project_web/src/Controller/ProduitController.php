<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\MouvementRepository;
use App\Repository\ProduitRepository;
use App\Service\GoogleCseImageSearchService;
use App\Service\LowStockAlertService;
use App\Service\OpenverseImageSearchService;
use App\Service\WikimediaCommonsImageSearchService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// PDF
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/produit')]
final class ProduitController extends AbstractController
{
    #[Route('', name: 'app_produit_index', methods: ['GET'])]
    #[Route('', name: 'admin_produit_index', methods: ['GET'])]
    public function index(Request $request, ProduitRepository $repo): Response
    {
        $q = $request->query->get('q');
        $sort = $request->query->get('sort');
        $dir = $request->query->get('dir');
        return $this->render('produit/index.html.twig', [
            'produits' => $repo->searchAndSort($q, $sort, $dir)->getResult(),
            'q' => $q,
            'sort' => $sort,
            'dir' => $dir,
        ]);
    }

    #[Route('/puzzle', name: 'app_produit_puzzle', methods: ['GET'])]
    public function puzzle(): Response
    {
        return $this->render('produit/puzzle.html.twig');
    }

    #[Route('/articles', name: 'app_produit_articles', methods: ['GET'])]
    public function articles(Request $request, GoogleCseImageSearchService $googleCseImageSearchService, OpenverseImageSearchService $openverseImageSearchService, WikimediaCommonsImageSearchService $wikimediaCommonsImageSearchService, ProduitRepository $produitRepository): Response
    {
        $categories = [
            'Alimentation' => [
                'pillClass' => 'teal',
                'icon' => 'fa-apple-whole',
                'query' => 'food grocery',
                'fallbackImage' => 'images/articles/alimentation.svg',
            ],
            'Maison' => [
                'pillClass' => 'success',
                'icon' => 'fa-house',
                'query' => 'detergent cleaning',
                'fallbackImage' => 'images/articles/maison.svg',
            ],
            'Cuisine' => [
                'pillClass' => 'orange',
                'icon' => 'fa-utensils',
                'query' => 'dish soap kitchen',
                'fallbackImage' => 'images/articles/cuisine.svg',
            ],
            'Salle de bain' => [
                'pillClass' => 'purple',
                'icon' => 'fa-toilet',
                'query' => 'bathroom toilet paper soap',
                'fallbackImage' => 'images/articles/salle-de-bain.svg',
            ],
            'Salon' => [
                'pillClass' => 'blue',
                'icon' => 'fa-couch',
                'query' => 'glass cleaner spray',
                'fallbackImage' => 'images/articles/salon.svg',
            ],
        ];

        $selectedCat = $request->query->get('cat');
        if ($selectedCat && !array_key_exists($selectedCat, $categories)) {
            $selectedCat = null;
        }

        $targetProduit = null;
        $targetIdP = $request->query->getInt('id_p');
        if ($targetIdP > 0) {
            $targetProduit = $produitRepository->find($targetIdP);
        }

        if ($targetProduit && !$selectedCat) {
            $haystack = strtolower(trim((string) $targetProduit->getCategorieP() . ' ' . (string) $targetProduit->getNomP()));
            if (str_contains($haystack, 'aliment') || str_contains($haystack, 'epicer') || str_contains($haystack, 'food')) {
                $selectedCat = 'Alimentation';
            } elseif (str_contains($haystack, 'cuisine')) {
                $selectedCat = 'Cuisine';
            } elseif (str_contains($haystack, 'bain') || str_contains($haystack, 'toilet') || str_contains($haystack, 'wc')) {
                $selectedCat = 'Salle de bain';
            } elseif (str_contains($haystack, 'salon')) {
                $selectedCat = 'Salon';
            } elseif (str_contains($haystack, 'maison') || str_contains($haystack, 'menage') || str_contains($haystack, 'ménage')) {
                $selectedCat = 'Maison';
            }
        }

        $limit = $request->query->getInt('limit', $targetProduit ? 40 : ($selectedCat ? 60 : 80));
        $limit = max(12, min(100, $limit));

        $variants = ['Original', 'Eco', 'Max', 'Pack x3', '500ml', '750ml', '1L', '2L', '500g', '1kg'];
        $catalog = [
            'Alimentation' => [
                'Pates',
                'Riz',
                'Farine',
                'Sucre',
                'Sel',
                'Huile',
                'Lait',
                'Cafe',
                'The',
                'Sauce tomate',
                'Thon',
                'Eau minerale',
                'Biscuits',
                'Cereales',
                'Chocolat',
                'Yaourt',
            ],
            'Salle de bain' => [
                'Papier toilette',
                'Gel WC',
                'Desinfectant salle de bain',
                'Nettoyant anti-calcaire',
                'Savon mains',
                'Shampooing',
                'Gel douche',
                'Dentifrice',
                'Brosse a dents',
                'Deodorant',
            ],
            'Cuisine' => [
                'Liquide vaisselle',
                'Eponge',
                'Degraissant',
                'Nettoyant four',
                'Nettoyant inox',
                'Spray cuisine',
                'Essuie-tout',
                'Sacs poubelle',
                'Gants vaisselle',
                'Serpillere',
            ],
            'Maison' => [
                'Nettoyant multi-surfaces',
                'Detergent sol',
                'Lessive',
                'Adoucissant',
                'Detachant',
                'Chiffons microfibres',
                'Nettoyant meubles',
                'Desodorisant maison',
                'Nettoyant tapis',
                'Lingettes',
            ],
            'Salon' => [
                'Spray vitres',
                'Lingettes depoussierantes',
                'Nettoyant ecrans',
                'Nettoyant canape',
                'Parfum interieur',
                'Balai',
                'Plumeau',
                'Nettoyant parquet',
                'Detergent doux',
                'Spray anti-odeurs',
            ],
        ];

        $items = [];
        $error = null;
        $isFallback = false;
        $imageProvider = null;

        $searchers = [];
        if ($googleCseImageSearchService->isConfigured()) {
            $searchers[] = [
                'name' => 'Google',
                'fn' => fn (string $q, int $l): array => $googleCseImageSearchService->searchImages($q, $l),
            ];
        }
        $searchers[] = [
            'name' => 'Openverse',
            'fn' => fn (string $q, int $l): array => $openverseImageSearchService->searchImages($q, $l),
        ];
        $searchers[] = [
            'name' => 'Wikimedia Commons',
            'fn' => fn (string $q, int $l): array => $wikimediaCommonsImageSearchService->searchImages($q, $l),
        ];

        /** @var callable(string, int): array{items: array, error: ?string} $runSearch */
        $runSearch = function (string $query, int $limit) use ($searchers, &$imageProvider): array {
            $lastError = null;
            foreach ($searchers as $searcher) {
                $res = $searcher['fn']($query, $limit);
                if (!empty($res['error'])) {
                    $lastError = (string) $res['error'];
                }
                if (!empty($res['items'])) {
                    $imageProvider = (string) ($searcher['name'] ?? null);
                    return ['items' => $res['items'], 'error' => null];
                }
            }

            return ['items' => [], 'error' => $lastError];
        };

        if ($targetProduit) {
            $query = trim((string) $targetProduit->getNomP() . ' ' . (string) $targetProduit->getCategorieP());
            if ($query === '') {
                $query = (string) ($categories[$selectedCat]['query'] ?? $selectedCat ?? '');
            }

            if ($query !== '') {
                $search = $runSearch($query, $limit);
                $error = $search['error'];

                foreach ($search['items'] as $item) {
                    if (!is_array($item)) {
                        continue;
                    }
                    $item['category'] = $selectedCat ?: '';
                    $items[] = $item;
                }
            }
        } else {
            $order = $selectedCat ? [$selectedCat] : array_keys($categories);
            $perCategory = (int) ceil($limit / max(1, count($order)));

            $bucket = [];
            foreach ($order as $cat) {
                $wanted = $selectedCat ? $limit : $perCategory;
                $query = (string) ($categories[$cat]['query'] ?? $cat);
                $base = $catalog[$cat] ?? [$cat . ' - Article'];

                $search = $runSearch($query, $wanted);
                if ($error === null && $search['error']) {
                    $error = $search['error'];
                }

                $images = [];
                foreach (($search['items'] ?? []) as $raw) {
                    if (is_array($raw)) {
                        $images[] = $raw;
                    }
                }

                $bucket[$cat] = [];
                for ($i = 0; $i < $wanted; $i++) {
                    $name = $base[$i % count($base)];
                    $variant = $variants[$i % count($variants)];
                    $title = sprintf('%s - %s', $name, $variant);

                    $img = $images[$i] ?? null;
                    if (is_array($img)) {
                        $img['title'] = $title;
                        $img['category'] = $cat;
                        $bucket[$cat][] = $img;
                        continue;
                    }

                    $bucket[$cat][] = [
                        'title' => $title,
                        'snippet' => '',
                        'imageUrl' => '',
                        'thumbnailUrl' => (string) ($categories[$cat]['fallbackImage'] ?? ''),
                        'contextUrl' => '',
                        'displayLink' => 'Fallback',
                        'category' => $cat,
                    ];
                }
            }

            if ($selectedCat) {
                $items = $bucket[$selectedCat] ?? [];
            } else {
                // Interleave categories and deduplicate by URL to get a varied list.
                $seen = [];
                $maxRounds = 0;
                foreach ($bucket as $catItems) {
                    $maxRounds = max($maxRounds, is_array($catItems) ? count($catItems) : 0);
                }

                for ($round = 0; $round < $maxRounds && count($items) < $limit; $round++) {
                    foreach ($order as $cat) {
                        if (!isset($bucket[$cat][$round])) {
                            continue;
                        }

                        $candidate = $bucket[$cat][$round];
                        $key = (string) ($candidate['imageUrl'] ?? $candidate['thumbnailUrl'] ?? '');
                        if ($key !== '' && isset($seen[$key])) {
                            continue;
                        }

                        if ($key !== '') {
                            $seen[$key] = true;
                        }

                        $items[] = $candidate;

                        if (count($items) >= $limit) {
                            break 2;
                        }
                    }
                }
            }
        }

        // Fallback (no results): show many demo items with local images.
        if (count($items) === 0) {
            $isFallback = true;

            if ($targetProduit) {
                $cat = $selectedCat ?: 'Maison';
                if (!array_key_exists($cat, $categories)) {
                    $cat = array_key_first($categories) ?: 'Maison';
                }

                $image = (string) ($categories[$cat]['fallbackImage'] ?? '');
                $name = trim((string) $targetProduit->getNomP()) ?: 'Produit';
                $fallbackQuery = (string) ($name . ' ' . $cat);

                for ($i = 0; $i < $limit; $i++) {
                    $variant = $variants[$i % count($variants)];
                    $items[] = [
                        'title' => sprintf('%s - %s', $name, $variant),
                        'snippet' => 'Mode demo (images automatiques).',
                        'imageUrl' => '',
                        'thumbnailUrl' => sprintf('https://picsum.photos/seed/%s/900/600', substr(sha1($fallbackQuery . '|' . (string) ($i + 1)), 0, 12)),
                        'contextUrl' => '',
                        'displayLink' => 'Fallback',
                        'category' => $cat,
                    ];
                }
            } else {
                $order = $selectedCat ? [$selectedCat] : array_keys($categories);
                $perCategory = (int) ceil($limit / max(1, count($order)));

                foreach ($order as $cat) {
                    $base = $catalog[$cat] ?? [$cat . ' - Article'];
                    $image = (string) ($categories[$cat]['fallbackImage'] ?? '');
                    $fallbackQuery = (string) ($categories[$cat]['query'] ?? $cat);

                    for ($i = 0; $i < $perCategory && count($items) < $limit; $i++) {
                        $name = $base[$i % count($base)];
                        $variant = $variants[$i % count($variants)];

                        $items[] = [
                            'title' => sprintf('%s - %s', $name, $variant),
                            'snippet' => 'Mode demo (images automatiques).',
                            'imageUrl' => '',
                            'thumbnailUrl' => sprintf('https://picsum.photos/seed/%s/900/600', substr(sha1($fallbackQuery . '|' . (string) ($i + 1)), 0, 12)),
                            'contextUrl' => '',
                            'displayLink' => 'Fallback',
                            'category' => $cat,
                        ];
                    }
                }
            }
        }

        return $this->render('produit/articles.html.twig', [
            'categories' => $categories,
            'selectedCat' => $selectedCat,
            'limit' => $limit,
            'googleConfigured' => $googleCseImageSearchService->isConfigured(),
            'imageProvider' => $imageProvider,
            'items' => $items,
            'error' => $error,
            'isFallback' => $isFallback,
            'targetProduit' => $targetProduit,
        ]);
    }

    #[Route('/{id_p<\\d+>}/photo/url', name: 'app_produit_photo_url', methods: ['POST'])]
    public function setPhotoUrl(Request $request, Produit $produit, EntityManagerInterface $em): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'Mode admin: consultation uniquement pour les produits.');
            return $this->redirectToRoute('app_produit_index');
        }

        if (!$this->isCsrfTokenValid('photo'.$produit->getIdP(), (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('app_produit_show', ['id_p' => $produit->getIdP()]);
        }

        $url = trim((string) $request->request->get('url'));
        if ($url === '') {
            $this->addFlash('error', 'URL de photo invalide.');
            return $this->redirectToRoute('app_produit_show', ['id_p' => $produit->getIdP()]);
        }

        if (strlen($url) > 255) {
            $this->addFlash('error', 'URL trop longue (max 255 caracteres).');
            return $this->redirectToRoute('app_produit_show', ['id_p' => $produit->getIdP()]);
        }

        $parts = parse_url($url);
        $scheme = is_array($parts) ? strtolower((string) ($parts['scheme'] ?? '')) : '';
        if (!in_array($scheme, ['http', 'https'], true)) {
            $this->addFlash('error', 'URL de photo invalide (http/https uniquement).');
            return $this->redirectToRoute('app_produit_show', ['id_p' => $produit->getIdP()]);
        }

        $produit->setPhotoP($url);
        $em->flush();

        $this->addFlash('success', 'Photo du produit mise a jour.');
        return $this->redirectToRoute('app_produit_show', ['id_p' => $produit->getIdP()]);
    }

    #[Route('/chatbot/message', name: 'app_produit_chatbot_message', methods: ['POST'])]
    public function chatbotMessage(Request $request, ProduitRepository $produitRepository): Response
    {
        $payload = json_decode((string) $request->getContent(), true);
        if (!is_array($payload)) {
            $payload = [];
        }

        $message = trim((string) ($payload['message'] ?? ''));
        $context = $payload['context'] ?? [];
        if (!is_array($context)) {
            $context = [];
        }

        $selectedProductId = (int) ($context['selectedProductId'] ?? 0);

        $normalized = $this->normalizeChatText($message);
        if ($normalized === '' || in_array($normalized, ['aide', 'help', 'options', 'menu', '?'], true)) {
            return $this->json($this->chatbotHelpResponse($selectedProductId));
        }

        $wantsList = $normalized === 'produits' || str_contains($normalized, 'liste produits') || str_contains($normalized, 'liste des produits') || $normalized === 'liste';
        if ($wantsList) {
            $produits = $produitRepository->searchAndSort(null, 'date', 'DESC')->setMaxResults(10)->getResult();
            $productsOut = [];
            $lines = ['Voici les 10 derniers produits :'];

            foreach ($produits as $produit) {
                if (!$produit instanceof Produit) {
                    continue;
                }

                $productsOut[] = $this->produitToChatArray($produit);
                $lines[] = sprintf(
                    '#%d - %s (%d %s)',
                    (int) $produit->getIdP(),
                    (string) $produit->getNomP(),
                    (int) $produit->getQuantiteStock(),
                    (string) $produit->getUniteP()
                );
            }

            $suggestions = ['Bas stock', 'Categories'];
            foreach (array_slice($productsOut, 0, 3) as $p) {
                $suggestions[] = 'Produit ' . (string) ($p['id'] ?? '');
            }

            return $this->json([
                'reply' => implode("\n", $lines),
                'suggestions' => $suggestions,
                'products' => $productsOut,
                'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
            ]);
        }

        $wantsLowStock = str_contains($normalized, 'bas stock')
            || str_contains($normalized, 'low stock')
            || str_contains($normalized, 'stock bas')
            || str_contains($normalized, 'stock faible');

        if ($wantsLowStock) {
            $produits = $produitRepository->createQueryBuilder('p')
                ->andWhere('p.quantite_stock < :threshold')
                ->setParameter('threshold', 5)
                ->orderBy('p.quantite_stock', 'ASC')
                ->addOrderBy('p.nom_p', 'ASC')
                ->setMaxResults(12)
                ->getQuery()
                ->getResult();

            $productsOut = [];
            $lines = ['Produits en stock bas (< 5) :'];

            foreach ($produits as $produit) {
                if (!$produit instanceof Produit) {
                    continue;
                }

                $productsOut[] = $this->produitToChatArray($produit);
                $lines[] = sprintf(
                    '#%d - %s : %d %s',
                    (int) $produit->getIdP(),
                    (string) $produit->getNomP(),
                    (int) $produit->getQuantiteStock(),
                    (string) $produit->getUniteP()
                );
            }

            if (count($productsOut) === 0) {
                $lines[] = 'Aucun produit en stock bas.';
            }

            $suggestions = ['Liste produits', 'Categories'];
            foreach (array_slice($productsOut, 0, 3) as $p) {
                $suggestions[] = 'Produit ' . (string) ($p['id'] ?? '');
            }

            return $this->json([
                'reply' => implode("\n", $lines),
                'suggestions' => $suggestions,
                'products' => $productsOut,
                'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
            ]);
        }

        $wantsCategories = str_contains($normalized, 'categorie') || str_contains($normalized, 'categories');
        if ($wantsCategories) {
            $categoryTerm = '';
            if (preg_match('/\bcategories?\b\s*(.+)$/', $normalized, $m)) {
                $categoryTerm = trim((string) ($m[1] ?? ''));
            }

            if ($categoryTerm === '') {
                $stats = $produitRepository->statsByCategorie();
                $lines = ['Categories :'];
                $suggestions = ['Liste produits', 'Bas stock'];

                foreach ($stats as $row) {
                    $cat = (string) ($row['categorie'] ?? '');
                    if ($cat === '') {
                        continue;
                    }

                    $totalProduits = (int) ($row['totalProduits'] ?? 0);
                    $totalStock = (int) ($row['totalStock'] ?? 0);
                    $lines[] = sprintf('%s : %d produits (stock total %d)', $cat, $totalProduits, $totalStock);

                    if (count($suggestions) < 8) {
                        $suggestions[] = 'Categorie ' . $cat;
                    }
                }

                if (count($lines) === 1) {
                    $lines[] = 'Aucune categorie.';
                }

                return $this->json([
                    'reply' => implode("\n", $lines),
                    'suggestions' => $suggestions,
                    'products' => [],
                    'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
                ]);
            }

            $produits = $produitRepository->createQueryBuilder('p')
                ->andWhere('LOWER(p.categorie_p) LIKE :cat')
                ->setParameter('cat', '%' . mb_strtolower($categoryTerm, 'UTF-8') . '%')
                ->orderBy('p.nom_p', 'ASC')
                ->setMaxResults(12)
                ->getQuery()
                ->getResult();

            $productsOut = [];
            $lines = [sprintf('Categorie "%s" :', $categoryTerm)];

            foreach ($produits as $produit) {
                if (!$produit instanceof Produit) {
                    continue;
                }

                $productsOut[] = $this->produitToChatArray($produit);
                $lines[] = sprintf('#%d - %s (%d %s)', (int) $produit->getIdP(), (string) $produit->getNomP(), (int) $produit->getQuantiteStock(), (string) $produit->getUniteP());
            }

            if (count($productsOut) === 0) {
                $lines[] = 'Aucun produit trouve dans cette categorie.';
            }

            $suggestions = ['Categories', 'Liste produits', 'Bas stock'];
            foreach (array_slice($productsOut, 0, 3) as $p) {
                $suggestions[] = 'Produit ' . (string) ($p['id'] ?? '');
            }

            return $this->json([
                'reply' => implode("\n", $lines),
                'suggestions' => $suggestions,
                'products' => $productsOut,
                'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
            ]);
        }

        $intentStock = preg_match('/\\b(stock|quantite|qte)\\b/', $normalized) === 1;
        $intentLocation = preg_match('/\\b(emplacement|ou)\\b/', $normalized) === 1;
        $intentExpiration = preg_match('/\\b(expiration|expire|date)\\b/', $normalized) === 1;
        $intentImage = preg_match('/\\b(image|photo|tswira|taswira)\\b/', $normalized) === 1;

        $idFromMessage = 0;
        if (preg_match('/\b(?:produit|id|#)\s*([0-9]{1,9})\b/', $normalized, $m)) {
            $idFromMessage = (int) ($m[1] ?? 0);
        } elseif (preg_match('/\b([0-9]{1,9})\b/', $normalized, $m) && str_contains($normalized, 'produit')) {
            $idFromMessage = (int) ($m[1] ?? 0);
        }

        if ($idFromMessage > 0) {
            $selectedProductId = $idFromMessage;
        }

        if ($selectedProductId > 0 && ($intentStock || $intentLocation || $intentExpiration || $intentImage || str_contains($normalized, 'produit'))) {
            $produit = $produitRepository->find($selectedProductId);
            if (!$produit instanceof Produit) {
                return $this->json([
                    'reply' => sprintf('Produit #%d introuvable.', $selectedProductId),
                    'suggestions' => ['Liste produits', 'Bas stock', 'Categories'],
                    'products' => [],
                    'contextUpdate' => [],
                ]);
            }

            $contextUpdate = ['selectedProductId' => (int) $produit->getIdP()];
            $productsOut = [$this->produitToChatArray($produit)];

            if ($intentStock && !$intentLocation && !$intentExpiration && !$intentImage) {
                $reply = sprintf(
                    'Stock de "%s" : %d %s.',
                    (string) $produit->getNomP(),
                    (int) $produit->getQuantiteStock(),
                    (string) $produit->getUniteP()
                );
            } elseif ($intentLocation && !$intentStock && !$intentExpiration && !$intentImage) {
                $reply = sprintf('Emplacement de "%s" : %s.', (string) $produit->getNomP(), (string) $produit->getEmplacement());
            } elseif ($intentExpiration && !$intentStock && !$intentLocation && !$intentImage) {
                $date = $produit->getDateExpiration();
                $reply = $date
                    ? sprintf('Expiration de "%s" : %s.', (string) $produit->getNomP(), $date->format('Y-m-d'))
                    : sprintf('"%s" n\'a pas de date d\'expiration.', (string) $produit->getNomP());
            } elseif ($intentImage) {
                $photo = trim((string) $produit->getPhotoP());
                $reply = $photo !== ''
                    ? sprintf('Image de "%s" : disponible. Tu peux aussi ouvrir "Articles" pour choisir une image.', (string) $produit->getNomP())
                    : sprintf('"%s" n\'a pas encore d\'image. Ouvre "Articles" pour en choisir une.', (string) $produit->getNomP());
            } else {
                $reply = $this->buildProduitDetailReply($produit);
            }

            $suggestions = ['Stock', 'Emplacement', 'Expiration', 'Image'];

            return $this->json([
                'reply' => $reply,
                'suggestions' => $suggestions,
                'products' => $productsOut,
                'contextUpdate' => $contextUpdate,
            ]);
        }

        $term = $normalized;
        if (preg_match('/^(chercher|search|trouve|find)\s+(.+)$/', $normalized, $m)) {
            $term = trim((string) ($m[2] ?? ''));
        } else {
            $term = $this->stripChatStopWords($term);
        }

        if ($term === '' || strlen($term) < 2) {
            return $this->json([
                'reply' => 'Je peux t\'aider sur tes produits. Tape : liste produits, bas stock, categories, produit 12, chercher <nom>.',
                'suggestions' => ['Liste produits', 'Bas stock', 'Categories'],
                'products' => [],
                'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
            ]);
        }

        $produits = $produitRepository->createQueryBuilder('p')
            ->andWhere('p.nom_p LIKE :q OR p.categorie_p LIKE :q OR p.unite_p LIKE :q OR p.emplacement LIKE :q')
            ->setParameter('q', '%' . $term . '%')
            ->orderBy('p.date_ajout', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult();

        $productsOut = [];
        foreach ($produits as $produit) {
            if ($produit instanceof Produit) {
                $productsOut[] = $this->produitToChatArray($produit);
            }
        }

        if (count($productsOut) === 1) {
            $produit = $produitRepository->find((int) ($productsOut[0]['id'] ?? 0));
            if ($produit instanceof Produit) {
                $selectedProductId = (int) $produit->getIdP();

                return $this->json([
                    'reply' => $this->buildProduitDetailReply($produit),
                    'suggestions' => ['Stock', 'Emplacement', 'Expiration', 'Image'],
                    'products' => $productsOut,
                    'contextUpdate' => ['selectedProductId' => $selectedProductId],
                ]);
            }
        }

        $lines = [sprintf('Resultats pour "%s" :', $term)];
        foreach ($productsOut as $p) {
            $lines[] = sprintf('#%d - %s (%d %s)', (int) ($p['id'] ?? 0), (string) ($p['name'] ?? ''), (int) ($p['stock'] ?? 0), (string) ($p['unit'] ?? ''));
        }
        if (count($productsOut) === 0) {
            $lines[] = 'Aucun produit trouve.';
        }

        $suggestions = ['Liste produits', 'Bas stock', 'Categories'];
        foreach (array_slice($productsOut, 0, 3) as $p) {
            $suggestions[] = 'Produit ' . (string) ($p['id'] ?? '');
        }

        return $this->json([
            'reply' => implode("\n", $lines),
            'suggestions' => $suggestions,
            'products' => $productsOut,
            'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
        ]);
    }

    #[Route('/new', name: 'app_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, LowStockAlertService $lowStockAlertService): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'Mode admin: consultation uniquement pour les produits.');
            return $this->redirectToRoute('app_produit_index');
        }

        $produit = new Produit();
        $produit->setDateAjout(new \DateTime());
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$produit->getDateAjout()) {
                $produit->setDateAjout(new \DateTime());
            }

            /** @var UploadedFile|null $photo */
            $photo = $form->get('photo_p')->getData();
            if ($photo instanceof UploadedFile) {
                $targetDir = sprintf('%s/public/uploads/produits', $this->getParameter('kernel.project_dir'));
                if (!is_dir($targetDir)) {
                    @mkdir($targetDir, 0775, true);
                }

                try {
                    $filename = sprintf('%s.%s', bin2hex(random_bytes(16)), $photo->guessExtension() ?: 'jpg');
                    $photo->move($targetDir, $filename);
                    $produit->setPhotoP($filename);
                } catch (\Throwable $e) {
                    $this->addFlash('error', 'Photo: upload échoué.');
                }
            }

            $em->persist($produit);
            $em->flush();
            $alertResult = $lowStockAlertService->notifyIfCrossedThreshold($produit);
            if ($alertResult === true) {
                $this->addFlash('warning', 'Alerte stock: email envoye (stock < 5).');
            } elseif ($alertResult === false) {
                $this->addFlash('error', 'Alerte stock: envoi email echoue. Verifie MAILER_DSN dans .env.local.');
            }

            $this->addFlash('success', 'Produit créé.');
            return $this->redirectToRoute('app_produit_index');
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }


    #[Route('/stats', name: 'app_produit_stats', methods: ['GET'])]
    public function stats(ProduitRepository $repo): Response
    {
        $stats = $repo->statsByCategorie();

        $totalProduits = 0;
        $totalStock = 0;
        $maxTotalStock = 0;
        foreach ($stats as $row) {
            $totalProduits += (int) ($row['totalProduits'] ?? 0);
            $totalStock += (int) ($row['totalStock'] ?? 0);
            $maxTotalStock = max($maxTotalStock, (int) ($row['totalStock'] ?? 0));
        }

        return $this->render('produit/stats.html.twig', [
            'stats' => $stats,
            'totalProduits' => $totalProduits,
            'totalStock' => $totalStock,
            'maxTotalStock' => $maxTotalStock,
        ]);
    }

    #[Route('/pdf', name: 'app_produit_pdf', methods: ['GET'])]
    public function pdf(Request $request, ProduitRepository $repo): Response
    {
        if (!class_exists(Dompdf::class) || !class_exists(Options::class)) {
            $this->addFlash('error', 'PDF: dompdf/dompdf n\'est pas installé. Exécute: composer require dompdf/dompdf');
            return $this->redirectToRoute('app_produit_index', $request->query->all());
        }

        $q = $request->query->get('q');
        $sort = $request->query->get('sort');
        $dir = $request->query->get('dir');

        $produits = $repo->searchAndSort($q, $sort, $dir)->getResult();

        $html = $this->renderView('produit/pdf.html.twig', [
            'produits' => $produits,
            'generatedAt' => new \DateTimeImmutable(),
            'q' => $q,
            'sort' => $sort,
            'dir' => $dir,
        ]);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->render();

        $disposition = HeaderUtils::makeDisposition(
            HeaderUtils::DISPOSITION_ATTACHMENT,
            sprintf('produits_%s.pdf', (new \DateTimeImmutable())->format('Y-m-d'))
        );

        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => $disposition,
            ]
        );
    }

    #[Route('/low-stock-alerts/send', name: 'app_produit_send_low_stock_alerts', methods: ['POST'])]
    public function sendLowStockAlerts(Request $request, ProduitRepository $repo, LowStockAlertService $lowStockAlertService): Response
    {
        if (!$this->isCsrfTokenValid('send_low_stock_alerts', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('app_produit_index');
        }

        $lowStockProducts = $repo->createQueryBuilder('p')
            ->andWhere('p.quantite_stock < :threshold')
            ->setParameter('threshold', 5)
            ->orderBy('p.quantite_stock', 'ASC')
            ->getQuery()
            ->getResult();

        $sent = 0;
        $failed = 0;

        foreach ($lowStockProducts as $produit) {
            if (!$produit instanceof Produit) {
                continue;
            }

            // Force send: manual action from dashboard button.
            $result = $lowStockAlertService->notifyIfCrossedThreshold($produit, 5);
            if ($result === true) {
                $sent++;
            } elseif ($result === false) {
                $failed++;
            }
        }

        if ($sent > 0) {
            $this->addFlash('success', sprintf('Alerte stock envoyee pour %d produit(s).', $sent));
        } elseif ($failed === 0) {
            $this->addFlash('warning', 'Aucun produit en stock bas a notifier.');
        }

        if ($failed > 0) {
            $this->addFlash('error', sprintf('Echec envoi pour %d produit(s). Verifie MAILER_DSN.', $failed));
        }

        return $this->redirectToRoute('app_produit_index');
    }

    #[Route('/{id_p<\\d+>}', name: 'app_produit_show', methods: ['GET'])]
    public function show(Produit $produit, MouvementRepository $mouvementRepository): Response
    {
        $mouvements = $mouvementRepository->findBy(
            ['produit' => $produit],
            ['date_mouvement' => 'DESC', 'id_mo' => 'DESC'],
            20
        );

        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'mouvements' => $mouvements,
        ]);
    }

    #[Route('/{id_p<\\d+>}/edit', name: 'app_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produit $produit, EntityManagerInterface $entityManager, LowStockAlertService $lowStockAlertService): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'Mode admin: consultation uniquement pour les produits.');
            return $this->redirectToRoute('app_produit_index');
        }

        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $previousStock = (int) $produit->getQuantiteStock();
            /** @var UploadedFile|null $photo */
            $photo = $form->get('photo_p')->getData();
            if ($photo instanceof UploadedFile) {
                $targetDir = sprintf('%s/public/uploads/produits', $this->getParameter('kernel.project_dir'));
                if (!is_dir($targetDir)) {
                    @mkdir($targetDir, 0775, true);
                }

                try {
                    $filename = sprintf('%s.%s', bin2hex(random_bytes(16)), $photo->guessExtension() ?: 'jpg');
                    $photo->move($targetDir, $filename);
                    $produit->setPhotoP($filename);
                } catch (\Throwable $e) {
                    $this->addFlash('error', 'Photo: upload échoué.');
                }
            }

            $entityManager->flush();
            $alertResult = $lowStockAlertService->notifyIfCrossedThreshold($produit, $previousStock);
            if ($alertResult === true) {
                $this->addFlash('warning', 'Alerte stock: email envoye (stock < 5).');
            } elseif ($alertResult === false) {
                $this->addFlash('error', 'Alerte stock: envoi email echoue. Verifie MAILER_DSN dans .env.local.');
            }

            $this->addFlash('success', 'Produit mis à jour.');
            return $this->redirectToRoute('app_produit_index');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

   #[Route('/{id_p<\\d+>}', name: 'app_produit_delete', methods: ['POST'])]
public function delete(Request $request, Produit $produit, EntityManagerInterface $em): Response
{
    if ($this->isGranted('ROLE_ADMIN')) {
        $this->addFlash('warning', 'Mode admin: consultation uniquement pour les produits.');
        return $this->redirectToRoute('app_produit_index');
    }

    if ($this->isCsrfTokenValid('delete'.$produit->getIdP(), $request->request->get('_token'))) {

        // 🔴 منع الحذف إذا عندو mouvements
        if (!$produit->getMouvements()->isEmpty()) {
            $this->addFlash('error', 'Impossible de supprimer ce produit : il a des mouvements.');
            return $this->redirectToRoute('app_produit_show', [
                'id_p' => $produit->getIdP()
            ]);
        }

        $em->remove($produit);
        $em->flush();
        $this->addFlash('success', 'Produit supprimé.');
    } else {
        $this->addFlash('error', 'Jeton CSRF invalide.');
    }

    return $this->redirectToRoute('app_produit_index');
}



    private function chatbotHelpResponse(int $selectedProductId = 0): array
    {
        $lines = [
            'Salut ! Je suis ton assistant produits.',
            '',
            'Tu peux me demander :',
            '- liste produits',
            '- bas stock',
            '- categories',
            '- produit 12',
            '- chercher papier toilette',
        ];

        if ($selectedProductId > 0) {
            $lines[] = '';
            $lines[] = sprintf('Produit selectionne : #%d. Tu peux taper : stock, emplacement, expiration, image.', $selectedProductId);
        }

        return [
            'reply' => implode("\n", $lines),
            'suggestions' => ['Liste produits', 'Bas stock', 'Categories'],
            'products' => [],
            'contextUpdate' => $selectedProductId > 0 ? ['selectedProductId' => $selectedProductId] : [],
        ];
    }

    private function normalizeChatText(string $text): string
    {
        $text = trim($text);
        if ($text === '') {
            return '';
        }

        if (function_exists('mb_strtolower')) {
            $text = mb_strtolower($text, 'UTF-8');
        } else {
            $text = strtolower($text);
        }

        $ascii = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        if (is_string($ascii) && $ascii !== '') {
            $text = $ascii;
        }

        $text = preg_replace('/[^a-z0-9\\s#]/i', ' ', $text);
        $text = preg_replace('/\\s+/', ' ', (string) $text);

        return trim((string) $text);
    }

    private function stripChatStopWords(string $normalized): string
    {
        $stopWords = [
            'je', 'j', 'veux', 'besoin', 'de', 'du', 'des', 'la', 'le', 'les', 'un', 'une',
            'stp', 'svp', 'donne', 'montre', 'affiche', 'sur', 'pour', 'avec', 'dans',
            'produit', 'produits', 'info', 'infos', 'information', 'informations',
            'stock', 'quantite', 'qte', 'emplacement', 'ou', 'date', 'expiration', 'expire',
            'categorie', 'categories', 'chercher', 'cherche', 'search', 'trouve', 'find',
            'bas', 'faible',
        ];

        $words = preg_split('/\\s+/', trim($normalized));
        if (!is_array($words)) {
            return '';
        }

        $filtered = [];
        foreach ($words as $word) {
            $word = trim((string) $word);
            if ($word === '' || in_array($word, $stopWords, true)) {
                continue;
            }
            $filtered[] = $word;
        }

        return trim(implode(' ', $filtered));
    }

    private function buildProduitDetailReply(Produit $produit): string
    {
        $id = (int) $produit->getIdP();
        $stock = (int) $produit->getQuantiteStock();
        $unit = (string) $produit->getUniteP();

        $lines = [
            sprintf('Produit #%d : %s', $id, (string) $produit->getNomP()),
            'Categorie : ' . (string) $produit->getCategorieP(),
            sprintf('Stock : %d %s', $stock, $unit),
            'Emplacement : ' . (string) $produit->getEmplacement(),
        ];

        $dateExp = $produit->getDateExpiration();
        if ($dateExp instanceof \DateTimeInterface) {
            $lines[] = 'Expiration : ' . $dateExp->format('Y-m-d');
        }

        if ($stock < 5) {
            $lines[] = 'Attention : stock bas (< 5).';
        }

        return implode("\n", $lines);
    }

    /**
     * @return array{id: int, name: string, category: string, stock: int, unit: string, location: string, expiresAt: ?string, photoUrl: ?string, url: string, articlesUrl: string}
     */
    private function produitToChatArray(Produit $produit): array
    {
        $id = (int) $produit->getIdP();
        $photo = trim((string) $produit->getPhotoP());
        $photoUrl = null;

        if ($photo !== '') {
            if (preg_match('/^https?:\\/\\//i', $photo)) {
                $photoUrl = $photo;
            } else {
                $photoUrl = '/uploads/produits/' . ltrim($photo, '/');
            }
        }

        $expiresAt = null;
        $dateExp = $produit->getDateExpiration();
        if ($dateExp instanceof \DateTimeInterface) {
            $expiresAt = $dateExp->format('Y-m-d');
        }

        return [
            'id' => $id,
            'name' => (string) $produit->getNomP(),
            'category' => (string) $produit->getCategorieP(),
            'stock' => (int) $produit->getQuantiteStock(),
            'unit' => (string) $produit->getUniteP(),
            'location' => (string) $produit->getEmplacement(),
            'expiresAt' => $expiresAt,
            'photoUrl' => $photoUrl,
            'url' => $this->generateUrl('app_produit_show', ['id_p' => $id]),
            'articlesUrl' => $this->generateUrl('app_produit_articles', ['id_p' => $id]),
        ];
    }
}
