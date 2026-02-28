<?php

namespace App\Controller;

use App\Entity\PhoenixWisdom;
use App\Form\PhoenixWisdomType;
use App\Repository\PhoenixWisdomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/phoenix/wisdom')]
final class PhoenixWisdomController extends AbstractController
{
    #[Route(name: 'app_phoenix_wisdom_index', methods: ['GET'])]
    public function index(PhoenixWisdomRepository $phoenixWisdomRepository): Response
    {
        return $this->render('phoenix_wisdom/index.html.twig', [
            'phoenix_wisdoms' => $phoenixWisdomRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_phoenix_wisdom_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $phoenixWisdom = new PhoenixWisdom();
        $form = $this->createForm(PhoenixWisdomType::class, $phoenixWisdom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($phoenixWisdom);
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_wisdom_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_wisdom/new.html.twig', [
            'phoenix_wisdom' => $phoenixWisdom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_wisdom_show', methods: ['GET'])]
    public function show(PhoenixWisdom $phoenixWisdom): Response
    {
        return $this->render('phoenix_wisdom/show.html.twig', [
            'phoenix_wisdom' => $phoenixWisdom,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_phoenix_wisdom_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhoenixWisdom $phoenixWisdom, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PhoenixWisdomType::class, $phoenixWisdom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_wisdom_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_wisdom/edit.html.twig', [
            'phoenix_wisdom' => $phoenixWisdom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_wisdom_delete', methods: ['POST'])]
    public function delete(Request $request, PhoenixWisdom $phoenixWisdom, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$phoenixWisdom->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($phoenixWisdom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_phoenix_wisdom_index', [], Response::HTTP_SEE_OTHER);
    }
}
