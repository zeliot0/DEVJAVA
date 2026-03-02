<?php

namespace App\Controller;

use App\Entity\Execution;
use App\Form\ExecutionType;
use App\Repository\ExecutionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/execution')]
final class ExecutionController extends AbstractController
{
    #[Route(name: 'app_execution_index', methods: ['GET'])]
    public function index(ExecutionRepository $executionRepository): Response
    {
        return $this->render('execution/index.html.twig', [
            'executions' => $executionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_execution_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $execution = new Execution();
        $form = $this->createForm(ExecutionType::class, $execution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($execution);
            $entityManager->flush();

            return $this->redirectToRoute('app_execution_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('execution/new.html.twig', [
            'execution' => $execution,
            'form' => $form,
        ]);
    }

    #[Route('/{id_exe}', name: 'app_execution_show', methods: ['GET'])]
    public function show(Execution $execution): Response
    {
        return $this->render('execution/show.html.twig', [
            'execution' => $execution,
        ]);
    }

    #[Route('/{id_exe}/edit', name: 'app_execution_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Execution $execution, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExecutionType::class, $execution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_execution_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('execution/edit.html.twig', [
            'execution' => $execution,
            'form' => $form,
        ]);
    }

    #[Route('/{id_exe}', name: 'app_execution_delete', methods: ['POST'])]
    public function delete(Request $request, Execution $execution, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$execution->getId_exe(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($execution);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_execution_index', [], Response::HTTP_SEE_OTHER);
    }
}
