<?php

namespace App\Command;

use App\Entity\Goal;
use App\Service\GoalSuccessService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:recompute-goal-scores',
    description: 'Recompute success scores for all active goals',
)]
#[\Zenstruck\ScheduleBundle\Attribute\AsScheduledTask(
    '0 4 * * *',
    description: 'Recompute success scores for all goals once daily'
)]
class RecomputeGoalScoresCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $em,
        private GoalSuccessService $goalSuccessService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Goal Success Score Recomputation');

        $goals = $this->em->getRepository(Goal::class)->findBy([
            'statusGoa' => ['EN_COURS', 'BROUILLON']
        ]);

        $io->info(sprintf('Found %d active goals to process', count($goals)));

        $updated = 0;
        foreach ($goals as $goal) {
            try {
                $data = $this->goalSuccessService->computeScore($goal);
                $goal->setSuccessScore($data['score']);
                $updated++;
            } catch (\Throwable $e) {
                $io->warning(sprintf('Goal #%d: %s', $goal->getIdGoa(), $e->getMessage()));
            }
        }

        $this->em->flush();

        $io->success(sprintf('Updated %d goal scores', $updated));

        return Command::SUCCESS;
    }
}
