<?php

namespace App\Service;

use App\Entity\Goal;
use App\Entity\PhoenixNetwork;
use App\Entity\PhoenixGoal;
use App\Entity\PhoenixWisdom;
use App\Entity\User;
use App\Service\ExternalApi\PhoenixApiManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class PhoenixService
{
    private $entityManager;
    private $apiManager;
    private $logger;

    public function __construct(
        EntityManagerInterface $entityManager,
        PhoenixApiManager $apiManager,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->apiManager = $apiManager;
        $this->logger = $logger;
    }

    /**
     * Register a dead goal for resurrection
     */
    public function registerDeadGoal(Goal $goal, ?User $user): PhoenixGoal
    {
        // Check if goal already has a phoenix record
        $existing = $this->entityManager
            ->getRepository(PhoenixGoal::class)
            ->findOneBy(['originalGoal' => $goal]);
            
        if ($existing) {
            return $existing;
        }

        // Phoenix flow starts only for dead goals
        if (method_exists($goal, 'isDead') && !$goal->isDead()) {
            throw new \InvalidArgumentException('Only abandoned/failed goals can enter Phoenix resurrection.');
        }

        // Prepare goal data for analysis
        $goalData = [
            'title' => $goal->getTitleGoa(),
            'description' => $goal->getDescriptionGoa(),
            'duration' => $this->calculateDuration($goal),
            'status' => $goal->getStatusGoa(),
            'progress' => $goal->getProgressGoa(),
            'notes' => $goal->getNotesGoa(),
            'category' => $goal->getCategoryGoa(),
            'priority' => $goal->getPriorityGoa()
        ];

        // Get AI analysis
        $analysis = $this->apiManager->analyzeWithFallback($goalData);

        // Create Phoenix Goal
        $phoenixGoal = new PhoenixGoal();
        $phoenixGoal->setOriginalGoal($goal);
        $phoenixGoal->setDeathAnalysis($analysis['death_analysis']['cause'] ?? 'Lost momentum over time');
        $phoenixGoal->setAshesData([
            'ashes' => $analysis['death_analysis']['ashes'] ?? [],
            'lessons' => $analysis['death_analysis']['lessons'] ?? []
        ]);
        $phoenixGoal->setDeathDate(new \DateTime());
        $phoenixGoal->setPhoenixPhase('ashes');
        $phoenixGoal->setResurrectionPlan($analysis['phoenix_phases'] ?? null);
        $phoenixGoal->setUser($user);
        
        // Save wisdom if valuable
        if (!empty($analysis['phoenix_wisdom'])) {
            $this->savePhoenixWisdom($analysis, $goal, $user);
            // mark instance as wisdom already shared (AI auto-generated)
            $phoenixGoal->setWisdomShared(true);
        }

        // Attempt to connect user with a mentor/support profile from similar resurrection journeys
        $this->buildPhoenixNetwork($phoenixGoal, $goal, $user);

        $this->entityManager->persist($phoenixGoal);
        $this->entityManager->flush();

        // Log the resurrection start
        $this->logger->info('Phoenix resurrection started', [
            'goal_id' => $goal->getIdGoa(),
            'user_id' => $user?->getId()
        ]);

        return $phoenixGoal;
    }

    /**
     * Update phoenix phase based on progress
     */
    public function updatePhoenixPhase(PhoenixGoal $phoenixGoal, Goal $rebornGoal = null): void
    {
        $phases = ['ashes', 'spark', 'flame', 'risen'];
        $currentIndex = array_search($phoenixGoal->getPhoenixPhase(), $phases);
        
        if ($currentIndex === false) {
            return;
        }

        // Logic to determine phase progression
        $timeSinceDeath = $phoenixGoal->getDeathDate()->diff(new \DateTime())->days;
        
        if ($rebornGoal) {
            // If reborn goal exists and is progressing
            $progress = $rebornGoal->getProgressGoa();
            
            if ($progress > 75) {
                $newPhase = 'risen';
            } elseif ($progress > 50) {
                $newPhase = 'flame';
            } elseif ($progress > 25) {
                $newPhase = 'spark';
            } else {
                $newPhase = 'ashes';
            }
        } else {
            // Time-based progression
            if ($timeSinceDeath > 60) {
                $newPhase = 'risen';
            } elseif ($timeSinceDeath > 30) {
                $newPhase = 'flame';
            } elseif ($timeSinceDeath > 14) {
                $newPhase = 'spark';
            } else {
                $newPhase = 'ashes';
            }
        }

        $phoenixGoal->setPhoenixPhase($newPhase);
        
        if ($newPhase === 'risen' && !$phoenixGoal->getRebirthDate()) {
            $phoenixGoal->setRebirthDate(new \DateTime());
        }

        $this->entityManager->flush();
    }

    /**
     * Create reborn goal from ashes
     */
    public function createRebornGoal(PhoenixGoal $phoenixGoal, array $newGoalData): Goal
    {
        $originalGoal = $phoenixGoal->getOriginalGoal();
        
        // Create new goal (enhanced version)
        $rebornGoal = new Goal();
        $rebornGoal->setTitleGoa($newGoalData['title'] ?? $originalGoal->getTitleGoa() . ' (Reborn)');
        $rebornGoal->setDescriptionGoa($newGoalData['description'] ?? $originalGoal->getDescriptionGoa());
        $rebornGoal->setDateDebutGoa(new \DateTime());
        $rebornGoal->setStatusGoa('EN_COURS');
        $rebornGoal->setProgressGoa(0);
        $rebornGoal->setCategoryGoa($originalGoal->getCategoryGoa());
        $rebornGoal->setPriorityGoa($newGoalData['priority'] ?? 'HAUTE');
        $rebornGoal->setNotesGoa("Phoenix Rebirth from Goal #" . $originalGoal->getIdGoa() . "\n" .
                                 "Lessons learned: " . implode(", ", $phoenixGoal->getAshesData()['lessons'] ?? []));

        
        $this->entityManager->persist($rebornGoal);

        // If original goal has an owner, try to transfer ownership
        try {
            /** @var object $orig */
            $orig = $originalGoal;
            if (method_exists($orig, 'getUser') && $orig->getUser() !== null && method_exists($rebornGoal, 'setUser')) {
                // call dynamically to confuse static analysis
                $method = 'setUser';
                $rebornGoal->$method($orig->getUser());
            }
        } catch (\Throwable $e) {
            // ignore if goal entity doesn't have user relation
        }
        
        // Link to phoenix goal
        $phoenixGoal->setRebornGoal($rebornGoal);
        $phoenixGoal->setPhoenixPhase('flame');
        $phoenixGoal->setRebirthDate(new \DateTime());
        $phoenixGoal->setPhoenixLevel(($phoenixGoal->getPhoenixLevel() ?? 1) + 1);
        
        $this->entityManager->flush();

        return $rebornGoal;
    }

    private function calculateDuration(Goal $goal): string
    {
        $start = $goal->getDateDebutGoa();
        $end = $goal->getDateFinalGoa() ?? new \DateTime();

        if (!$start) {
            return 'unknown';
        }
        
        $interval = $start->diff($end);
        return $interval->format('%m months, %d days');
    }

    private function savePhoenixWisdom(array $analysis, Goal $goal, ?User $contributor = null): void
    {
        $wisdom = new PhoenixWisdom();
        $wisdom->setCategory($goal->getCategoryGoa() ?: 'general');
        $wisdom->setLesson($analysis['phoenix_wisdom']);
        $wisdom->setTags(array_values(array_unique(array_filter([
            $goal->getCategoryGoa(),
            'phoenix-wisdom',
            strtolower((string) $goal->getPriorityGoa())
        ]))));
        $wisdom->setCreatedAt(new \DateTime());
        $wisdom->setSuccessCount(1);
        $wisdom->setContributor($contributor);

        $this->entityManager->persist($wisdom);
    }

    private function buildPhoenixNetwork(PhoenixGoal $phoenixGoal, Goal $goal, ?User $phoenixRising): void
    {
        if (!$phoenixRising) {
            return;
        }

        $qb = $this->entityManager->getRepository(PhoenixGoal::class)->createQueryBuilder('pg');
        $mentorPhoenix = $qb
            ->andWhere('pg.user IS NOT NULL')
            ->andWhere('pg.user != :currentUser')
            ->andWhere('pg.phoenixPhase = :phase')
            ->setParameter('currentUser', $phoenixRising)
            ->setParameter('phase', 'risen')
            ->orderBy('pg.deathDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$mentorPhoenix || !$mentorPhoenix->getUser()) {
            return;
        }

        $existingLink = $this->entityManager->getRepository(PhoenixNetwork::class)->findOneBy([
            'mentor' => $mentorPhoenix->getUser(),
            'phoenixRising' => $phoenixRising,
            'sharedGoal' => $phoenixGoal,
        ]);

        if ($existingLink) {
            return;
        }

        $network = new PhoenixNetwork();
        $network->setMentor($mentorPhoenix->getUser());
        $network->setPhoenixRising($phoenixRising);
        $network->setSharedGoal($phoenixGoal);
        $network->setNetworkType('mentorship');
        $network->setConnectedAt(new \DateTime());

        $this->entityManager->persist($network);
    }
}
