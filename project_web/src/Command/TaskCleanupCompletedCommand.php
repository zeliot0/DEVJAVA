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
    name: 'app:tasks:cleanup-completed',
    description: 'Nettoie les taches terminees trop anciennes.'
)]
#[AsScheduledTask(
    '10 3 * * *',
    description: 'Cleanup old completed tasks',
    arguments: '--days=120 --force'
)]
final class TaskCleanupCompletedCommand extends Command
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
                'days',
                null,
                InputOption::VALUE_REQUIRED,
                'Supprime les taches done dont updateAt est plus ancien que N jours.',
                '120'
            )
            ->addOption(
                'force',
                null,
                InputOption::VALUE_NONE,
                'Execute la suppression (sinon dry-run).'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $days = max(1, (int) $input->getOption('days'));
        $force = (bool) $input->getOption('force');

        $cutoff = (new \DateTimeImmutable())->modify(\sprintf('-%d day', $days));

        $toDelete = (int) $this->taskRepository->createQueryBuilder('t')
            ->select('COUNT(t.id)')
            ->andWhere('t.status = :done')
            ->andWhere('t.updateAt <= :cutoff')
            ->setParameter('done', 'done')
            ->setParameter('cutoff', $cutoff, Types::DATETIME_IMMUTABLE)
            ->getQuery()
            ->getSingleScalarResult();

        if (0 === $toDelete) {
            $io->success('Aucune tache terminee a nettoyer.');

            return Command::SUCCESS;
        }

        if (!$force) {
            $io->warning(\sprintf(
                'Dry-run: %d tache(s) terminee(s) a supprimer. Relance avec --force pour appliquer.',
                $toDelete
            ));

            return Command::SUCCESS;
        }

        $deleted = $this->entityManager->createQueryBuilder()
            ->delete(Task::class, 't')
            ->andWhere('t.status = :done')
            ->andWhere('t.updateAt <= :cutoff')
            ->setParameter('done', 'done')
            ->setParameter('cutoff', $cutoff, Types::DATETIME_IMMUTABLE)
            ->getQuery()
            ->execute();

        $this->taskRealtimePublisher->publish('task.schedule.cleaned', [
            'count' => (int) $deleted,
            'days' => $days,
            'cutoff' => $cutoff->format('Y-m-d H:i:s'),
        ]);

        $io->success(\sprintf('%d tache(s) terminee(s) supprimee(s).', (int) $deleted));

        return Command::SUCCESS;
    }
}

