<?php

namespace App\Controller;

use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceChatbotController extends AbstractController
{
    #[Route('/api/conscience/chatbot', name: 'app_conscience_chatbot', methods: ['POST'])]
    public function reply(Request $request, ThemeRepository $themeRepository): JsonResponse
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            $payload = $request->request->all();
        }

        $message = trim((string) ($payload['message'] ?? ''));
        if ($message == '') {
            return $this->json([
                'reply' => 'Posez une question sur vos themes, votre focus, ou vos rapports.',
                'suggestions' => [
                    'Quel theme dois-je traiter en premier ?',
                    'Comment ameliorer ma progression ?',
                    'Donne-moi une action rapide aujourd hui',
                ],
            ]);
        }

        $normalized = $this->normalize($message);
        $themes = $themeRepository->findBy(['actif' => true], ['priorite' => 'DESC'], 3);
        $themeNames = [];
        foreach ($themes as $theme) {
            $name = trim((string) $theme->getNom());
            if ($name !== '') {
                $themeNames[] = $name;
            }
        }

        $topTheme = $themeNames[0] ?? null;
        $themeList = $themeNames !== [] ? implode(', ', $themeNames) : 'Aucun theme actif pour le moment';

        $reply = 'Je suis la pour vous aider sur Conscience.';
        $suggestions = [
            'Donne-moi une priorite pour aujourd hui',
            'Comment mieux repondre aux questions ?',
            'Resume mon focus de la semaine',
        ];

        if ($this->containsAny($normalized, ['bonjour', 'salut', 'hello', 'bonsoir'])) {
            $reply = 'Bonjour. Je peux vous guider sur les themes, la priorite et les actions rapides.';
        } elseif ($this->containsAny($normalized, ['theme', 'themes'])) {
            $reply = $themeNames !== []
                ? "Vos themes prioritaires actuels: {$themeList}."
                : 'Aucun theme actif detecte. Vous pouvez proposer un nouveau theme dans la section Themes.';
            $suggestions = [
                'Quel theme est le plus urgent ?',
                'Aide-moi a choisir un nouveau theme',
                'Comment creer un theme utile ?',
            ];
        } elseif ($this->containsAny($normalized, ['priorite', 'urgent', 'focus'])) {
            $reply = $topTheme
                ? "Commencez par le theme \"{$topTheme}\" puis faites une action de 10 minutes sans interruption."
                : 'Definissez une priorite simple: 1 theme + 1 action concrete a terminer aujourd hui.';
            $suggestions = [
                'Donne-moi une action de 10 minutes',
                'Comment rester regulier ?',
                'Que faire si je manque de motivation ?',
            ];
        } elseif ($this->containsAny($normalized, ['rapport', 'analyse', 'resultat'])) {
            $reply = 'Pour un bon rapport: comparez vos reponses recentes, detectez 1 force et 1 axe faible, puis fixez une action precise.';
            $suggestions = [
                'Donne-moi un plan 24h',
                'Donne-moi un plan 7 jours',
                'Transforme un point faible en action',
            ];
        } elseif ($this->containsAny($normalized, ['tache', 'task', 'action'])) {
            $reply = 'Action recommandee: choisissez une tache courte, mesurable et faisable maintenant (max 15 minutes).';
            $suggestions = [
                'Donne-moi 3 micro-taches',
                'Comment prioriser mes taches ?',
                'Comment eviter la procrastination ?',
            ];
        } elseif ($this->containsAny($normalized, ['aide', 'help'])) {
            $reply = 'Vous pouvez me demander: priorite du jour, choix de theme, interpretation de rapport, et actions concretes.';
            $suggestions = [
                'Priorite du jour',
                'Choix du theme',
                'Action rapide',
            ];
        }

        return $this->json([
            'reply' => $reply,
            'suggestions' => $suggestions,
        ]);
    }

    private function containsAny(string $message, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (str_contains($message, $this->normalize((string) $keyword))) {
                return true;
            }
        }

        return false;
    }

    private function normalize(string $value): string
    {
        $normalized = mb_strtolower(trim($value));
        $converted = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $normalized);
        if ($converted !== false) {
            $normalized = $converted;
        }

        return preg_replace('/\s+/', ' ', $normalized) ?? $normalized;
    }
}
