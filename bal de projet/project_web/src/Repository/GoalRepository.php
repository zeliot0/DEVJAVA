<?php

namespace App\Repository;

use App\Entity\Goal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Goal>
 */
class GoalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Goal::class);
    }

    //    /**
    //     * @return Goal[] Returns an array of Goal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Goal
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /**
     * @return Goal[]
     */
    public function findBySearchAndSort(?string $search = null, string $sort = 'progress_desc'): array
    {
        $qb = $this->createQueryBuilder('g');

        if ($search !== null && trim($search) !== '') {
            $term = '%' . mb_strtolower(trim($search)) . '%';
            $qb
                ->andWhere('LOWER(g.titleGoa) LIKE :term OR LOWER(g.descriptionGoa) LIKE :term OR LOWER(g.categoryGoa) LIKE :term OR LOWER(g.priorityGoa) LIKE :term OR LOWER(g.statusGoa) LIKE :term')
                ->setParameter('term', $term);
        }

        switch ($sort) {
            case 'progress_asc':
                $qb->orderBy('g.progressGoa', 'ASC');
                break;
            case 'status':
                $qb->orderBy('g.statusGoa', 'ASC')
                    ->addOrderBy('g.titleGoa', 'ASC');
                break;
            case 'progress_desc':
            default:
                $qb->orderBy('g.progressGoa', 'DESC');
                break;
        }

        return $qb->getQuery()->getResult();
    }
}
