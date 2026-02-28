<?php

namespace App\Command;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Service\TaskRealtimePublisher;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Zenstruck\ScheduleBundle\Attribute\AsScheduledTask;

#[AsCommand(
    name: 'app:tasks:due-reminders',
    description: 'Publie des rappels pour les taches proches de l\'echeance.'
)]
#[AsScheduledTask('0 8-20 * * 1-5', description: 'Task reminders for due-soon tasks (weekdays)')]
final class TaskDueReminderCommand extends Command
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly TaskRealtimePublisher $taskRealtimePublisher
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption(
                'horizon-days',
                null,
                InputOption::VALUE_REQUIRED,
                'Nombre de jours a couvrir depuis aujourd\'hui.',
                '1'
            )
            ->addOption(
                'limit',
                null,
                InputOption::VALUE_REQUIRED,
                'Nombre max de taches a inclure dans le rappel.',
                '50'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $horizonDays = max(0, (int) $input->getOption('horizon-days'));
        $limit = max(1, min(250, (int) $input->getOption('limit')));

        $today = new \DateTimeImmutable('today');
        $until = $today->modify(\sprintf('+%d day', $horizonDays));

        $tasks = $this->taskRepository->createQueryBuilder('t')
            ->andWhere('t.status != :done')
            ->andWhere('t.dueAt IS NOT NULL')
            ->andWhere('t.dueAt BETWEEN :today AND :until')
            ->setParameter('done', 'done')
            ->setParameter('today', $today, Types::DATE_IMMUTABLE)
            ->setParameter('until', $until, Types::DATE_IMMUTABLE)
            ->orderBy('t.dueAt', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        $count = \count($tasks);
        if (0 === $count) {
            $io->success('Aucune tache proche de l\'echeance.');

            return Command::SUCCESS;
        }

        $payloadTasks = \array_map(static function(Task $task): array {
            return [
                'id' => $task->getId(),
                'title' => $task->getTitle(),
                'status' => $task->getStatus(),
                'priority' => $task->getPriority(),
                'dueAt' => $task->getDueAt()?->format('Y-m-d'),
            ];
        }, $tasks);

        $this->taskRealtimePublisher->publish('task.schedule.reminder', [
            'count' => $count,
            'window' => [
                'from' => $today->format('Y-m-d'),
                'to' => $until->format('Y-m-d'),
            ],
            'tasks' => $payloadTasks,
        ]);

        $io->success(\sprintf(
            '%d tache(s) rappeles entre %s et %s.',
            $count,
            $today->format('Y-m-d'),
            $until->format('Y-m-d')
        ));

        return Command::SUCCESS;
    }
}

