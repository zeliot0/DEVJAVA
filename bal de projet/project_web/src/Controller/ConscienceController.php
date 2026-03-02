<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConscienceController extends AbstractController
{
    #[Route('/conscience', name: 'app_conscience_index', methods: ['GET'])]
    public function index(Request $request, ThemeRepository $themeRepository): Response
    {
        $search = trim((string) $request->query->get('q', ''));
        $sort = (string) $request->query->get('sort', 'newest');
        $allowedSorts = ['newest', 'priority_desc', 'priority_asc', 'questions_desc'];
        $isAdmin = $this->isGranted('ROLE_ADMIN');

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'newest';
        }

        $themes = $themeRepository->findForConscience($search, $sort, $isAdmin);

        if ($request->isXmlHttpRequest()) {
            return $this->render('conscience/_themes_list.html.twig', [
                'themes' => $themes,
            ]);
        }

        return $this->render('conscience/index.html.twig', [
            'themes' => $themes,
            'search' => $search,
            'sort' => $sort,
        ]);
    }
}
