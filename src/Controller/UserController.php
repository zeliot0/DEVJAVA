<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user_list')]
    public function list(Request $request, UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $search = trim((string) $request->query->get('q', ''));
        $sort = (string) $request->query->get('sort', 'newest');
        $allowedSorts = ['newest', 'email_asc', 'name_asc', 'admin_first'];

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'newest';
        }

        return $this->render('admin/users.html.twig', [
            'users' => $userRepository->findForAdminList($search, $sort),
            'search' => $search,
            'sort' => $sort,
        ]);
    }

    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_landing');
        }

        if (!$request->isMethod('POST')) {
            return $this->redirectToRoute('app_login');
        }

        $errors = [];
        $nom = trim((string) $request->request->get('nom'));
        $email = trim((string) $request->request->get('email'));
        $plainPassword = (string) $request->request->get('password');

        if (!$this->isCsrfTokenValid('register', (string) $request->request->get('_csrf_token'))) {
            $errors['csrf'] = 'Session expiree, reessayez.';
        }

        if ($nom === '') {
            $errors['nom'] = 'Le nom est obligatoire';
        } elseif (mb_strlen($nom) < 3) {
            $errors['nom'] = 'Minimum 3 caracteres';
        }

        if ($email === '') {
            $errors['email'] = 'Email obligatoire';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email invalide';
        } elseif ($em->getRepository(User::class)->findOneBy(['email' => $email])) {
            $errors['email'] = 'Email deja utilise';
        }

        if ($plainPassword === '') {
            $errors['password'] = 'Mot de passe obligatoire';
        } elseif (mb_strlen($plainPassword) < 8) {
            $errors['password'] = 'Minimum 8 caracteres';
        }

        if (!empty($errors)) {
            return $this->render('security/login.html.twig', [
                'errors' => $errors,
                'old_nom' => $nom,
                'old_email' => $email,
            ]);
        }

        $user = new User();
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
        $user->setRoles(['ROLE_USER']);

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'Compte cree avec succes');

        return $this->redirectToRoute('app_login');
    }

    #[Route('/user/{id}', name: 'app_user_show')]
    public function show(int $id, UserRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $repo->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur introuvable');
        }

        return $this->render('admin/user_show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    public function profile(
        Request $request,
        EntityManagerInterface $em,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Utilisateur non authentifie.');
        }

        if ($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('profile_update', (string) $request->request->get('_token'))) {
                $this->addFlash('error', 'Session expiree, reessayez.');
                return $this->redirectToRoute('app_profile');
            }

            $nom = trim((string) $request->request->get('nom'));
            $email = trim((string) $request->request->get('email'));
            $currentPassword = (string) $request->request->get('current_password');
            $newPassword = (string) $request->request->get('new_password');
            $confirmPassword = (string) $request->request->get('confirm_password');

            if ($nom === '' || mb_strlen($nom) < 3) {
                $this->addFlash('error', 'Le nom doit contenir au moins 3 caracteres.');
                return $this->redirectToRoute('app_profile');
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addFlash('error', 'Email invalide.');
                return $this->redirectToRoute('app_profile');
            }

            $existing = $userRepository->findOneBy(['email' => $email]);
            if ($existing instanceof User && $existing->getId() !== $user->getId()) {
                $this->addFlash('error', 'Cet email est deja utilise.');
                return $this->redirectToRoute('app_profile');
            }

            $user->setNom($nom);
            $user->setEmail($email);

            if ($newPassword !== '' || $confirmPassword !== '' || $currentPassword !== '') {
                if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                    $this->addFlash('error', 'Mot de passe actuel incorrect.');
                    return $this->redirectToRoute('app_profile');
                }
                if (mb_strlen($newPassword) < 8) {
                    $this->addFlash('error', 'Le nouveau mot de passe doit contenir au moins 8 caracteres.');
                    return $this->redirectToRoute('app_profile');
                }
                if ($newPassword !== $confirmPassword) {
                    $this->addFlash('error', 'La confirmation du mot de passe ne correspond pas.');
                    return $this->redirectToRoute('app_profile');
                }

                $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
            }

            $em->flush();
            $this->addFlash('success', 'Profil mis a jour avec succes.');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('user/profile.html.twig', [
            'user' => $user,
        ]);
    }
}
