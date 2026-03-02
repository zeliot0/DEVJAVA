<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_public_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/app', name: 'app_landing')]
    public function landing(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('home/landing.html.twig');
    }
}
