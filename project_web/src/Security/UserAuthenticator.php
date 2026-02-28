<?php

namespace App\Security;

use App\Entity\RegistrationAttempt;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\LocationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private UserRepository $userRepository,
        private EntityManagerInterface $entityManager,
        private LocationService $locationService,
        private MailerInterface $mailer,
        #[Autowire('%env(string:MAILER_FROM)%')]
        private readonly string $mailerFrom,
        #[Autowire('%kernel.environment%')]
        private readonly string $appEnv
    ) {}

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(
            SecurityRequestAttributes::LAST_USERNAME,
            $email
        );

        return new Passport(
            new UserBadge($email, function (string $userIdentifier) use ($request) {
                $user = $this->userRepository->findOneBy(['email' => strtolower(trim($userIdentifier))]);
                if ($user === null) {
                    throw new CustomUserMessageAuthenticationException('Identifiants invalides.');
                }

                if ($user->isBlocked()) {
                    throw new CustomUserMessageAuthenticationException('Votre compte est bloque. Contactez l\'administrateur.');
                }

                if (!$user->isVerified()) {
                    $emailSent = $this->sendVerificationEmail($user, $request);

                    if ($this->appEnv === 'dev') {
                        $verifyUrl = $this->urlGenerator->generate(
                            'app_verify_email',
                            ['token' => (string) $user->getVerificationToken()],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        );
                        $request->getSession()->getFlashBag()->add('success', 'Lien verification (dev): ' . $verifyUrl);
                    }

                    if ($emailSent) {
                        throw new CustomUserMessageAuthenticationException('Compte non verifie. Un email de verification vient d etre envoye.');
                    }

                    throw new CustomUserMessageAuthenticationException('Compte non verifie. Impossible d envoyer l email de verification pour le moment.');
                }

                return $user;
            }),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge(
                    'authenticate',
                    $request->request->get('_csrf_token')
                ),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(
        Request $request,
        TokenInterface $token,
        string $firewallName
    ): RedirectResponse {
        $user = $token->getUser();

        if ($user instanceof User) {
            try {
                $ip = $this->resolveClientIp($request);
                $location = $this->locationService->getLocation($ip);

                $attempt = new RegistrationAttempt();
                $attempt
                    ->setEmail($user->getEmail() ?? '')
                    ->setStatus('accepted')
                    ->setReason('Connexion email')
                    ->setIpAddress($ip)
                    ->setCountry($location['country'] ?? 'Unknown')
                    ->setCity($location['city'] ?? 'Unknown')
                    ->setLatitude(isset($location['latitude']) && is_numeric($location['latitude']) ? (float) $location['latitude'] : null)
                    ->setLongitude(isset($location['longitude']) && is_numeric($location['longitude']) ? (float) $location['longitude'] : null)
                    ->setCreatedAt(new \DateTimeImmutable());

                $this->entityManager->persist($attempt);
                $this->entityManager->flush();
            } catch (\Throwable) {
                // Do not block login if audit log cannot be written.
            }
        }

        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        if ($user instanceof User && in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('admin_dashboard')
            );
        }

        return new RedirectResponse(
            $this->urlGenerator->generate('app_landing')
        );
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

    private function resolveClientIp(Request $request): ?string
    {
        $forwardedFor = $request->headers->get('X-Forwarded-For');
        if (is_string($forwardedFor) && $forwardedFor !== '') {
            $parts = array_map('trim', explode(',', $forwardedFor));
            foreach ($parts as $candidateIp) {
                if (filter_var($candidateIp, FILTER_VALIDATE_IP)) {
                    return $candidateIp;
                }
            }
        }

        $realIp = $request->headers->get('X-Real-IP');
        if (is_string($realIp) && filter_var($realIp, FILTER_VALIDATE_IP)) {
            return $realIp;
        }

        return $request->getClientIp();
    }

    private function sendVerificationEmail(User $user, Request $request): bool
    {
        $email = trim((string) $user->getEmail());
        if ($email === '') {
            return false;
        }

        $session = $request->getSession();
        $throttleKey = 'verify_email_last_sent_' . md5(strtolower($email));
        $lastSentAt = (int) $session->get($throttleKey, 0);
        if ($lastSentAt > 0 && (time() - $lastSentAt) < 60) {
            return true;
        }

        if ($user->getVerificationToken() === null || $user->getVerificationToken() === '') {
            try {
                $user->setVerificationToken(bin2hex(random_bytes(32)));
                $this->entityManager->flush();
            } catch (\Throwable) {
                return false;
            }
        }

        $verifyUrl = $this->urlGenerator->generate(
            'app_verify_email',
            ['token' => (string) $user->getVerificationToken()],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $userName = htmlspecialchars((string) ($user->getNom() ?? ''), ENT_QUOTES, 'UTF-8');
        $safeUrl = htmlspecialchars($verifyUrl, ENT_QUOTES, 'UTF-8');

        $message = (new Email())
            ->from($this->mailerFrom)
            ->to($email)
            ->subject('Verification de votre compte NEXA')
            ->html(
                '<p>Bonjour ' . $userName . ',</p>'
                . '<p>Veuillez verifier votre compte NEXA en cliquant sur le lien suivant:</p>'
                . '<p><a href="' . $safeUrl . '">' . $safeUrl . '</a></p>'
            );

        try {
            $this->mailer->send($message);
            $session->set($throttleKey, time());
            return true;
        } catch (\Throwable) {
            return false;
        }
    }
}
