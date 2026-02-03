<?php

namespace App\Controller;

use App\Entity\Milestones;
use App\Form\MilestonesType;
use App\Repository\MilestonesRepository;
use App\Repository\GoalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/milestones')]
class MileStonesController extends AbstractController
{
    #[Route('/', name: 'app_milestones_index', methods: ['GET'])]
    public function index(MilestonesRepository $milestonesRepository): Response
    {
        return $this->render('milestones/index.html.twig', [
            'milestones' => $milestonesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_milestones_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $milestone = new Milestones();
        $form = $this->createForm(MilestonesType::class, $milestone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($milestone);
            $entityManager->flush();
            $this->addFlash('success', 'Jalon créé avec succès.');
            return $this->redirectToRoute('app_milestones_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('milestones/new.html.twig', [
            'milestone' => $milestone,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_milestones_show', methods: ['GET'])]
    public function show(int $id, MilestonesRepository $milestonesRepository): Response
    {
        $milestone = $milestonesRepository->find($id);
        
        if (!$milestone) {
            throw $this->createNotFoundException('Jalon non trouvé');
        }
        
        return $this->render('milestones/show.html.twig', [
            'milestone' => $milestone,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_milestones_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $id, MilestonesRepository $milestonesRepository, EntityManagerInterface $entityManager): Response
    {
        $milestone = $milestonesRepository->find($id);
        
        if (!$milestone) {
            throw $this->createNotFoundException('Jalon non trouvé');
        }
        
        $form = $this->createForm(MilestonesType::class, $milestone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Jalon modifié avec succès.');
            return $this->redirectToRoute('app_milestones_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('milestones/edit.html.twig', [
            'milestone' => $milestone,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_milestones_delete', methods: ['POST'])]
    public function delete(Request $request, int $id, MilestonesRepository $milestonesRepository, EntityManagerInterface $entityManager): Response
    {
        $milestone = $milestonesRepository->find($id);
        
        if (!$milestone) {
            throw $this->createNotFoundException('Jalon non trouvé');
        }
        
        if ($this->isCsrfTokenValid('delete'.$milestone->getId(), $request->request->get('_token'))) {
            $entityManager->remove($milestone);
            $entityManager->flush();
            $this->addFlash('success', 'Jalon supprimé avec succès.');
        }

        return $this->redirectToRoute('app_milestones_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/complete', name: 'app_milestones_complete', methods: ['POST'])]
    public function complete(Request $request, int $id, MilestonesRepository $milestonesRepository, EntityManagerInterface $entityManager): Response
    {
        $milestone = $milestonesRepository->find($id);
        
        if (!$milestone) {
            throw $this->createNotFoundException('Jalon non trouvé');
        }
        
        if ($this->isCsrfTokenValid('complete'.$milestone->getId(), $request->request->get('_token'))) {
            $milestone->setCompletedDate(new \DateTimeImmutable());
            $entityManager->flush();
            $this->addFlash('success', 'Jalon marqué comme terminé.');
        }

        return $this->redirectToRoute('app_milestones_index', [], Response::HTTP_SEE_OTHER);
    }
}