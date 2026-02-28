<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\UserAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    public function __construct(
        #[Autowire('%env(string:RECAPTCHA_SITE_KEY)%')]
        private readonly string $recaptchaSiteKey,
        #[Autowire('%kernel.environment%')]
        private readonly string $appEnv
    ) {}

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_landing');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $response = $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'recaptcha_site_key' => $this->recaptchaSiteKey,
            'show_dev_bypass' => $this->appEnv === 'dev',
        ]);

        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }

    #[Route('/dev/quick-access', name: 'app_dev_quick_access', methods: ['POST'])]
    public function devQuickAccess(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        UserAuthenticatorInterface $userAuthenticator,
        UserAuthenticator $authenticator
    ): Response {
        if ($this->appEnv !== 'dev') {
            throw $this->createNotFoundException();
        }

        if (!$this->isCsrfTokenValid('dev_quick_access', (string) $request->request->get('_dev_token'))) {
            $this->addFlash('error', 'Action invalide.');
            return $this->redirectToRoute('app_login');
        }

        $requestedTarget = trim((string) $request->request->get('_dev_target', ''));
        $normalizedTarget = strtolower($requestedTarget);

        $users = $userRepository->findBy([], ['id_user' => 'ASC'], 50);
        $selectedUser = null;

        if ($normalizedTarget !== '') {
            foreach ($users as $candidate) {
                if ($candidate->isBlocked()) {
                    continue;
                }

                $candidateEmail = strtolower((string) $candidate->getEmail());
                $candidateNom = strtolower((string) $candidate->getNom());

                if (
                    $candidateEmail === $normalizedTarget
                    || $candidateNom === $normalizedTarget
                    || str_contains($candidateEmail, $normalizedTarget)
                    || str_contains($candidateNom, $normalizedTarget)
                ) {
                    $selectedUser = $candidate;
                    break;
                }
            }
        }

        if (!$selectedUser && $normalizedTarget === '') {
            foreach ($users as $candidate) {
                if ($candidate->isBlocked()) {
                    continue;
                }
                if (in_array('ROLE_ADMIN', $candidate->getRoles(), true)) {
                    $selectedUser = $candidate;
                    break;
                }
            }
        }

        if (!$selectedUser && $normalizedTarget === '') {
            foreach ($users as $candidate) {
                if (!$candidate->isBlocked()) {
                    $selectedUser = $candidate;
                    break;
                }
            }
        }

        if (!$selectedUser && $normalizedTarget === '' && isset($users[0])) {
            $selectedUser = $users[0];
        }

        if (!$selectedUser) {
            $nom = $normalizedTarget !== '' ? ucfirst($normalizedTarget) : 'Dev Access';
            $emailPrefix = $normalizedTarget !== '' ? $normalizedTarget : 'dev-access';
            $emailPrefix = preg_replace('/[^a-z0-9._-]/', '', $emailPrefix) ?? '';
            if ($emailPrefix === '') {
                $emailPrefix = 'dev-user';
            }
            $email = $emailPrefix . '@nexa.local';

            $existingUser = $userRepository->findOneBy(['email' => $email]);
            if ($existingUser instanceof User) {
                $selectedUser = $existingUser;
            } else {
                $selectedUser = new User();
                $selectedUser->setNom($nom);
                $selectedUser->setEmail($email);
                $selectedUser->setRoles($normalizedTarget !== '' ? ['ROLE_USER'] : ['ROLE_ADMIN']);
                $selectedUser->setIsVerified(true);
                $selectedUser->setIsBlocked(false);
                $selectedUser->setVerificationToken(null);
                $selectedUser->setPassword($passwordHasher->hashPassword($selectedUser, bin2hex(random_bytes(16))));

                $entityManager->persist($selectedUser);
                $entityManager->flush();
            }
        }

        $userAuthenticator->authenticateUser($selectedUser, $authenticator, $request);
        $this->addFlash(
            'success',
            'Acces rapide dev active pour ' . ((string) ($selectedUser->getNom() ?? $selectedUser->getEmail()))
        );

        if (in_array('ROLE_ADMIN', $selectedUser->getRoles(), true)) {
            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->redirectToRoute('app_landing');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method is intercepted by the firewall.');
    }
}
