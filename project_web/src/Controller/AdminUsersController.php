<?php

namespace App\Controller;

use App\Repository\RegistrationAttemptRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminUsersController extends AbstractController
{
    #[Route('/admin/users', name: 'admin_users')]
    public function index(Request $request, UserRepository $userRepo, RegistrationAttemptRepository $attemptRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $search = trim((string) $request->query->get('q', ''));
        $sort = (string) $request->query->get('sort', 'newest');
        $allowedSorts = ['newest', 'email_asc', 'name_asc', 'admin_first'];

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'newest';
        }

        $users = $userRepo->findForAdminList($search, $sort);
        $emails = array_map(
            static fn ($user) => mb_strtolower((string) $user->getEmail()),
            $users
        );

        return $this->render('admin/users.html.twig', [
            'users' => $users,
            'latest_attempts_by_email' => $attemptRepository->findLatestByEmails($emails),
            'search' => $search,
            'sort' => $sort,
        ]);
    }
}
