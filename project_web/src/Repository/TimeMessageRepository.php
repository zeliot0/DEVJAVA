<?php

namespace App\Repository;

use App\Entity\TimeMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimeMessage>
 */
class TimeMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimeMessage::class);
    }

    /**
     * Find messages by user ID
     */
    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.idUser = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('t.createdAtMsg', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find undelivered messages that are due for delivery
     */
    public function findDueMessages(): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.deliveryDateMsg <= :now')
            ->andWhere('t.isDeliveredMsg = :delivered')
            ->setParameter('now', new \DateTime())
            ->setParameter('delivered', false)
            ->orderBy('t.deliveryDateMsg', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find AI response for a parent message
     */
    public function findAiResponse(int $parentId): ?TimeMessage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.parentMessageId = :parentId')
            ->setParameter('parentId', $parentId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}