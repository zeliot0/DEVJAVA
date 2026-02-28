<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;

class GoogleAuthenticator extends OAuth2Authenticator
{
    public function __construct(
        private readonly ClientRegistry $clientRegistry,
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {}

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        $client = $this->clientRegistry->getClient('google_main');

        try {
            $accessToken = $this->fetchAccessToken($client);
            $googleUser = $client->fetchUserFromToken($accessToken);
        } catch (IdentityProviderException|\Throwable) {
            throw new CustomUserMessageAuthenticationException('Connexion Google echouee. Reessayez.');
        }

        $email = (string) ($googleUser->getEmail() ?? '');
        if ($email === '') {
            throw new CustomUserMessageAuthenticationException('Google n a pas fourni d email.');
        }

        $displayName = trim((string) ($googleUser->getName() ?? ''));
        if ($displayName === '') {
            $displayName = explode('@', $email)[0] ?? 'Utilisateur Google';
        }

        return new SelfValidatingPassport(new UserBadge($email, function () use ($email, $displayName): User {
            $user = $this->userRepository->findOneBy(['email' => strtolower($email)]);

            if ($user instanceof User) {
                if ($user->isBlocked()) {
                    throw new CustomUserMessageAuthenticationException('Votre compte est bloque.');
                }

                if (!$user->isVerified()) {
                    $user->setIsVerified(true);
                }

                if (($user->getNom() ?? '') === '') {
                    $user->setNom(mb_substr($displayName, 0, 100));
                }

                $this->entityManager->flush();
                return $user;
            }

            $newUser = new User();
            $newUser->setEmail(strtolower($email));
            $newUser->setNom(mb_substr($displayName, 0, 100));
            $newUser->setRoles(['ROLE_USER']);
            $newUser->setIsVerified(true);
            $newUser->setPassword(
                $this->passwordHasher->hashPassword($newUser, bin2hex(random_bytes(24)))
            );

            $this->entityManager->persist($newUser);
            $this->entityManager->flush();

            return $newUser;
        }));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        if ($user instanceof User && in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return new RedirectResponse($this->urlGenerator->generate('admin_dashboard'));
        }

        return new RedirectResponse($this->urlGenerator->generate('app_landing'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $session = $request->getSession();
        if ($session !== null) {
            $session->set(SecurityRequestAttributes::AUTHENTICATION_ERROR, $exception);
            $session->getFlashBag()->add('error', $exception->getMessageKey());
        }

        return new RedirectResponse($this->urlGenerator->generate('app_login'));
    }

    public function start(Request $request, ?AuthenticationException $authException = null): Response
    {
        return new RedirectResponse($this->urlGenerator->generate('app_login'));
    }
}
