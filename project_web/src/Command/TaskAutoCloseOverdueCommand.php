<?php

namespace App\Command;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Service\TaskRealtimePublisher;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Zenstruck\ScheduleBundle\Attribute\AsScheduledTask;

#[AsCommand(
    name: 'app:tasks:auto-close-overdue',
    description: 'Cloture automatiquement les taches en cours en retard.'
)]
#[AsScheduledTask(
    '15 1 * * *',
    description: 'Auto-close overdue doing tasks',
    arguments: '--days-overdue=2 --limit=200'
)]
final class TaskAutoCloseOverdueCommand extends Command
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly TaskRealtimePublisher $taskRealtimePublisher
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption(
                'days-overdue',
                null,
                InputOption::VALUE_REQUIRED,
                'Nombre de jours de retard minimum pour cloturer.',
                '2'
            )
            ->addOption(
                'limit',
                null,
                InputOption::VALUE_REQUIRED,
                'Nombre max de taches a traiter par execution.',
                '200'
            )
            ->addOption(
                'dry-run',
                null,
                InputOption::VALUE_NONE,
                'N effectue pas la cloture, affiche uniquement le resultat attendu.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $daysOverdue = max(1, (int) $input->getOption('days-overdue'));
        $limit = max(1, min(2000, (int) $input->getOption('limit')));
        $dryRun = (bool) $input->getOption('dry-run');

        $cutoff = (new \DateTimeImmutable('today'))->modify(\sprintf('-%d day', $daysOverdue));

        $tasks = $this->taskRepository->createQueryBuilder('t')
            ->andWhere('t.status = :doing')
            ->andWhere('t.dueAt IS NOT NULL')
            ->andWhere('t.dueAt <= :cutoff')
            ->setParameter('doing', 'doing')
            ->setParameter('cutoff', $cutoff, Types::DATE_IMMUTABLE)
            ->orderBy('t.dueAt', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $count = \count($tasks);
        if (0 === $count) {
            $io->success('Aucune tache a cloturer automatiquement.');

            return Command::SUCCESS;
        }

        if ($dryRun) {
            $io->warning(\sprintf(
                'Dry-run: %d tache(s) seraient cloturees (date limite <= %s).',
                $count,
                $cutoff->format('Y-m-d')
            ));

            return Command::SUCCESS;
        }

        $closedIds = [];
        foreach ($tasks as $task) {
            \assert($task instanceof Task);
            $task->setStatus('done');
            $task->touch();
            if (null !== $task->getId()) {
                $closedIds[] = $task->getId();
            }
        }

        $this->entityManager->flush();

        $this->taskRealtimePublisher->publish('task.schedule.auto_closed', [
            'count' => $count,
            'cutoff' => $cutoff->format('Y-m-d'),
            'ids' => $closedIds,
        ]);

        $io->success(\sprintf(
            '%d tache(s) cloturee(s) automatiquement (date limite <= %s).',
            $count,
            $cutoff->format('Y-m-d')
        ));

        return Command::SUCCESS;
    }
}

