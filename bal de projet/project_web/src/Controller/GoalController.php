<?php

namespace App\Controller;

use App\Entity\Goal;
use App\Form\GoalType;
use App\Repository\GoalRepository;
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

}
