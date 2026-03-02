<?php

namespace App\Repository;

use App\Entity\MoodClick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MoodClickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoodClick::class);
    }

    public function getMoodClickStats(): array
    {
        $results = $this->createQueryBuilder('mc')
            ->select('mc.moodClick AS moodClick, COUNT(mc.id) AS clickCount')
            ->groupBy('mc.moodClick')
            ->getQuery()
            ->getArrayResult();

        $stats = [];
        foreach ($results as $result) {
            $stats[strtolower((string) $result['moodClick'])] = (int) $result['clickCount'];
        }

        return $stats;
    }

    public function addClick(string $mood, ?string $ipAddress = null): void
    {
        $click = new MoodClick();
        $click->setMoodClick(strtolower($mood));
        $click->setClickedAt(new \DateTimeImmutable());
        $click->setIpAddressClick($ipAddress);

        $this->getEntityManager()->persist($click);
        $this->getEntityManager()->flush();
    }
}

