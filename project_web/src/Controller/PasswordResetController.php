<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PasswordResetController extends AbstractController
{
    public function __construct(
        #[Autowire('%env(string:MAILER_FROM)%')]
        private readonly string $mailerFrom,
        #[Autowire('%env(string:RECAPTCHA_SITE_KEY)%')]
        private readonly string $recaptchaSiteKey,
        #[Autowire('%env(string:RECAPTCHA_SECRET_KEY)%')]
        private readonly string $recaptchaSecretKey
    ) {}

    #[Route('/forgot-password', name: 'app_forgot_password', methods: ['GET', 'POST'])]
    public function forgotPassword(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        HttpClientInterface $httpClient
    ): Response {
        if ($request->isMethod('POST')) {
            $emailInput = trim((string) $request->request->get('email'));
            $captchaToken = trim((string) $request->request->get('g-recaptcha-response'));

            if ($captchaToken === '' || !$this->isRecaptchaValid($httpClient, $captchaToken, $request->getClientIp())) {
                $this->addFlash('error', 'Verification CAPTCHA invalide, reessayez.');
                return $this->render('security/forgot_password.html.twig', [
                    'recaptcha_site_key' => $this->recaptchaSiteKey,
                ]);
            }

            if ($emailInput !== '') {
                $user = $userRepository->createQueryBuilder('u')
                    ->where('LOWER(u.email) = LOWER(:email)')
                    ->setParameter('email', $emailInput)
                    ->getQuery()
                    ->getOneOrNullResult();

                if ($user !== null) {
                    $token = bin2hex(random_bytes(32));
                    $expiresAt = new \DateTimeImmutable('+1 hour');

                    $user->setResetToken($token);
                    $user->setResetTokenExpiresAt($expiresAt);
                    $em->flush();

                    $resetUrl = $this->generateUrl(
                        'app_reset_password',
                        ['token' => $token],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    );

                    $message = (new Email())
                        ->from($this->mailerFrom)
                        ->to($user->getEmail() ?? $emailInput)
                        ->subject('Reinitialisation de votre mot de passe')
                        ->html($this->renderView('security/reset_password_email.html.twig', [
                            'user' => $user,
                            'reset_url' => $resetUrl,
                            'expires_at' => $expiresAt,
                        ]));

                    try {
                        $mailer->send($message);
                    } catch (TransportExceptionInterface) {
                        $this->addFlash('error', 'SMTP bloque sur ce reseau. Mode developpement active.');
                        $this->addFlash('success', 'Lien reset (dev): ' . $resetUrl);
                        return $this->redirectToRoute('app_forgot_password');
                    }
                }
            }

            $this->addFlash('success', 'Si cet email existe, un lien de reinitialisation a ete envoye.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgot_password.html.twig', [
            'recaptcha_site_key' => $this->recaptchaSiteKey,
        ]);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password', methods: ['GET', 'POST'])]
    public function resetPassword(
        string $token,
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $user = $userRepository->findOneBy(['reset_token' => $token]);

        if (
            $user === null ||
            $user->getResetTokenExpiresAt() === null ||
            $user->getResetTokenExpiresAt() < new \DateTimeImmutable()
        ) {
            $this->addFlash('error', 'Lien invalide ou expire.');
            return $this->redirectToRoute('app_forgot_password');
        }

        if ($request->isMethod('POST')) {
            $password = (string) $request->request->get('password');
            $confirmPassword = (string) $request->request->get('confirm_password');

            if (mb_strlen($password) < 8) {
                return $this->render('security/reset_password.html.twig', [
                    'token' => $token,
                    'error' => 'Le mot de passe doit contenir au moins 8 caracteres.',
                ]);
            }

            if ($password !== $confirmPassword) {
                return $this->render('security/reset_password.html.twig', [
                    'token' => $token,
                    'error' => 'Les mots de passe ne correspondent pas.',
                ]);
            }

            $user->setPassword($passwordHasher->hashPassword($user, $password));
            $user->setResetToken(null);
            $user->setResetTokenExpiresAt(null);
            $em->flush();

            $this->addFlash('success', 'Mot de passe mis a jour avec succes.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/reset_password.html.twig', [
            'token' => $token,
        ]);
    }

    private function isRecaptchaValid(HttpClientInterface $httpClient, string $token, ?string $ip): bool
    {
        if ($this->recaptchaSecretKey === '') {
            return false;
        }

        try {
            $response = $httpClient->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'body' => [
                    'secret' => $this->recaptchaSecretKey,
                    'response' => $token,
                    'remoteip' => $ip ?? '',
                ],
            ]);

            $data = $response->toArray(false);
            return (bool) ($data['success'] ?? false);
        } catch (\Throwable) {
            return false;
        }
    }
}
