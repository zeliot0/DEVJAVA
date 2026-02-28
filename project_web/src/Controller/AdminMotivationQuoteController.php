<?php

namespace App\Controller;

use App\Service\MotivationMessagesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/motivation-quotes')]
class AdminMotivationQuoteController extends AbstractController
{
    #[Route('/', name: 'admin_motivation_quotes_index', methods: ['GET'])]
    public function index(MotivationMessagesService $messagesService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $quotesByMood = $messagesService->getAllMessages();
        ksort($quotesByMood);

        return $this->render('admin/motivation_quotes/index.html.twig', [
            'quotesByMood' => $quotesByMood,
        ]);
    }

    #[Route('/new', name: 'admin_motivation_quotes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MotivationMessagesService $messagesService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $mood = $this->sanitizeMood((string) $request->request->get('mood', $request->query->get('mood', 'motivated')));
        $quote = $this->extractQuoteFromRequest($request);

        if ($request->isMethod('POST')) {
            $errors = $this->validate($mood, $quote);
            if ($errors === []) {
                $messagesService->addMessage($mood, $quote);
                $this->addFlash('success', 'Quote ajoutee avec succes.');

                return $this->redirectToRoute('admin_motivation_quotes_index');
            }

            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->render('admin/motivation_quotes/form.html.twig', [
            'mode' => 'new',
            'mood' => $mood,
            'quote' => $quote,
            'availableMoods' => $messagesService->getAvailableMoods(),
        ]);
    }

    #[Route('/{mood}/{index}/edit', name: 'admin_motivation_quotes_edit', methods: ['GET', 'POST'], requirements: ['index' => '\d+'])]
    public function edit(string $mood, int $index, Request $request, MotivationMessagesService $messagesService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $mood = $this->sanitizeMood($mood);
        $existing = $messagesService->getMessage($mood, $index);
        if (!$existing) {
            throw $this->createNotFoundException('Quote introuvable.');
        }

        $targetMood = $this->sanitizeMood((string) $request->request->get('mood', $mood));
        $quote = $request->isMethod('POST') ? $this->extractQuoteFromRequest($request) : $existing;

        if ($request->isMethod('POST')) {
            $errors = $this->validate($targetMood, $quote);
            if ($errors === []) {
                if ($targetMood === $mood) {
                    $messagesService->updateMessage($mood, $index, $quote);
                } else {
                    $messagesService->deleteMessage($mood, $index);
                    $messagesService->addMessage($targetMood, $quote);
                }

                $this->addFlash('success', 'Quote modifiee avec succes.');
                return $this->redirectToRoute('admin_motivation_quotes_index');
            }

            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->render('admin/motivation_quotes/form.html.twig', [
            'mode' => 'edit',
            'mood' => $targetMood,
            'quote' => $quote,
            'originalMood' => $mood,
            'originalIndex' => $index,
            'availableMoods' => $messagesService->getAvailableMoods(),
        ]);
    }

    #[Route('/{mood}/{index}/delete', name: 'admin_motivation_quotes_delete', methods: ['POST'], requirements: ['index' => '\d+'])]
    public function delete(string $mood, int $index, Request $request, MotivationMessagesService $messagesService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $mood = $this->sanitizeMood($mood);
        if (!$this->isCsrfTokenValid('delete_quote_' . $mood . '_' . $index, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_motivation_quotes_index');
        }

        if ($messagesService->deleteMessage($mood, $index)) {
            $this->addFlash('success', 'Quote supprimee.');
        } else {
            $this->addFlash('error', 'Quote introuvable.');
        }

        return $this->redirectToRoute('admin_motivation_quotes_index');
    }

    private function extractQuoteFromRequest(Request $request): array
    {
        return [
            'arabic' => trim((string) $request->request->get('arabic', '')),
            'french' => trim((string) $request->request->get('french', '')),
            'english' => trim((string) $request->request->get('english', '')),
            'source' => trim((string) $request->request->get('source', '')),
        ];
    }

    /**
     * @return array<int, string>
     */
    private function validate(string $mood, array $quote): array
    {
        $errors = [];

        if ($mood === '') {
            $errors[] = 'Mood invalide.';
        }

        if (($quote['french'] ?? '') === '') {
            $errors[] = 'Le champ citation (francais) est obligatoire.';
        }

        if (($quote['source'] ?? '') === '') {
            $errors[] = 'Le champ source est obligatoire.';
        }

        return $errors;
    }

    private function sanitizeMood(string $mood): string
    {
        $mood = strtolower(trim($mood));
        return preg_replace('/[^a-z0-9_-]/', '', $mood) ?? '';
    }
}
