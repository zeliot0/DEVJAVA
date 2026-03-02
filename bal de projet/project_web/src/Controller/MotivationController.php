<?php

namespace App\Controller;

use App\Entity\Motivation;
use App\Form\MotivationType;
use App\Repository\GoalRepository;
use App\Repository\MoodClickRepository;
use App\Repository\MotivationRepository;
use App\Service\MotivationMessagesService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/motivation')]
class MotivationController extends AbstractController
{
    private function denyAdminMotivationWriteAccess(): ?Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'En tant qu\'admin, la section Motivation est en mode statistiques uniquement.');
            return $this->redirectToRoute('app_motivation_index');
        }

        return null;
    }

    #[Route('/', name: 'app_motivation_index', methods: ['GET'])]
    public function index(
        MotivationRepository $motivationRepository,
        MoodClickRepository $moodClickRepository,
        GoalRepository $goalRepository,
        Request $request,
        MotivationMessagesService $messagesService
    ): Response {
        $currentMood = $request->query->get('mood');
        $inspirationalMessage = null;

        if ($currentMood) {
            $inspirationalMessage = $messagesService->getRandomMessage($currentMood);
        }

        return $this->render('motivation/index.html.twig', [
            'motivations' => $motivationRepository->findAll(),
            'goals' => $goalRepository->findAll(),
            'moods' => $motivationRepository->getAvailableMoods(),
            'emoji_map' => $this->getEmojiMap(),
            'current_mood' => $currentMood,
            'inspirational_message' => $inspirationalMessage,
            'all_messages' => $messagesService->getAllMessages(),
            'mood_click_stats' => $moodClickRepository->getMoodClickStats(),
        ]);
    }

    #[Route('/new', name: 'app_motivation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($response = $this->denyAdminMotivationWriteAccess()) {
            return $response;
        }

        $motivation = new Motivation();
        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motivation);
            $entityManager->flush();

            $this->addFlash('success', 'Message cree.');
            return $this->redirectToRoute('app_motivation_index');
        }

        return $this->render('motivation/new.html.twig', [
            'motivation' => $motivation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_motivation_show', methods: ['GET'])]
    public function show(Motivation $motivation): Response
    {
        return $this->render('motivation/show.html.twig', [
            'motivation' => $motivation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_motivation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Motivation $motivation, EntityManagerInterface $entityManager): Response
    {
        if ($response = $this->denyAdminMotivationWriteAccess()) {
            return $response;
        }

        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Message modifie.');
            return $this->redirectToRoute('app_motivation_index');
        }

        return $this->render('motivation/edit.html.twig', [
            'motivation' => $motivation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_motivation_delete', methods: ['POST'])]
    public function delete(Request $request, Motivation $motivation, EntityManagerInterface $entityManager): Response
    {
        if ($response = $this->denyAdminMotivationWriteAccess()) {
            return $response;
        }

        if ($this->isCsrfTokenValid('delete' . $motivation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($motivation);
            $entityManager->flush();
            $this->addFlash('success', 'Message supprime.');
        }

        return $this->redirectToRoute('app_motivation_index');
    }

    #[Route('/mood/{mood}', name: 'app_motivation_by_mood', methods: ['GET'])]
    public function byMood(
        string $mood,
        MotivationRepository $motivationRepository,
        MoodClickRepository $moodClickRepository,
        GoalRepository $goalRepository,
        Request $request,
        MotivationMessagesService $messagesService
    ): Response {
        if ($response = $this->denyAdminMotivationWriteAccess()) {
            return $response;
        }

        $moodClickRepository->addClick($mood, $request->getClientIp());
        $inspirationalMessage = $messagesService->getRandomMessage($mood);

        return $this->render('motivation/index.html.twig', [
            'motivations' => $motivationRepository->findByMood($mood),
            'goals' => $goalRepository->findAll(),
            'moods' => $motivationRepository->getAvailableMoods(),
            'emoji_map' => $this->getEmojiMap(),
            'current_mood' => $mood,
            'inspirational_message' => $inspirationalMessage,
            'all_messages' => $messagesService->getAllMessages(),
            'mood_click_stats' => $moodClickRepository->getMoodClickStats(),
        ]);
    }

    private function getEmojiMap(): array
    {
        return [
            'motivated' => '🚀',
            'happy' => '😊',
            'sad' => '😢',
            'stressed' => '😵',
            'tired' => '😴',
            'determined' => '😎',
            'optimistic' => '🌈',
        ];
    }
}
