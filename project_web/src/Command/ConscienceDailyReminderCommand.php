<?php

namespace App\Command;

use App\Repository\UserRepository;
use App\Service\ConscienceNotificationService;
use App\Service\ConsciencePendingService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ConscienceDailyReminderCommand extends Command
{
    protected static $defaultName = 'app:conscience:daily-reminder';
    protected static $defaultDescription = 'Send daily pending reminders for Conscience followers.';

    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ConsciencePendingService $consciencePendingService,
        private readonly ConscienceNotificationService $conscienceNotificationService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $users = $this->userRepository->findAll();
        $total = count($users);
        $sent = 0;
        $skipped = 0;

        foreach ($users as $user) {
            if (!in_array('ROLE_USER', $user->getRoles(), true)) {
                $skipped++;
                continue;
            }

            $pending = $this->consciencePendingService->countPendingForUserFollowedThemes($user);
            if ($pending <= 0) {
                $skipped++;
                continue;
            }

            $created = $this->conscienceNotificationService->ensureDailyPendingReminder($user, $pending);
            if ($created) {
                $sent++;
            } else {
                $skipped++;
            }
        }

        $io->success(sprintf(
            'Conscience reminders processed. users=%d, sent=%d, skipped=%d',
            $total,
            $sent,
            $skipped
        ));

        return Command::SUCCESS;
    }
}
