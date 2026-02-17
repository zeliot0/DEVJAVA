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

//    /**
//     * @return TimeMessage[] Returns an array of TimeMessage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TimeMessage
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

// In src/Repository/TimeMessageRepository.php

public function findByUserAndType(int $userId, string $type): array
{
    return $this->createQueryBuilder('t')
        ->andWhere('t.idUser = :userId')
        ->andWhere('t.messageTypeG = :type')
        ->setParameter('userId', $userId)
        ->setParameter('type', $type)
        ->orderBy('t.createdAtMsg', 'DESC')
        ->getQuery()
        ->getResult();
}

public function findUndeliveredMessages(int $userId): array
{
    $now = new \DateTime();
    
    return $this->createQueryBuilder('t')
        ->andWhere('t.idUser = :userId')
        ->andWhere('t.deliveryDateMsg > :now')
        ->andWhere('t.isDeliveredMsg = false')
        ->andWhere('t.messageTypeG = :type')
        ->setParameter('userId', $userId)
        ->setParameter('now', $now)
        ->setParameter('type', TimeMessage::TYPE_TO_FUTURE)
        ->orderBy('t.deliveryDateMsg', 'ASC')
        ->getQuery()
        ->getResult();
}

}
