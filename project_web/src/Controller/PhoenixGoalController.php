<?php

namespace App\Controller;

use App\Entity\Goal;
use App\Entity\PhoenixGoal;
use App\Form\PhoenixGoalType;
use App\Repository\PhoenixGoalRepository;
use App\Service\PhoenixService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/phoenix/goal')]
final class PhoenixGoalController extends AbstractController
{
    #[Route(name: 'app_phoenix_goal_index', methods: ['GET'])]
    public function index(PhoenixGoalRepository $phoenixGoalRepository): Response
    {
        $user = $this->getUser();
        if ($this->isGranted('ROLE_ADMIN')) {
            $phoenixGoals = $phoenixGoalRepository->findAll();
        } else {
            $phoenixGoals = $phoenixGoalRepository->findBy(['user' => $user], ['deathDate' => 'DESC']);
        }

        return $this->render('phoenix_goal/index.html.twig', [
            'phoenix_goals' => $phoenixGoals,
        ]);
    }

    #[Route('/new', name: 'app_phoenix_goal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $phoenixGoal = new PhoenixGoal();
        $form = $this->createForm(PhoenixGoalType::class, $phoenixGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($phoenixGoal);
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_goal/new.html.twig', [
            'phoenix_goal' => $phoenixGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_goal_show', methods: ['GET'])]
    public function show(PhoenixGoal $phoenixGoal, PhoenixService $phoenixService): Response
    {
        $phoenixService->updatePhoenixPhase($phoenixGoal, $phoenixGoal->getRebornGoal());

        // pass both snake_case and camelCase keys; Twig sometimes attempts camelCase lookup
        return $this->render('phoenix_goal/show.html.twig', [
            'phoenix_goal' => $phoenixGoal,
            'phoenixGoal' => $phoenixGoal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_phoenix_goal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhoenixGoal $phoenixGoal, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PhoenixGoalType::class, $phoenixGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_goal/edit.html.twig', [
            'phoenix_goal' => $phoenixGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_goal_delete', methods: ['POST'])]
    public function delete(Request $request, PhoenixGoal $phoenixGoal, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $phoenixGoal->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($phoenixGoal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_phoenix_goal_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/resurrect-from-goal/{goalId}', name: 'app_phoenix_resurrect_from_goal', methods: ['POST'])]
    public function resurrectFromGoal(
        int $goalId,
        EntityManagerInterface $entityManager,
        PhoenixService $phoenixService
    ): Response {
        $goal = $entityManager->getRepository(Goal::class)->find($goalId);
        if (!$goal) {
            throw $this->createNotFoundException('Goal not found');
        }

        if (method_exists($goal, 'isDead') && !$goal->isDead()) {
            $this->addFlash('warning', 'Seuls les objectifs abandonnes/echoues peuvent entrer en resurrection Phoenix.');
            return $this->redirectToRoute('app_goal_show', ['id_g' => $goal->getIdGoa()]);
        }

        $phoenixGoal = $phoenixService->registerDeadGoal($goal, $this->getUser());
        $this->addFlash('success', 'Phoenix resurrection started. Your goal will rise from the ashes.');

        return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
    }

    #[Route('/{id}/begin-rebirth', name: 'app_phoenix_begin_rebirth', methods: ['POST'])]
    public function beginRebirth(PhoenixGoal $phoenixGoal, Request $request, PhoenixService $phoenixService): Response
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('phoenix_begin_rebirth_' . $phoenixGoal->getId(), (string) $submittedToken)) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
        }

        if ($phoenixGoal->getRebornGoal()) {
            $this->addFlash('info', 'Un objectif renaissant existe deja pour cette instance.');
            return $this->redirectToRoute('app_goal_show', ['id_g' => $phoenixGoal->getRebornGoal()->getIdGoa()]);
        }

        $original = $phoenixGoal->getOriginalGoal();
        $rebornGoal = $phoenixService->createRebornGoal($phoenixGoal, [
            'title' => ($original?->getTitleGoa() ?? 'Objectif') . ' - Renaissance',
            'description' => $original?->getDescriptionGoa(),
            'priority' => 'HAUTE',
        ]);

        $this->addFlash('success', 'Renaissance lancee. Le nouvel objectif a ete cree.');

        return $this->redirectToRoute('app_goal_show', ['id_g' => $rebornGoal->getIdGoa()]);
    }

    #[Route('/{id}/enable-immortality', name: 'app_phoenix_enable_immortality', methods: ['POST'])]
    public function enableImmortality(
        PhoenixGoal $phoenixGoal,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('phoenix_enable_immortality_' . $phoenixGoal->getId(), (string) $submittedToken)) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
        }

        if (!$phoenixGoal->isImmortalityEnabled()) {
            $phoenixGoal->setImmortalityEnabled(true);
            $phoenixGoal->setPhoenixLevel(($phoenixGoal->getPhoenixLevel() ?? 1) + 1);
            $entityManager->flush();
            $this->addFlash('success', 'Immortalite Phoenix activee.');
        } else {
            $this->addFlash('info', 'Immortalite deja active.');
        }

        return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
    }

    #[Route('/{id}/share-wisdom', name: 'app_phoenix_share_wisdom', methods: ['POST'])]
    public function shareWisdom(
        PhoenixGoal $phoenixGoal,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('phoenix_share_wisdom_' . $phoenixGoal->getId(), (string) $submittedToken)) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
        }

        $lesson = trim((string) $request->request->get('lesson', ''));
        if ('' === $lesson) {
            $this->addFlash('warning', 'Veuillez saisir une leçon avant de partager.');
            return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
        }

        $wisdom = new \App\Entity\PhoenixWisdom();
        $wisdom->setCategory($phoenixGoal->getOriginalGoal()?->getCategoryGoa() ?? 'général');
        $wisdom->setLesson($lesson);
        $wisdom->setSuccessCount(0);
        $wisdom->setTags([]);
        $wisdom->setCreatedAt(new \DateTime());
        $wisdom->setContributor($this->getUser());
        $wisdom->setPhoenixGoal($phoenixGoal);

        $entityManager->persist($wisdom);
        $phoenixGoal->setWisdomShared(true);
        $entityManager->flush();

        $this->addFlash('success', 'Merci pour le partage de votre sagesse.');
        return $this->redirectToRoute('app_phoenix_goal_show', ['id' => $phoenixGoal->getId()]);
    }
}
