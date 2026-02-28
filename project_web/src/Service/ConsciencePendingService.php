<?php

namespace App\Service;

use App\Entity\Question;
use App\Entity\User;
use App\Entity\UserResponse;
use App\Repository\ThemeFollowRepository;
use Doctrine\ORM\EntityManagerInterface;

class ConsciencePendingService
{
    public function __construct(
        private readonly ThemeFollowRepository $themeFollowRepository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function countPendingForUserFollowedThemes(User $user): int
    {
        $follows = $this->themeFollowRepository->findBy(['user' => $user]);
        if ($follows === []) {
            return 0;
        }

        $questions = [];
        foreach ($follows as $follow) {
            $theme = $follow->getTheme();
            if ($theme === null) {
                continue;
            }

            foreach ($theme->getQuestions() as $question) {
                if ($question->isActif()) {
                    $questions[$question->getId() ?? 0] = $question;
                }
            }
        }

        $activeQuestions = array_values(array_filter(
            $questions,
            static fn (Question $question): bool => $question->getId() !== null
        ));
        if ($activeQuestions === []) {
            return 0;
        }

        $latestByQuestion = $this->latestResponsesByQuestion($activeQuestions);
        $now = new \DateTimeImmutable();
        $pending = 0;

        foreach ($activeQuestions as $question) {
            $questionId = $question->getId();
            if ($questionId === null) {
                continue;
            }

            $response = $latestByQuestion[$questionId] ?? null;
            if (!$this->isAnsweredInCurrentWindow($question, $response, $now)) {
                $pending++;
            }
        }

        return $pending;
    }

    public function countPendingForAllActiveThemes(): int
    {
        $activeQuestions = $this->em->getRepository(Question::class)
            ->createQueryBuilder('q')
            ->andWhere('q.actif = :actif')
            ->setParameter('actif', true)
            ->getQuery()
            ->getResult();

        if ($activeQuestions === []) {
            return 0;
        }

        $latestByQuestion = $this->latestResponsesByQuestion($activeQuestions);
        $now = new \DateTimeImmutable();
        $pending = 0;

        foreach ($activeQuestions as $question) {
            if (!$question instanceof Question) {
                continue;
            }

            $questionId = $question->getId();
            if ($questionId === null) {
                continue;
            }

            $response = $latestByQuestion[$questionId] ?? null;
            if (!$this->isAnsweredInCurrentWindow($question, $response, $now)) {
                $pending++;
            }
        }

        return $pending;
    }

    /**
     * @param Question[] $questions
     * @return array<int, UserResponse>
     */
    private function latestResponsesByQuestion(array $questions): array
    {
        if ($questions === []) {
            return [];
        }

        $responses = $this->em->getRepository(UserResponse::class)
            ->createQueryBuilder('r')
            ->andWhere('r.question IN (:questions)')
            ->setParameter('questions', $questions)
            ->orderBy('r.createdAt', 'DESC')
            ->addOrderBy('r.id_r', 'DESC')
            ->getQuery()
            ->getResult();

        $latestByQuestion = [];
        foreach ($responses as $response) {
            $questionId = $response->getQuestion()?->getId();
            if ($questionId === null || isset($latestByQuestion[$questionId])) {
                continue;
            }
            $latestByQuestion[$questionId] = $response;
        }

        return $latestByQuestion;
    }

    private function isAnsweredInCurrentWindow(
        Question $question,
        ?UserResponse $response,
        \DateTimeImmutable $now
    ): bool {
        if ($response === null || $response->getDate() === null) {
            return false;
        }

        $windowStart = $this->getWindowStart($question->getFrequence() ?? 'quotidienne', $now);
        $responseDate = \DateTimeImmutable::createFromMutable($response->getDate())->setTime(0, 0);

        return $responseDate >= $windowStart;
    }

    private function getWindowStart(string $frequence, \DateTimeImmutable $reference): \DateTimeImmutable
    {
        $today = $reference->setTime(0, 0);

        return match ($frequence) {
            'hebdomadaire' => $today->modify('monday this week'),
            'mensuelle' => $today->modify('first day of this month'),
            default => $today,
        };
    }
}
