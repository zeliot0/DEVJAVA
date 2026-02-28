<?php

namespace App\Controller;

use App\Entity\Goal;
use App\Form\GoalType;
use App\Repository\GoalRepository;
use App\Service\GoalAnalysisService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/goal')]  
class GoalController extends AbstractController
{
    private function denyAdminGoalWriteAccess(): ?Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'En tant qu\'admin, la section Goals est en lecture seule.');
            return $this->redirectToRoute('app_goal_index');
        }

        return null;
    }

   #[Route('/', name: 'app_goal_index', methods: ['GET'])]
public function index(GoalRepository $goalRepository, Request $request): Response
{
    $search = trim((string) $request->query->get('q', ''));
    $sort = (string) $request->query->get('sort', 'progress_desc');
    $allowedSorts = ['progress_desc', 'progress_asc', 'status'];

    if (!in_array($sort, $allowedSorts, true)) {
        $sort = 'progress_desc';
    }

    $goals = $goalRepository->findBySearchAndSort($search, $sort);
    
    return $this->render('goal/index.html.twig', [
        'goals' => $goals,
        'search' => $search,
        'sort' => $sort,
    ]);
}

    #[Route('/new', name: 'app_goal_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    if ($response = $this->denyAdminGoalWriteAccess()) {
        return $response;
    }

    $goal = new Goal();
    $form = $this->createForm(GoalType::class, $goal);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($goal);
        $entityManager->flush();

        $this->addFlash('success', 'Objectif créé avec succès!');
        return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('goal/new.html.twig', [
        'goal' => $goal,
        'form' => $form->createView(),
    ]);
}

    #[Route('/{id_g}', name: 'app_goal_show', methods: ['GET','POST'])]
    public function show(
        int $id_g,
        GoalRepository $goalRepository,
        Request $request,
        EntityManagerInterface $em,
        \App\Service\GoalSuccessService $goalSuccessService,
        \Symfony\Component\Messenger\MessageBusInterface $bus
    ): Response
    {
        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }

        // ensure there is a success score computed for display
        if ($goal->getSuccessScore() === null) {
            $goal->setSuccessScore($goalSuccessService->computeScore($goal)['score']);
            $em->flush();
        }

        // risk form handling
        $risk = new \App\Entity\Risk();
        $riskForm = $this->createForm(\App\Form\RiskType::class, $risk);
        $riskForm->handleRequest($request);

        if ($riskForm->isSubmitted() && $riskForm->isValid()) {
            $risk->setGoal($goal);
            $goal->addRisk($risk);
            $risk->setUser($this->getUser());
            $em->persist($risk);
            $em->flush();

            // dispatch asynchronous analysis
            $bus->dispatch(new \App\Message\AnalyzeRiskMessage($risk->getId()));

            // recalc goal success and store
            $goal->setSuccessScore($goalSuccessService->computeScore($goal)['score']);
            $em->flush();

            $this->addFlash('success', 'Risque ajouté et analyse AI en cours.');
            return $this->redirectToRoute('app_goal_show', ['id_g' => $goal->getIdGoa()]);
        }

        return $this->render('goal/show.html.twig', [
            'goal' => $goal,
            'riskForm' => $riskForm->createView(),
        ]);
    }

    #[Route('/{id_g}/analysis', name: 'app_goal_analysis', methods: ['GET','POST'])]
    public function analysis(
        int $id_g,
        GoalRepository $goalRepository,
        Request $request,
        GoalAnalysisService $analysisService
    ): Response
    {
        $goal = $goalRepository->find($id_g);
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }

        if ($request->isMethod('POST')) {
            try {
                $report = $analysisService->analyze($goal);

                $emotionLabel = trim((string) $request->request->get('emotion_label', ''));
                $emotionIntensity = $request->request->getInt('emotion_intensity', 0);
                $emotionConfidence = $request->request->getInt('emotion_confidence', 0);
                $includeSpiritual = (string) $request->request->get('include_spiritual', '1') !== '0';

                if ($emotionLabel !== '') {
                    $emotionKey = $this->normalizeEmotionKey($emotionLabel);
                    $riskCount = $this->extractRiskCount($report['risks'] ?? null);
                    $hasDeadlineIssue = $this->hasDeadlineIssue((string) ($report['blockers'] ?? ''));
                    $emotionInsight = $this->buildEmotionInsight($emotionKey, $riskCount, $hasDeadlineIssue);

                    $report['emotionContext'] = [
                        'label' => $emotionLabel,
                        'intensity' => max(0, min(100, $emotionIntensity)),
                        'confidence' => max(0, min(100, $emotionConfidence)),
                    ];
                    $report['emotionInsight'] = $emotionInsight;

                    if ($includeSpiritual) {
                        $report['spiritualGuidance'] = $this->buildSpiritualGuidance($emotionKey, $riskCount, $hasDeadlineIssue);
                    }

                    $scoreImpact = $this->computeEmotionScoreImpact($emotionKey, $emotionIntensity, $riskCount, $hasDeadlineIssue);
                    if (isset($report['successScore']) && is_numeric($report['successScore']) && $scoreImpact !== 0) {
                        $baseScore = (int) $report['successScore'];
                        $adjustedScore = max(0, min(100, $baseScore + $scoreImpact));
                        $report['successScore'] = $adjustedScore;
                        $report['emotionScoreImpact'] = [
                            'baseScore' => $baseScore,
                            'adjustedScore' => $adjustedScore,
                            'delta' => $scoreImpact,
                            'explanation' => $scoreImpact < 0
                                ? 'L etat emotionnel actuel peut ralentir certaines decisions strategiques.'
                                : 'L etat emotionnel actuel soutient la dynamique decisionnelle.',
                        ];
                    }
                }

                return $this->json(['ok' => true, 'data' => $report]);
            } catch (\Throwable $e) {
                return $this->json([
                    'ok' => false,
                    'error' => 'Analyse indisponible pour le moment.',
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        return $this->render('goal/analysis.html.twig', [
            'goal' => $goal,
        ]);
    }

   #[Route('/{id_g}/edit', name: 'app_goal_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, int $id_g, GoalRepository $goalRepository, EntityManagerInterface $entityManager): Response
{
    if ($response = $this->denyAdminGoalWriteAccess()) {
        return $response;
    }

    $goal = $goalRepository->find($id_g);
    
    if (!$goal) {
        throw $this->createNotFoundException('Objectif non trouvé');
    }

    
    $oldProgress = $goal->getProgressGoa();
    
    
    $form = $this->createForm(GoalType::class, $goal);
    $form->handleRequest($request);


    if ($form->isSubmitted()) {
       
        
        if ($form->isValid()) {
           
            
            $newProgress = $goal->getProgressGoa();
            
            
            if ($oldProgress < 100 && $newProgress >= 100) {
                $goal->setStatusGoa('TERMINÉ');
                $this->addFlash('success', '🎉 Félicitations ! Objectif atteint à 100% !');
            }
            
            
            $entityManager->flush();
            
            $this->addFlash('success', 'Objectif mis à jour avec succès !');
            return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
        } else {
            
            $this->addFlash('error', 'Il y a des erreurs dans le formulaire.');
        }
    }

    return $this->render('goal/edit.html.twig', [
        'goal' => $goal,
        'form' => $form->createView(),
    ]);
}



    #[Route('/{id_g}/delete', name: 'app_goal_delete', methods: ['POST'])]
    public function delete(Request $request, int $id_g, GoalRepository $goalRepository, EntityManagerInterface $entityManager): Response
    {
        if ($response = $this->denyAdminGoalWriteAccess()) {
            return $response;
        }

        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }

        if ($this->isCsrfTokenValid('delete' . $id_g, $request->request->get('_token'))) {
            $entityManager->remove($goal);
            $entityManager->flush();
            
            $this->addFlash('success', 'Objectif supprimé avec succès !');
        }

        return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/{id}/progress/up', name: 'app_goal_progress_up', methods: ['POST'])]
public function progressUp(int $id, GoalRepository $repo, EntityManagerInterface $em): Response
{
    if ($response = $this->denyAdminGoalWriteAccess()) {
        return $response;
    }

    $goal = $repo->find($id);

    if (!$goal) {
        throw $this->createNotFoundException('Objectif non trouvé');
    }

    $goal->setProgressGoa(($goal->getProgressGoa() ?? 0) + 10);

    $em->flush();

    return $this->redirectToRoute('app_goal_index');
}

#[Route('/{id}/progress/down', name: 'app_goal_progress_down', methods: ['POST'])]
public function progressDown(int $id, GoalRepository $repo, EntityManagerInterface $em): Response
{
    if ($response = $this->denyAdminGoalWriteAccess()) {
        return $response;
    }

    $goal = $repo->find($id);

    if (!$goal) {
        throw $this->createNotFoundException('Objectif non trouvé');
    }

    $goal->setProgressGoa(($goal->getProgressGoa() ?? 0) - 10);

    $em->flush();

    return $this->redirectToRoute('app_goal_index');
}

    private function normalizeEmotionKey(string $emotionLabel): string
    {
        return match (strtolower(trim($emotionLabel))) {
            'sad', 'triste', 'tristesse' => 'sad',
            'angry', 'colere', 'frustre', 'frustrated' => 'angry',
            'fear', 'peur', 'anxious', 'anxiete' => 'fear',
            'happy', 'joy', 'joie' => 'happy',
            'surprise', 'surprised' => 'surprise',
            default => 'neutral',
        };
    }

    private function extractRiskCount(mixed $risks): int
    {
        if (is_numeric($risks)) {
            return max(0, (int) $risks);
        }
        if (is_string($risks) && preg_match('/\d+/', $risks, $m)) {
            return (int) $m[0];
        }

        return 0;
    }

    private function hasDeadlineIssue(string $blockers): bool
    {
        $txt = strtolower($blockers);

        return str_contains($txt, 'echeance depassee') || str_contains($txt, 'deadline');
    }

    private function buildEmotionInsight(string $emotionKey, int $riskCount, bool $hasDeadlineIssue): string
    {
        $riskPart = $riskCount > 0
            ? ' Vous avez actuellement '.$riskCount.' risque(s) actif(s), ce qui augmente la pression.'
            : ' Aucun risque actif majeur n est detecte pour le moment.';
        $deadlinePart = $hasDeadlineIssue
            ? ' Une echeance depassee est detectee: priorisez une reprise structuree plutot qu une reaction impulsive.'
            : '';

        return match ($emotionKey) {
            'sad' => 'Un etat de tristesse peut reduire l energie d execution et accentuer les obstacles percus.'.$riskPart.$deadlinePart,
            'angry' => 'Un etat de tension peut provoquer des decisions trop rapides. Prenez un temps de recul avant les choix critiques.'.$riskPart.$deadlinePart,
            'fear' => 'Un niveau d inquietude eleve peut pousser a surestimer les menaces. Basez vos priorites sur des indicateurs concrets.'.$riskPart.$deadlinePart,
            'happy' => 'Un etat positif soutient la dynamique du projet; gardez tout de meme une evaluation rigoureuse des contraintes.'.$riskPart,
            'surprise' => $hasDeadlineIssue || $riskCount > 0
                ? 'Votre surprise peut etre liee aux retards ou aux risques constates. Cette situation demande analyse et recalibrage immediat plutot qu une reaction emotionnelle.'
                : 'Votre surprise indique un changement inattendu. Transformez ce signal en opportunite strategique en reevaluant les jalons.',
            default => 'Cet etat emotionnel sera pris en compte pour contextualiser les recommandations strategiques.',
        };
    }

    private function buildSpiritualGuidance(string $emotionKey, int $riskCount, bool $hasDeadlineIssue): array
    {
        $guidance = match ($emotionKey) {
            'sad' => [
                'ayahArabic' => 'فَإِنَّ مَعَ الْعُسْرِ يُسْرًا',
                'ayahFrench' => 'En verite, avec la difficulte vient la facilite.',
                'ayahEnglish' => 'Indeed, with hardship comes ease.',
                'reference' => 'Ash-Sharh 94:6',
                'explanation' => 'La tristesse signale souvent une phase de lutte. Cet ayah rappelle que la difficulte n est pas permanente.',
                'action' => 'Decoupez votre prochaine etape en une action simple executable aujourd hui.',
            ],
            'fear' => [
                'ayahArabic' => 'لَا تَخَفْ إِنَّ اللَّهَ مَعَنَا',
                'ayahFrench' => 'Ne crains pas, Allah est avec nous.',
                'ayahEnglish' => 'Do not fear; indeed Allah is with us.',
                'reference' => 'At-Tawbah 9:40',
                'explanation' => 'Quand l inquietude monte, ce rappel aide a sortir de la panique et a revenir a une decision lucide.',
                'action' => 'Listez 3 faits verifies sur le projet avant de redefinir les priorites.',
            ],
            'happy' => [
                'ayahArabic' => 'قُلْ بِفَضْلِ اللَّهِ وَبِرَحْمَتِهِ فَبِذَٰلِكَ فَلْيَفْرَحُوا',
                'ayahFrench' => 'Dis: de la grace d Allah et de Sa misericorde, qu ils se rejouissent.',
                'ayahEnglish' => 'Say: In the bounty of Allah and in His mercy, let them rejoice.',
                'reference' => 'Yunus 10:58',
                'explanation' => 'La joie devient constructive lorsqu elle nourrit gratitude, discipline et constance.',
                'action' => 'Transformez votre elan du jour en une avancee concrete sur le jalon prioritaire.',
            ],
            'surprise' => [
                'ayahArabic' => 'وَعَسَىٰ أَن تَكْرَهُوا شَيْئًا وَهُوَ خَيْرٌ لَّكُمْ',
                'ayahFrench' => 'Il se peut que vous detestiez une chose alors qu elle est un bien pour vous.',
                'ayahEnglish' => 'Perhaps you dislike something while it is good for you.',
                'reference' => 'Al-Baqarah 2:216',
                'explanation' => 'Le changement inattendu peut cacher une opportunite utile pour la trajectoire de votre objectif.',
                'action' => 'Reevaluez les jalons avec un regard ouvert, puis ajustez la priorite du prochain sprint.',
            ],
            default => [
                'ayahArabic' => 'فَإِذَا عَزَمْتَ فَتَوَكَّلْ عَلَى اللَّهِ',
                'ayahFrench' => 'Lorsque tu te decides, place ta confiance en Allah.',
                'ayahEnglish' => 'When you decide, then rely upon Allah.',
                'reference' => 'Aal-Imran 3:159',
                'explanation' => 'Ce rappel soutient une posture d intention claire et d action mesuree.',
                'action' => 'Fixez une decision precise aujourd hui puis executez la premiere etape sans dispersion.',
            ],
        };

        if ($hasDeadlineIssue || $riskCount > 0) {
            $guidance['explanation'] .= ' Votre contexte actuel montre des tensions operationnelles qui demandent une reorientation calme.';
            $guidance['action'] = 'Priorisez un mini-plan de reprise: 1 blocage critique, 1 risque a traiter, 1 action datee sous 24h.';
        }

        return $guidance;
    }

    private function computeEmotionScoreImpact(string $emotionKey, int $intensity, int $riskCount, bool $hasDeadlineIssue): int
    {
        $impact = 0;
        $isHighIntensity = $intensity >= 60;

        if (in_array($emotionKey, ['sad', 'fear', 'angry'], true) && $isHighIntensity) {
            $impact -= 5;
        }
        if ($emotionKey === 'surprise' && ($riskCount > 0 || $hasDeadlineIssue)) {
            $impact -= 4;
        }
        if ($riskCount >= 2) {
            $impact -= 3;
        }
        if ($hasDeadlineIssue) {
            $impact -= 3;
        }
        if ($emotionKey === 'happy' && $isHighIntensity && $riskCount === 0 && !$hasDeadlineIssue) {
            $impact += 2;
        }

        return max(-12, min(3, $impact));
    }

}
