<?php

namespace App\Controller;

use App\Entity\Goal;
use App\Form\GoalType;
use App\Service\Quotes;
use App\Repository\GoalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/goal')]
// src/Controller/GoalController.php

class GoalController extends AbstractController
{
    #[Route('/', name: 'app_goal_index', methods: ['GET'])]
    public function index(
        GoalRepository $goalRepository,
        Quotes $quotesService  // Changez le nom du paramètre
    ): Response
    {
        $quotes = $quotesService->getDailyQuote();  // Appel de la méthode
        
        return $this->render('goal/index.html.twig', [
            'goals' => $goalRepository->findAll(),
            'frenchQuote' => $quotes['french'],
            'quranQuote' => $quotes['quran']
        ]);
    }
    

    #[Route('/new', name: 'app_goal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $goal = new Goal();
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($goal);
            $entityManager->flush();
            $this->addFlash('success', 'Objectif créé avec succès.');
            return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('goal/new.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    #[Route('/{id_g}', name: 'app_goal_show', methods: ['GET'])]
    public function show(int $id_g, GoalRepository $goalRepository): Response
    {
        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }
        
        return $this->render('goal/show.html.twig', [
            'goal' => $goal,
        ]);
    }

    #[Route('/{id_g}/edit', name: 'app_goal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $id_g, GoalRepository $goalRepository, EntityManagerInterface $entityManager): Response
    {
        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }
        
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Objectif modifié avec succès.');
            return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('goal/edit.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    #[Route('/{id_g}', name: 'app_goal_delete', methods: ['POST'])]
    public function delete(Request $request, int $id_g, GoalRepository $goalRepository, EntityManagerInterface $entityManager): Response
    {
        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }
        
        if ($this->isCsrfTokenValid('delete'.$goal->getId(), $request->request->get('_token'))) {
            $entityManager->remove($goal);
            $entityManager->flush();
            $this->addFlash('success', 'Objectif supprimé avec succès.');
        }

        return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id_g}/archive', name: 'app_goal_archive', methods: ['POST'])]
    public function archive(Request $request, int $id_g, GoalRepository $goalRepository, EntityManagerInterface $entityManager): Response
    {
        $goal = $goalRepository->find($id_g);
        
        if (!$goal) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }
        
        if ($this->isCsrfTokenValid('archive'.$goal->getId(), $request->request->get('_token'))) {
            $goal->setStatusGoa('ARCHIVÉ');
            $entityManager->flush();
            $this->addFlash('success', 'Objectif archivé avec succès.');
        }

        return $this->redirectToRoute('app_goal_index', [], Response::HTTP_SEE_OTHER);
    }
}