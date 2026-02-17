<?php

namespace App\Controller;

use App\Entity\ConscienceFeedback;
use App\Entity\Question;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\ConscienceFeedbackRepository;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceFeedbackController extends AbstractController
{
    #[Route('/conscience/feedback', name: 'app_conscience_feedback_submit', methods: ['POST'])]
    public function submit(
        Request $request,
        EntityManagerInterface $em,
        ThemeRepository $themeRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        if (!$this->isCsrfTokenValid('conscience_feedback', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Session invalide. Reessayez.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            $this->addFlash('error', 'Utilisateur non reconnu.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $satisfaction = (int) $request->request->get('satisfaction', 0);
        if ($satisfaction < 1 || $satisfaction > 5) {
            $this->addFlash('error', 'Merci de choisir une note de satisfaction entre 1 et 5.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $favoriteThemeId = (int) $request->request->get('favorite_theme_id', 0);
        $favoriteTheme = null;
        if ($favoriteThemeId > 0) {
            $favoriteTheme = $themeRepository->find($favoriteThemeId);
            if (!$favoriteTheme instanceof Theme) {
                $this->addFlash('error', 'Theme prefere invalide.');
                return $this->redirectToRoute('app_conscience_index');
            }
        }

        $feedback = new ConscienceFeedback();
        $feedback->setUser($user);
        $feedback->setSatisfaction($satisfaction);
        $feedback->setFavoriteTheme($favoriteTheme);
        $feedback->setComment($request->request->get('comment'));
        $feedback->setSuggestedThemeName($request->request->get('suggested_theme_name'));
        $feedback->setSuggestedThemeGoal($request->request->get('suggested_theme_goal'));
        $feedback->setSuggestedThemeVibe($request->request->get('suggested_theme_vibe'));

        $em->persist($feedback);
        $em->flush();

        $this->addFlash('success', 'Merci! Votre avis a bien ete envoye a l\'administrateur.');
        return $this->redirectToRoute('app_conscience_index');
    }

    #[Route('/conscience/theme-suggestion', name: 'app_conscience_theme_suggestion_submit', methods: ['POST'])]
    public function submitThemeSuggestion(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        if (!$this->isCsrfTokenValid('conscience_theme_suggestion', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Session invalide. Reessayez.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            $this->addFlash('error', 'Utilisateur non reconnu.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $name = trim((string) $request->request->get('suggested_theme_name', ''));
        if ($name === '') {
            $this->addFlash('error', 'Merci de renseigner un nom de theme.');
            return $this->redirectToRoute('app_conscience_index');
        }

        $vibe = trim((string) $request->request->get('suggested_theme_vibe', '')) ?: 'creativite';
        $goal = trim((string) $request->request->get('suggested_theme_goal', ''));
        $themeMeta = $this->resolveThemeMeta($vibe);

        $theme = new Theme();
        $theme->setNom(mb_substr($name, 0, 255));
        $theme->setDescriptionQ($this->fitThemeText($goal !== '' ? $goal : $themeMeta['defaultDescription'], 10, 50));
        $theme->setIntention($this->fitThemeText($goal !== '' ? $goal : $themeMeta['defaultIntention'], 10, 50));
        $theme->setIcone($themeMeta['icon']);
        $theme->setCouleur($themeMeta['color']);
        $theme->setPriorite($themeMeta['priority']);
        $theme->setActif(true);

        $em->persist($theme);

        foreach ($this->buildStarterQuestions($theme, $vibe, $name) as $question) {
            $em->persist($question);
        }

        $feedback = new ConscienceFeedback();
        $feedback->setUser($user);
        $feedback->setSatisfaction(4);
        $feedback->setFavoriteTheme($theme);
        $feedback->setSuggestedThemeName($name);
        $feedback->setSuggestedThemeGoal($goal);
        $feedback->setSuggestedThemeVibe($vibe);
        $feedback->setComment('Theme cree et active en temps reel par utilisateur.');
        $em->persist($feedback);

        $em->flush();

        $this->addFlash('success', 'Theme cree en temps reel. Vous pouvez l utiliser maintenant.');
        return $this->redirectToRoute('app_theme_answer', ['id' => $theme->getIdT()]);
    }

    /**
     * @return array{icon:string,color:string,priority:int,defaultDescription:string,defaultIntention:string}
     */
    private function resolveThemeMeta(string $vibe): array
    {
        return match ($vibe) {
            'motivation' => [
                'icon' => 'fa-solid fa-fire',
                'color' => '#ef4444',
                'priority' => 4,
                'defaultDescription' => 'Booster la motivation et la regularite chaque jour.',
                'defaultIntention' => 'Garder un elan fort et des actions concretes.',
            ],
            'calme' => [
                'icon' => 'fa-solid fa-leaf',
                'color' => '#10b981',
                'priority' => 3,
                'defaultDescription' => 'Retrouver calme mental et equilibre quotidien.',
                'defaultIntention' => 'Reduire le stress avec des rituels simples.',
            ],
            'performance' => [
                'icon' => 'fa-solid fa-bolt',
                'color' => '#f59e0b',
                'priority' => 5,
                'defaultDescription' => 'Ameliorer focus, execution et resultats mesurables.',
                'defaultIntention' => 'Passer a un niveau de performance superieur.',
            ],
            'bien_etre' => [
                'icon' => 'fa-solid fa-heart',
                'color' => '#ec4899',
                'priority' => 3,
                'defaultDescription' => 'Renforcer bien-etre, energie et habitudes saines.',
                'defaultIntention' => 'Construire une hygiene de vie durable.',
            ],
            default => [
                'icon' => 'fa-solid fa-lightbulb',
                'color' => '#6366f1',
                'priority' => 3,
                'defaultDescription' => 'Explorer des idees creatives et passer a l action.',
                'defaultIntention' => 'Transformer les idees en habitudes concretes.',
            ],
        };
    }

    private function fitThemeText(string $text, int $min, int $max): string
    {
        $clean = trim(preg_replace('/\s+/', ' ', $text) ?? '');
        if ($clean === '') {
            $clean = 'Theme personnel utile et concret au quotidien.';
        }
        if (mb_strlen($clean) > $max) {
            $clean = mb_substr($clean, 0, $max);
        }
        if (mb_strlen($clean) < $min) {
            $clean = str_pad($clean, $min, '.');
        }
        return $clean;
    }

    /**
     * @return Question[]
     */
    private function buildStarterQuestions(Theme $theme, string $vibe, string $themeName): array
    {
        $baseQuestions = match ($vibe) {
            'motivation' => [
                'Qu est-ce qui vous motive le plus aujourd hui ?',
                'Quelle action concrete allez-vous faire maintenant ?',
                'Avez-vous avance sur votre objectif principal ?',
            ],
            'calme' => [
                'Comment evaluez-vous votre niveau de calme aujourd hui ?',
                'Quelle pratique vous a aide a vous apaiser ?',
                'Avez-vous pris un moment de pause consciente ?',
            ],
            'performance' => [
                'Avez-vous complete la tache la plus importante ?',
                'Combien de sessions de focus avez-vous faites ?',
                'Quel blocage a ralenti votre execution ?',
            ],
            'bien_etre' => [
                'Comment etait votre energie globale aujourd hui ?',
                'Avez-vous maintenu une habitude saine aujourd hui ?',
                'Quelle action bien-etre referez-vous demain ?',
            ],
            default => [
                sprintf('Quelle idee forte voulez-vous tester pour "%s" ?', $themeName),
                'Quelle action creative pouvez-vous lancer en 10 minutes ?',
                'Quel resultat concret voulez-vous observer cette semaine ?',
            ],
        };

        $questions = [];
        foreach ($baseQuestions as $index => $text) {
            $question = new Question();
            $question->setTheme($theme);
            $question->setTexte($text);
            $question->setType('texte');
            $question->setTypeReponse('text');
            $question->setFrequence('hebdomadaire');
            $question->setNiveau('moyen');
            $question->setOrdre($index + 1);
            $question->setGenereTache(false);
            $question->setActif(true);
            $questions[] = $question;
        }

        return $questions;
    }

    #[Route('/admin/conscience-feedback', name: 'app_admin_conscience_feedback', methods: ['GET'])]
    public function adminIndex(ConscienceFeedbackRepository $feedbackRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('admin/conscience_feedback/index.html.twig', [
            'stats' => $feedbackRepository->getOverviewStats(),
            'topThemes' => $feedbackRepository->getTopFavoriteThemes(6),
            'feedbacks' => $feedbackRepository->findLatestWithRelations(60),
        ]);
    }
}
