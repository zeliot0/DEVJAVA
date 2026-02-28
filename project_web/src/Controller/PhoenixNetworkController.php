<?php

namespace App\Controller;

use App\Entity\PhoenixNetwork;
use App\Form\PhoenixNetworkType;
use App\Entity\PhoenixGoal;
use App\Repository\PhoenixNetworkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/phoenix/network')]
final class PhoenixNetworkController extends AbstractController
{
    #[Route(name: 'app_phoenix_network_index', methods: ['GET'])]
    public function index(PhoenixNetworkRepository $phoenixNetworkRepository): Response
    {
        return $this->render('phoenix_network/index.html.twig', [
            'phoenix_networks' => $phoenixNetworkRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_phoenix_network_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $phoenixNetwork = new PhoenixNetwork();

        // allow pre-selecting a shared goal via query parameter
        $sharedGoalId = $request->query->get('sharedGoal');
        if ($sharedGoalId) {
            $goal = $entityManager->getRepository(PhoenixGoal::class)->find($sharedGoalId);
            if ($goal) {
                $phoenixNetwork->setSharedGoal($goal);
            }
        }

        $form = $this->createForm(PhoenixNetworkType::class, $phoenixNetwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($phoenixNetwork);
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_network/new.html.twig', [
            'phoenix_network' => $phoenixNetwork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_network_show', methods: ['GET'])]
    public function show(PhoenixNetwork $phoenixNetwork): Response
    {
        return $this->render('phoenix_network/show.html.twig', [
            'phoenix_network' => $phoenixNetwork,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_phoenix_network_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhoenixNetwork $phoenixNetwork, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PhoenixNetworkType::class, $phoenixNetwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_phoenix_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('phoenix_network/edit.html.twig', [
            'phoenix_network' => $phoenixNetwork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_phoenix_network_delete', methods: ['POST'])]
    public function delete(Request $request, PhoenixNetwork $phoenixNetwork, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$phoenixNetwork->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($phoenixNetwork);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_phoenix_network_index', [], Response::HTTP_SEE_OTHER);
    }
}
