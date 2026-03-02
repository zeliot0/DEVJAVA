<?php

namespace App\Repository;

use App\Entity\Motivation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MotivationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Motivation::class);
    }

    // This method should already exist
    public function findByMood(string $mood): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.mood = :mood')
            ->setParameter('mood', $mood)
            ->getQuery()
            ->getResult();
    }
    // Dans App\Repository\MotivationRepository
// src/Repository/MotivationRepository.php

public function getAvailableMoods(): array
{
    return [
        'motivated',  // Standardisé en anglais
        'happy',
        'sad',
        'stressed',
        'tired',
        'determined',
        'optimistic'
    ];
}
}