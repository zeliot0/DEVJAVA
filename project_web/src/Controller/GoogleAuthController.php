<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class GoogleAuthController extends AbstractController
{
    public function __construct(
        private readonly ClientRegistry $clientRegistry
    ) {}

    #[Route('/connect/google', name: 'connect_google_start')]
    public function connect(): RedirectResponse
    {
        try {
            return $this->clientRegistry
                ->getClient('google_main')
                ->redirect(['email', 'profile'], []);
        } catch (\Throwable) {
            $this->addFlash('error', 'Connexion Google indisponible. Verifiez la configuration OAuth2.');
            return $this->redirectToRoute('app_login');
        }
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheck(): RedirectResponse
    {
        return $this->redirectToRoute('app_login');
    }
}
