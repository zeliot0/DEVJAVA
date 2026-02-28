<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\UserAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

#[Route('/api/face')]
class FaceAuthController extends AbstractController
{
    #[Route('/save', name: 'api_face_save', methods: ['POST'])]
    public function save(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json([
                'ok' => false,
                'error' => 'Utilisateur non connecte.',
            ], 401);
        }

        $descriptor = $this->extractDescriptor($request);
        if ($descriptor === null) {
            return $this->json([
                'ok' => false,
                'error' => 'Descriptor visage invalide.',
            ], 422);
        }

        $user->setFaceDescriptor($descriptor);
        $user->setFaceEnabled(true);
        $em->flush();

        return $this->json([
            'ok' => true,
            'message' => 'Visage enregistre avec succes.',
        ]);
    }

    #[Route('/delete', name: 'api_face_delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json([
                'ok' => false,
                'error' => 'Utilisateur non connecte.',
            ], 401);
        }

        $user->setFaceDescriptor(null);
        $user->setFaceEnabled(false);
        $em->flush();

        return $this->json([
            'ok' => true,
            'message' => 'Reconnaissance faciale supprimee.',
        ]);
    }

    #[Route('/login', name: 'api_face_login', methods: ['POST'])]
    public function login(
        Request $request,
        UserRepository $userRepository,
        UserAuthenticatorInterface $userAuthenticator,
        UserAuthenticator $authenticator,
        UrlGeneratorInterface $urlGenerator
    ): JsonResponse {
        $descriptor = $this->extractDescriptor($request);
        if ($descriptor === null) {
            return $this->json([
                'ok' => false,
                'error' => 'Aucun visage valide detecte.',
            ], 422);
        }

        $bestUser = null;
        $bestDistance = 999.0;
        foreach ($userRepository->findFaceEnabledUsers() as $candidate) {
            if (!$candidate instanceof User || $candidate->isBlocked() || !$candidate->isVerified()) {
                continue;
            }

            $savedDescriptor = $candidate->getFaceDescriptor();
            if (!is_array($savedDescriptor) || count($savedDescriptor) !== 128) {
                continue;
            }

            $distance = $this->compareDescriptors($savedDescriptor, $descriptor);
            if ($distance < $bestDistance) {
                $bestDistance = $distance;
                $bestUser = $candidate;
            }
        }

        if (!$bestUser instanceof User || $bestDistance > 0.52) {
            return $this->json([
                'ok' => false,
                'error' => 'Visage non reconnu. Reessayez.',
                'distance' => round($bestDistance, 4),
            ], 401);
        }

        $userAuthenticator->authenticateUser($bestUser, $authenticator, $request);

        $redirectUrl = in_array('ROLE_ADMIN', $bestUser->getRoles(), true)
            ? $urlGenerator->generate('admin_dashboard')
            : $urlGenerator->generate('app_landing');

        return $this->json([
            'ok' => true,
            'message' => 'Connexion faciale reussie.',
            'redirect_url' => $redirectUrl,
            'distance' => round($bestDistance, 4),
        ]);
    }

    /**
     * @return float[]|null
     */
    private function extractDescriptor(Request $request): ?array
    {
        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload) || !isset($payload['descriptor']) || !is_array($payload['descriptor'])) {
            return null;
        }

        $descriptor = array_values($payload['descriptor']);
        if (count($descriptor) !== 128) {
            return null;
        }

        $normalized = [];
        foreach ($descriptor as $value) {
            if (!is_numeric($value)) {
                return null;
            }
            $normalized[] = (float) $value;
        }

        return $normalized;
    }

    /**
     * @param float[] $saved
     * @param float[] $incoming
     */
    private function compareDescriptors(array $saved, array $incoming): float
    {
        $sum = 0.0;
        for ($i = 0; $i < 128; $i++) {
            $delta = ($saved[$i] ?? 0.0) - ($incoming[$i] ?? 0.0);
            $sum += $delta * $delta;
        }

        return sqrt($sum);
    }
}

