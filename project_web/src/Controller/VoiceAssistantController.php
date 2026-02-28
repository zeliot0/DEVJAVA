<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Service\VoiceAssistantService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/api/voice')]
final class VoiceAssistantController extends AbstractController
{
    #[Route('/ask', name: 'api_voice_ask', methods: ['POST'])]
    public function ask(
        Request $request,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $session,
        VoiceAssistantService $voiceAssistantService,
        EntityManagerInterface $em,
        TaskRepository $taskRepository
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true) ?: [];
        $message = trim((string) ($payload['message'] ?? ''));

        if ($message === '') {
            return $this->json([
                'ok' => false,
                'error' => 'message is required',
            ], 422);
        }

        $history = $session->get('voice_history', []);
        if (!is_array($history)) {
            $history = [];
        }

        $ai = $voiceAssistantService->interpret($message, $history);
        $reply = (string) ($ai['reply'] ?? 'Je vous ecoute.');
        $intent = (string) ($ai['intent'] ?? 'chat');
        $action = isset($ai['action']) ? (string) $ai['action'] : null;
        $data = is_array($ai['data'] ?? null) ? $ai['data'] : [];
        $source = (string) ($ai['source'] ?? 'fallback');
        $actionUrl = null;

        if ($intent === 'navigate' && $action !== null) {
            if ($this->isRouteAllowed($action)) {
                $actionUrl = $urlGenerator->generate($action);
                $reply = $this->buildActionReply($action);
            }
        } elseif ($intent === 'create_task') {
            if (!$this->isGranted('ROLE_USER')) {
                $reply = 'Connectez-vous pour creer une tache.';
                $actionUrl = $urlGenerator->generate('app_login');
            } else {
                $title = trim((string) ($data['title'] ?? ''));
                if ($title === '') {
                    $title = $this->extractTaskTitleFromMessage($message);
                }

                if ($title === '') {
                    $reply = 'Donnez un titre clair. Exemple: creer tache acheter du lait.';
                } else {
                    $task = new Task();
                    $task->setTitle(mb_substr($title, 0, 255));
                    $task->setStatus('todo');
                    $task->setPriority('med');
                    $task->setDescription((string) ($data['description'] ?? ''));

                    $dueAt = $this->extractDueDate((string) ($data['due_hint'] ?? ''), $message);
                    if ($dueAt !== null) {
                        $task->setDueAt($dueAt);
                    }

                    $task->touch();
                    $em->persist($task);
                    $em->flush();

                    $reply = 'Tache creee: ' . $task->getTitle() . '. ID ' . $task->getId() . '.';
                    $actionUrl = $urlGenerator->generate('app_task_index');
                }
            }
        } elseif ($intent === 'list_tasks' || $intent === 'count_tasks') {
            if (!$this->isGranted('ROLE_USER')) {
                $reply = 'Connectez-vous pour consulter les taches.';
                $actionUrl = $urlGenerator->generate('app_login');
            } else {
                $tasks = $taskRepository->createQueryBuilder('t')
                    ->orderBy('t.updateAt', 'DESC')
                    ->setMaxResults(5)
                    ->getQuery()
                    ->getResult();

                $count = count($tasks);
                if ($intent === 'count_tasks') {
                    $total = (int) $taskRepository->createQueryBuilder('t')
                        ->select('COUNT(t.id)')
                        ->getQuery()
                        ->getSingleScalarResult();
                    $reply = 'Vous avez ' . $total . ' taches au total.';
                } elseif ($count === 0) {
                    $reply = 'Vous n avez aucune tache pour le moment.';
                } else {
                    $titles = array_map(
                        static fn(Task $t): string => $t->getTitle(),
                        $tasks
                    );
                    $reply = 'Dernieres taches: ' . implode(', ', $titles) . '.';
                }
                $actionUrl = $urlGenerator->generate('app_task_index');
            }
        } elseif ($intent === 'delete_task') {
            if (!$this->isGranted('ROLE_USER')) {
                $reply = 'Connectez-vous pour supprimer une tache.';
                $actionUrl = $urlGenerator->generate('app_login');
            } else {
                $pending = $session->get('voice_pending_delete');
                $confirm = $this->containsAny($this->normalize($message), ['confirmer', 'oui supprime', 'valide suppression']);
                $cancel = $intent === 'cancel' || $this->containsAny($this->normalize($message), ['annuler', 'cancel']);

                if ($cancel && is_array($pending)) {
                    $session->remove('voice_pending_delete');
                    $reply = 'Suppression annulee.';
                } elseif ($confirm && is_array($pending) && isset($pending['id'])) {
                    $task = $taskRepository->find((int) $pending['id']);
                    if ($task !== null) {
                        $name = $task->getTitle();
                        $em->remove($task);
                        $em->flush();
                        $reply = 'Tache supprimee: ' . $name . '.';
                    } else {
                        $reply = 'La tache a deja ete supprimee.';
                    }
                    $session->remove('voice_pending_delete');
                    $actionUrl = $urlGenerator->generate('app_task_index');
                } else {
                    $title = trim((string) ($data['title'] ?? ''));
                    if ($title === '') {
                        $title = $this->extractTitleForDelete($message);
                    }

                    if ($title === '') {
                        $reply = 'Dites le titre de la tache a supprimer.';
                    } else {
                        $task = $taskRepository->createQueryBuilder('t')
                            ->where('LOWER(t.title) LIKE :q')
                            ->setParameter('q', '%' . strtolower($title) . '%')
                            ->orderBy('t.updateAt', 'DESC')
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getOneOrNullResult();

                        if (!$task instanceof Task) {
                            $reply = 'Je n ai pas trouve cette tache.';
                        } else {
                            $session->set('voice_pending_delete', [
                                'id' => $task->getId(),
                                'title' => $task->getTitle(),
                            ]);
                            $reply = 'Confirmez suppression de la tache ' . $task->getTitle() . '. Dites confirmer.';
                        }
                    }
                }
            }
        } elseif ($intent === 'cancel') {
            $session->remove('voice_pending_delete');
            $reply = 'Action annulee.';
        }

