<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiKeyController extends AbstractController
{
    #[Route('/settings/api-keys', name: 'app_settings_api_keys', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('settings/api_keys.html.twig');
    }
}
