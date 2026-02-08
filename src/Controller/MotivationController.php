<?php

namespace App\Controller;

use App\Entity\Motivation;
use App\Form\MotivationType;
use App\Repository\MotivationRepository;
use App\Repository\GoalRepository;
use App\Service\MotivationMessagesService; // AJOUTER CETTE LIGNE
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/motivation')]
class MotivationController extends AbstractController
{
    #[Route('/', name: 'app_motivation_index', methods: ['GET'])]
    public function index(
        MotivationRepository $motivationRepository, 
        GoalRepository $goalRepository, 
        Request $request,
        MotivationMessagesService $messagesService // AJOUTER CE PARAMÈTRE
    ): Response
    {
        $currentMood = $request->query->get('mood');
        $inspirationalMessage = null;
        
        if ($currentMood) {
            // Récupère un message aléatoire pour l'humeur
            $inspirationalMessage = $messagesService->getRandomMessage($currentMood);
        }

        return $this->render('motivation/index.html.twig', [
            'motivations' => $motivationRepository->findAll(),
            'goals' => $goalRepository->findAll(),
            'moods' => $motivationRepository->getAvailableMoods(),
            'emoji_map' => $this->getEmojiMap(),
            'current_mood' => $currentMood,
            'inspirational_message' => $inspirationalMessage, // AJOUTER
            'all_messages' => $messagesService->getAllMessages(), // AJOUTER
        ]);
    }

    #[Route('/new', name: 'app_motivation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $motivation = new Motivation();
        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // L'URL de l'image est automatiquement sauvegardée via le formulaire
            
            $entityManager->persist($motivation);
            $entityManager->flush();

            $this->addFlash('success', 'Message créé!');
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
        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // PAS besoin de gérer l'upload - c'est juste une URL maintenant
            
            $entityManager->flush();

            $this->addFlash('success', 'Message modifié!');
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
        if ($this->isCsrfTokenValid('delete'.$motivation->getId(), $request->request->get('_token'))) {
            // PAS besoin de supprimer un fichier - c'est juste une URL
            
            $entityManager->remove($motivation);
            $entityManager->flush();
            
            $this->addFlash('success', 'Message supprimé!');
        }

        return $this->redirectToRoute('app_motivation_index');
    }

    #[Route('/mood/{mood}', name: 'app_motivation_by_mood', methods: ['GET'])]
    public function byMood(
        string $mood, 
        MotivationRepository $motivationRepository, 
        GoalRepository $goalRepository,
        MotivationMessagesService $messagesService // AJOUTER CE PARAMÈTRE
    ): Response
    {
        $inspirationalMessage = $messagesService->getRandomMessage($mood);
        
        return $this->render('motivation/index.html.twig', [
            'motivations' => $motivationRepository->findByMood($mood),
            'goals' => $goalRepository->findAll(),
            'moods' => $motivationRepository->getAvailableMoods(),
            'emoji_map' => $this->getEmojiMap(),
            'current_mood' => $mood,
            'inspirational_message' => $inspirationalMessage, // AJOUTER
            'all_messages' => $messagesService->getAllMessages(), // AJOUTER
        ]);
    }

    // Ajouter cette méthode privée dans le contrôleur
private function getEmojiMap(): array
{
    return [
        'motivated' => 'smile',
        'happy' => 'laughing',
        'sad' => 'slightly-frowning',
        'stressed' => 'expressionless',
        'tired' => 'sleepy',
        'determined' => 'sunglasses',
        'optimistic' => 'grin',
    ];
}
}