        $history[] = ['role' => 'user', 'text' => $message];
        $history[] = ['role' => 'assistant', 'text' => $reply];
        $session->set('voice_history', array_slice($history, -12));

        return $this->json([
            'ok' => true,
            'data' => [
                'reply' => $reply,
                'actionUrl' => $actionUrl,
                'aiSource' => $source,
                'intent' => $intent,
            ],
        ]);
    }

    private function isRouteAllowed(string $routeName): bool
    {
        if (in_array($routeName, ['admin_dashboard', 'admin_users', 'admin_registration_attempts'], true)) {
            return $this->isGranted('ROLE_ADMIN');
        }

        if ($routeName === 'app_profile' || $routeName === 'app_task_index') {
            return $this->isGranted('ROLE_USER');
        }

        return true;
    }

    private function buildActionReply(string $routeName): string
    {
        return match ($routeName) {
            'app_login' => 'J ouvre la page de connexion.',
            'app_register' => 'J ouvre la page d inscription.',
            'app_profile' => 'J ouvre votre profil.',
            'admin_dashboard' => 'J ouvre le dashboard admin.',
            'admin_users' => 'J ouvre la liste des utilisateurs.',
            'admin_registration_attempts' => 'J ouvre les tentatives d inscription.',
            'app_task_index' => 'J ouvre vos taches.',
            'app_forgot_password' => 'J ouvre la page mot de passe oublie.',
            'app_landing' => 'J ouvre votre espace principal.',
            default => 'J ouvre la page demandee.',
        };
    }

    private function extractTaskTitleFromMessage(string $message): string
    {
        $text = $this->normalize($message);
        $patterns = ['creer tache', 'cree tache', 'ajouter tache', 'create task'];

        foreach ($patterns as $pattern) {
            $pos = strpos($text, $pattern);
            if ($pos !== false) {
                $title = trim(substr($text, $pos + strlen($pattern)));
                return $title;
            }
        }

        return '';
    }

    private function extractTitleForDelete(string $message): string
    {
        $text = $this->normalize($message);
        $patterns = ['supprimer tache', 'effacer tache', 'delete task'];

        foreach ($patterns as $pattern) {
            $pos = strpos($text, $pattern);
            if ($pos !== false) {
                return trim(substr($text, $pos + strlen($pattern)));
            }
        }

        return '';
    }

    private function extractDueDate(string $dueHint, string $message): ?\DateTimeImmutable
    {
        $text = $this->normalize($dueHint . ' ' . $message);

        if ($this->containsAny($text, ['demain', 'tomorrow'])) {
            return new \DateTimeImmutable('tomorrow');
        }

        if ($this->containsAny($text, ['aujourd hui', 'today'])) {
            return new \DateTimeImmutable('today');
        }

        if (preg_match('/\b(\d{4}-\d{2}-\d{2})\b/', $text, $m) === 1) {
            try {
                $date = new \DateTimeImmutable($m[1]);
                $today = new \DateTimeImmutable('today');
                return $date < $today ? null : $date;
            } catch (\Throwable) {
                return null;
            }
        }

        return null;
    }

    /**
     * @param string[] $needles
     */
    private function containsAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($needle !== '' && str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    private function normalize(string $text): string
    {
        $text = mb_strtolower($text);
        $converted = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        if (is_string($converted) && $converted !== '') {
            $text = strtolower($converted);
        }

        $text = str_replace("'", ' ', $text);
        $text = preg_replace('/[^a-z0-9\s]/', ' ', $text) ?? $text;
        $text = preg_replace('/\s+/', ' ', $text) ?? $text;

        return trim($text);
    }
}
