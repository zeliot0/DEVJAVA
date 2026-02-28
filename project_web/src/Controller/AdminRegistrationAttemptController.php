<?php

namespace App\Controller;

use App\Repository\RegistrationAttemptRepository;
use App\Service\LocationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminRegistrationAttemptController extends AbstractController
{
    #[Route('/admin/registration-attempts', name: 'admin_registration_attempts')]
    public function index(Request $request, RegistrationAttemptRepository $attemptRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $search = trim((string) $request->query->get('q', ''));
        $sort = (string) $request->query->get('sort', 'newest');
        $allowedSorts = ['newest', 'oldest', 'email_asc', 'status_asc'];

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'newest';
        }

        $attempts = $attemptRepository->findForAdminList($search, $sort);

        return $this->render('admin/registration_attempts.html.twig', [
            'attempts' => $attempts,
            'search' => $search,
            'sort' => $sort,
        ]);
    }

    #[Route('/admin/registration-attempts/test-ipinfo', name: 'admin_registration_attempts_test_ipinfo', methods: ['POST'])]
    public function testIpInfo(Request $request, LocationService $locationService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if (!$this->isCsrfTokenValid('test_ipinfo', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Action invalide (token CSRF).');
            return $this->redirectToRoute('admin_registration_attempts');
        }

        $ip = $this->resolveClientIp($request);
        $location = $locationService->getLocation($ip);

        $this->addFlash(
            'success',
            sprintf(
                'Test IPInfo: IP=%s | Pays=%s | Ville=%s | Lat=%s | Lng=%s',
                $ip ?? 'Unknown',
                $location['country'] ?? 'Unknown',
                $location['city'] ?? 'Unknown',
                isset($location['latitude']) ? (string) $location['latitude'] : 'null',
                isset($location['longitude']) ? (string) $location['longitude'] : 'null'
            )
        );

        return $this->redirectToRoute('admin_registration_attempts');
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
}
