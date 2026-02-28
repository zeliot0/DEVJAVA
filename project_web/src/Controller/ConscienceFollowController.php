<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Entity\ThemeFollow;
use App\Entity\User;
use App\Repository\ThemeFollowRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceFollowController extends AbstractController
{
    #[Route('/conscience/theme/{id}/follow', name: 'app_conscience_theme_follow', methods: ['POST'])]
    public function toggle(
        Theme $theme,
        Request $request,
        ThemeFollowRepository $themeFollowRepository,
        EntityManagerInterface $em
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_USER');

        if (!$this->isCsrfTokenValid('follow_theme', (string) $request->request->get('_token'))) {
            return new JsonResponse(['error' => 'csrf_invalid'], 400);
        }

        $user = $this->getUser();
        if (!$user instanceof User) {
            return new JsonResponse(['error' => 'unauthorized'], 401);
        }

        $follow = $themeFollowRepository->findOneBy([
            'user' => $user,
            'theme' => $theme,
        ]);

        if ($follow instanceof ThemeFollow) {
            $em->remove($follow);
            $following = false;
        } else {
            $follow = (new ThemeFollow())
                ->setUser($user)
                ->setTheme($theme);
            $em->persist($follow);
            $following = true;
        }

        $em->flush();

        return new JsonResponse([
            'ok' => true,
            'following' => $following,
        ]);
    }
}
