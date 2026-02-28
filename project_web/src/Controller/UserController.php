<?php

namespace App\Controller;

use App\Entity\RegistrationAttempt;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\EmailReputationService;
use App\Service\LocationService;
use App\Service\SecurityService;
use App\Service\AvatarService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserController extends AbstractController
{
    public function __construct(
        #[Autowire('%env(string:RECAPTCHA_SITE_KEY)%')]
        private readonly string $recaptchaSiteKey,
        #[Autowire('%env(string:RECAPTCHA_SECRET_KEY)%')]
        private readonly string $recaptchaSecretKey,
        #[Autowire('%env(string:MAILER_FROM)%')]
        private readonly string $mailerFrom
    ) {}

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
        UserPasswordHasherInterface $passwordHasher,
        HttpClientInterface $httpClient,
        EmailReputationService $emailReputationService,
        LocationService $locationService,
        SecurityService $securityService,
        AvatarService $avatarService,
        MailerInterface $mailer
    ): Response {
        if ($this->getUser()) {
            $this->addFlash('error', 'Vous etes deja connecte. Deconnectez-vous pour creer un nouveau compte.');
            return $this->redirectToRoute('app_landing');
        }

        if (!$request->isMethod('POST')) {
            return $this->redirectToRoute('app_login');
        }

        $errors = [];
        $nom = trim((string) $request->request->get('nom'));
        $email = trim((string) $request->request->get('email'));
        $plainPassword = (string) $request->request->get('password');
        $confirmPassword = (string) $request->request->get('confirm_password');
        $faceDescriptorRaw = (string) $request->request->get('face_descriptor', '');
        $profilePhoto = $request->files->get('profile_photo');
        $captchaToken = trim((string) $request->request->get('g-recaptcha-response'));
        $geoLat = $this->parseCoordinate($request->request->get('geo_lat'), -90, 90);
        $geoLng = $this->parseCoordinate($request->request->get('geo_lng'), -180, 180);

        if (!$this->isCsrfTokenValid('register', (string) $request->request->get('_csrf_token'))) {
            $errors['csrf'] = 'Session expiree, reessayez.';
        }

        if ($captchaToken === '') {
            $errors['recaptcha'] = 'Veuillez confirmer que vous n\'etes pas un robot.';
        } elseif (!$this->isRecaptchaValid($httpClient, $captchaToken, $request->getClientIp())) {
            $errors['recaptcha'] = 'Verification CAPTCHA invalide, reessayez.';
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
        } elseif (!$emailReputationService->isEmailSafe($email)) {
            $errors['email'] = 'Email invalide, risque ou temporaire.';
        }

        if ($plainPassword === '') {
            $errors['password'] = 'Mot de passe obligatoire';
        } elseif (mb_strlen($plainPassword) < 8) {
            $errors['password'] = 'Minimum 8 caracteres';
        } elseif ($this->calculatePasswordStrengthScore($plainPassword) < 40) {
            $errors['password'] = 'Ton mot de passe est faible. Choisis un mot de passe plus fort.';
        } elseif ($securityService->isPasswordCompromised($plainPassword)) {
            $errors['password'] = 'Ce mot de passe a ete compromis dans une fuite. Choisissez un autre mot de passe.';
        }

        if ($confirmPassword === '') {
            $errors['confirm_password'] = 'Confirmez votre mot de passe';
        } elseif ($plainPassword !== $confirmPassword) {
            $errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
        }

        $faceDescriptor = $this->parseFaceDescriptor($faceDescriptorRaw);
        if ($faceDescriptorRaw !== '' && $faceDescriptor === null) {
            $errors['face_descriptor'] = 'Capture visage invalide, recommencez.';
        }

        if ($profilePhoto !== null && !$profilePhoto instanceof UploadedFile) {
            $errors['profile_photo'] = 'Fichier photo invalide';
        }

        if ($profilePhoto instanceof UploadedFile) {
            if (!$profilePhoto->isValid()) {
                $errors['profile_photo'] = 'Erreur lors de l\'upload de la photo';
            } else {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($profilePhoto->getMimeType(), $allowedMimeTypes, true)) {
                    $errors['profile_photo'] = 'Photo invalide (JPG, PNG ou WEBP uniquement)';
                } elseif ($profilePhoto->getSize() > 2 * 1024 * 1024) {
                    $errors['profile_photo'] = 'Photo trop volumineuse (max 2MB)';
                }
            }
        }

        if (!empty($errors)) {
            if ($email !== '') {
                $ip = $this->resolveClientIp($request);
                $location = $locationService->getLocation($ip);
                $finalLat = $geoLat ?? ($location['latitude'] ?? null);
                $finalLng = $geoLng ?? ($location['longitude'] ?? null);
                $reason = (string) (
                    $errors['email']
                    ?? $errors['password']
                    ?? $errors['confirm_password']
                    ?? $errors['recaptcha']
                    ?? $errors['nom']
                    ?? $errors['profile_photo']
                    ?? 'Inscription refusee'
                );
                $attempt = new RegistrationAttempt();
                $attempt
                    ->setEmail($email)
                    ->setStatus('rejected')
                    ->setReason($reason)
                    ->setIpAddress($ip)
                    ->setCountry($location['country'] ?? 'Unknown')
                    ->setCity($location['city'] ?? 'Unknown')
                    ->setLatitude(is_numeric($finalLat) ? (float) $finalLat : null)
                    ->setLongitude(is_numeric($finalLng) ? (float) $finalLng : null)
                    ->setCreatedAt(new \DateTimeImmutable());

                $em->persist($attempt);
                $em->flush();
            }

            return $this->renderAuthPage([
                'errors' => $errors,
                'old_nom' => $nom,
                'old_email' => $email,
                'old_password' => $plainPassword,
                'old_confirm_password' => $confirmPassword,
                'show_signup' => true,
                'recaptcha_site_key' => $this->recaptchaSiteKey,
            ]);
        }

        $profilePhotoFilename = null;
        $targetDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';
        if ($profilePhoto instanceof UploadedFile) {
            if (!is_dir($targetDir) && !mkdir($targetDir, 0775, true) && !is_dir($targetDir)) {
                return $this->renderAuthPage([
                    'errors' => ['profile_photo' => 'Impossible de preparer le dossier de photo'],
                    'old_nom' => $nom,
                    'old_email' => $email,
                    'old_password' => $plainPassword,
                    'old_confirm_password' => $confirmPassword,
                    'show_signup' => true,
                    'recaptcha_site_key' => $this->recaptchaSiteKey,
                ]);
            }

            try {
                $profilePhotoFilename = sprintf(
                    '%s.%s',
                    bin2hex(random_bytes(16)),
                    $profilePhoto->guessExtension() ?: 'jpg'
                );
                $profilePhoto->move($targetDir, $profilePhotoFilename);
            } catch (\Throwable) {
                return $this->renderAuthPage([
                    'errors' => ['profile_photo' => 'Erreur lors de l\'upload de la photo'],
                    'old_nom' => $nom,
                    'old_email' => $email,
                    'old_password' => $plainPassword,
                    'old_confirm_password' => $confirmPassword,
                    'show_signup' => true,
                    'recaptcha_site_key' => $this->recaptchaSiteKey,
                ]);
            }
        }

        if ($profilePhotoFilename === null) {
            $profilePhotoFilename = $avatarService->generateAndStore($nom !== '' ? $nom : $email, $targetDir);
        }

        $user = new User();
        $verificationToken = bin2hex(random_bytes(32));
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
        $user->setRoles(['ROLE_USER']);
        $user->setProfilePhoto($profilePhotoFilename);
        $user->setIsVerified(false);
        $user->setVerificationToken($verificationToken);
        if ($faceDescriptor !== null) {
            $user->setFaceDescriptor($faceDescriptor);
            $user->setFaceEnabled(true);
        }

        $ip = $this->resolveClientIp($request);
        $location = $locationService->getLocation($ip);
        $finalLat = $geoLat ?? ($location['latitude'] ?? null);
        $finalLng = $geoLng ?? ($location['longitude'] ?? null);

        $acceptedAttempt = new RegistrationAttempt();
        $acceptedAttempt
            ->setEmail($email)
            ->setStatus('accepted')
            ->setReason('Inscription acceptee')
            ->setIpAddress($ip)
            ->setCountry($location['country'] ?? 'Unknown')
            ->setCity($location['city'] ?? 'Unknown')
            ->setLatitude(is_numeric($finalLat) ? (float) $finalLat : null)
            ->setLongitude(is_numeric($finalLng) ? (float) $finalLng : null)
            ->setCreatedAt(new \DateTimeImmutable());

        $em->persist($user);
        $em->persist($acceptedAttempt);
        $em->flush();

        $verifyUrl = $this->generateUrl(
            'app_verify_email',
            ['token' => $verificationToken],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $message = (new Email())
            ->from($this->mailerFrom)
            ->to($email)
            ->subject('Verification de votre compte NEXA')
            ->html($this->renderView('security/verify_email.html.twig', [
                'user' => $user,
                'verify_url' => $verifyUrl,
            ]));

        try {
            $mailer->send($message);
        } catch (\Throwable) {
            // Keep registration response neutral.
        }
        $this->addFlash('success', 'Inscription reussie. Verifiez votre email si un compte existe.');

        return $this->redirectToRoute('app_login');
    }

    #[Route('/verify-email/{token}', name: 'app_verify_email', methods: ['GET'])]
    public function verifyEmail(string $token, UserRepository $userRepository, EntityManagerInterface $em): Response
    {
        if ($token === '') {
            $this->addFlash('error', 'Lien de verification invalide.');
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->findOneBy(['verification_token' => $token]);
        if (!$user instanceof User) {
            $this->addFlash('error', 'Lien de verification invalide ou deja utilise.');
            return $this->redirectToRoute('app_login');
        }

        if ($user->isVerified()) {
            $this->addFlash('success', 'Votre compte est deja verifie. Connectez-vous.');
            return $this->redirectToRoute('app_login');
        }

        $user->setIsVerified(true);
        $user->setVerificationToken(null);
        $em->flush();

        $this->addFlash('success', 'Email verifie avec succes. Vous pouvez maintenant vous connecter.');
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

    #[Route('/user/{id}/toggle-block', name: 'app_user_toggle_block', methods: ['POST'])]
    public function toggleBlock(int $id, Request $request, UserRepository $repo, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $redirectUrl = $request->headers->get('referer') ?: $this->generateUrl('app_user_list');

        if (!$this->isCsrfTokenValid('toggle_block_user_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Action invalide.');
            return $this->redirect($redirectUrl);
        }

        $user = $repo->find($id);
        if (!$user instanceof User) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirect($redirectUrl);
        }

        $currentUser = $this->getUser();
        if ($currentUser instanceof User && $currentUser->getId() === $user->getId()) {
            $this->addFlash('error', 'Vous ne pouvez pas bloquer votre propre compte.');
            return $this->redirect($redirectUrl);
        }

        $user->setIsBlocked(!$user->isBlocked());
        $em->flush();

        $this->addFlash(
            'success',
            $user->isBlocked()
                ? sprintf('Compte %s bloque.', $user->getEmail())
                : sprintf('Compte %s debloque.', $user->getEmail())
        );

        return $this->redirect($redirectUrl);
    }

    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    public function profile(
        Request $request,
        EntityManagerInterface $em,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher,
        AvatarService $avatarService
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Utilisateur non authentifie.');
        }

        if ($request->isMethod('POST')) {
            $errors = [];

            if (!$this->isCsrfTokenValid('profile_update', (string) $request->request->get('_token'))) {
                $errors['_global'] = 'Session expiree, reessayez.';
            }

            $nom = trim((string) $request->request->get('nom', $user->getNom() ?? ''));
            $email = $user->getEmail() ?? '';
            $currentPassword = trim((string) $request->request->get('current_password', ''));
            $newPassword = trim((string) $request->request->get('new_password', ''));
            $confirmPassword = trim((string) $request->request->get('confirm_password', ''));
            $profilePhoto = $request->files->get('profile_photo');
            $removePhoto = $request->request->get('remove_photo') === '1';
            $generateComicAvatar = $request->request->get('generate_comic_avatar') === '1';

            if ($nom === '' || mb_strlen($nom) < 3) {
                $errors['nom'] = 'Le nom doit contenir au moins 3 caracteres.';
            }

            if ($profilePhoto !== null && !$profilePhoto instanceof UploadedFile) {
                $errors['profile_photo'] = 'Fichier photo invalide.';
            }

            if ($profilePhoto instanceof UploadedFile) {
                if (!$profilePhoto->isValid()) {
                    $errors['profile_photo'] = 'Erreur lors de l\'upload de la photo.';
                } else {
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                    if (!in_array($profilePhoto->getMimeType(), $allowedMimeTypes, true)) {
                        $errors['profile_photo'] = 'Photo invalide (JPG, PNG ou WEBP uniquement).';
                    } elseif ($profilePhoto->getSize() > 2 * 1024 * 1024) {
                        $errors['profile_photo'] = 'Photo trop volumineuse (max 2MB).';
                    }
                }
            }

            $changePassword = ($newPassword !== '' || $confirmPassword !== '');
            if ($changePassword) {
                if ($currentPassword === '') {
                    $errors['current_password'] = 'Entrez votre mot de passe actuel.';
                } elseif (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                    $errors['current_password'] = 'Mot de passe actuel incorrect.';
                }

                if ($newPassword === '') {
                    $errors['new_password'] = 'Entrez un nouveau mot de passe.';
                } elseif (mb_strlen($newPassword) < 8) {
                    $errors['new_password'] = 'Le nouveau mot de passe doit contenir au moins 8 caracteres.';
                }

                if ($confirmPassword === '') {
                    $errors['confirm_password'] = 'Confirmez le nouveau mot de passe.';
                } elseif ($newPassword !== '' && $newPassword !== $confirmPassword) {
                    $errors['confirm_password'] = 'La confirmation du mot de passe ne correspond pas.';
                }
            }

            if (!empty($errors)) {
                return $this->render('user/profile.html.twig', [
                    'user' => $user,
                    'errors' => $errors,
                    'form' => [
                        'nom' => $nom,
                        'email' => $email,
                    ],
                ]);
            }

            $user->setNom($nom);

            $targetDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';

            if ($removePhoto) {
                $oldPhoto = $user->getProfilePhoto();
                $user->setProfilePhoto(null);

                if ($oldPhoto !== null) {
                    $oldPhotoPath = $targetDir . '/' . $oldPhoto;
                    if (is_file($oldPhotoPath)) {
                        @unlink($oldPhotoPath);
                    }
                }
            }

            if ($generateComicAvatar) {
                $oldPhoto = $user->getProfilePhoto();
                $comicAvatar = $avatarService->generateAndStore($nom !== '' ? $nom : $email, $targetDir);
                if ($comicAvatar !== null) {
                    $user->setProfilePhoto($comicAvatar);
                    if ($oldPhoto !== null && $oldPhoto !== $comicAvatar) {
                        $oldPhotoPath = $targetDir . '/' . $oldPhoto;
                        if (is_file($oldPhotoPath)) {
                            @unlink($oldPhotoPath);
                        }
                    }
                } else {
                    $errors['profile_photo'] = 'Impossible de generer un avatar comique maintenant.';
                    return $this->render('user/profile.html.twig', [
                        'user' => $user,
                        'errors' => $errors,
                        'form' => [
                            'nom' => $nom,
                            'email' => $email,
                        ],
                    ]);
                }
            }

            if ($profilePhoto instanceof UploadedFile) {
                if (!is_dir($targetDir) && !mkdir($targetDir, 0775, true) && !is_dir($targetDir)) {
                    return $this->render('user/profile.html.twig', [
                        'user' => $user,
                        'errors' => ['profile_photo' => 'Impossible de preparer le dossier de photo.'],
                        'form' => [
                            'nom' => $nom,
                            'email' => $email,
                        ],
                    ]);
                }

                try {
                    $oldPhoto = $user->getProfilePhoto();
                    $newFilename = sprintf(
                        '%s.%s',
                        bin2hex(random_bytes(16)),
                        $profilePhoto->guessExtension() ?: 'jpg'
                    );
                    $profilePhoto->move($targetDir, $newFilename);
                    $user->setProfilePhoto($newFilename);

                    if ($oldPhoto !== null && $oldPhoto !== $newFilename) {
                        $oldPhotoPath = $targetDir . '/' . $oldPhoto;
                        if (is_file($oldPhotoPath)) {
                            @unlink($oldPhotoPath);
                        }
                    }
                } catch (\Throwable) {
                    return $this->render('user/profile.html.twig', [
                        'user' => $user,
                        'errors' => ['profile_photo' => 'Erreur lors de l\'upload de la photo.'],
                        'form' => [
                            'nom' => $nom,
                            'email' => $email,
                        ],
                    ]);
                }
            }

            if ($changePassword) {
                $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
            }

            $em->flush();
            $this->addFlash('success', $removePhoto ? 'Photo supprimee et profil mis a jour.' : 'Profil mis a jour avec succes.');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'errors' => [],
            'form' => null,
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

    private function renderAuthPage(array $params): Response
    {
        $response = $this->render('security/login.html.twig', $params);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
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

    private function parseCoordinate(mixed $value, float $min, float $max): ?float
    {
        if (!is_scalar($value)) {
            return null;
        }

        $raw = trim((string) $value);
        if ($raw === '' || !is_numeric($raw)) {
            return null;
        }

        $coordinate = (float) $raw;
        if ($coordinate < $min || $coordinate > $max) {
            return null;
        }

        return $coordinate;
    }

    private function calculatePasswordStrengthScore(string $password): int
    {
        $value = trim($password);
        if ($value === '') {
            return 0;
        }

        $score = 0;
        if (mb_strlen($value) >= 8) {
            $score += 30;
        }
        if (mb_strlen($value) >= 12) {
            $score += 10;
        }
        if (preg_match('/[a-z]/', $value)) {
            $score += 15;
        }
        if (preg_match('/[A-Z]/', $value)) {
            $score += 15;
        }
        if (preg_match('/[0-9]/', $value)) {
            $score += 15;
        }
        if (preg_match('/[^A-Za-z0-9]/', $value)) {
            $score += 15;
        }

        return min($score, 100);
    }

    /**
     * @return float[]|null
     */
    private function parseFaceDescriptor(string $raw): ?array
    {
        $value = trim($raw);
        if ($value === '') {
            return null;
        }

        $decoded = json_decode($value, true);
        if (!is_array($decoded) || count($decoded) !== 128) {
            return null;
        }

        $normalized = [];
        foreach ($decoded as $item) {
            if (!is_numeric($item)) {
                return null;
            }
            $normalized[] = (float) $item;
        }

        return $normalized;
    }
}
