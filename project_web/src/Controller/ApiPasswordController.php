<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiPasswordController extends AbstractController
{
    #[Route('/api/password/generate', name: 'api_password_generate', methods: ['GET'])]
    public function generate(): JsonResponse
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $password = substr(str_shuffle($letters . $numbers), 0, 10);

        return new JsonResponse([
            'password' => $password
        ]);
    }
}
