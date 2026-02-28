<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AiController extends AbstractController
{
    #[Route('/nexa-ai', name: 'app_ai_hub', methods: ['GET'])]
    public function index(\Doctrine\ORM\EntityManagerInterface $em): Response
    {
        $recentTasks = $em->getRepository(\App\Entity\Task::class)->findBy([], ['createAt' => 'DESC'], 3);
        $recentGoals = $em->getRepository(\App\Entity\Goal::class)->findBy([], ['idGoa' => 'DESC'], 3);
        $recentProds = $em->getRepository(\App\Entity\Produit::class)->findBy([], ['id_p' => 'DESC'], 3);

        return $this->render('ai/hub.html.twig', [
            'recentTasks' => $recentTasks,
            'recentGoals' => $recentGoals,
            'recentProds' => $recentProds
        ]);
    }
}
