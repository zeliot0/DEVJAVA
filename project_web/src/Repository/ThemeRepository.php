<?php

namespace App\Repository;

use App\Entity\Theme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Theme>
 */
class ThemeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Theme::class);
    }
    public function searchByName(string $term): array
{
    return $this->createQueryBuilder('t')
        ->where('LOWER(t.nom) LIKE LOWER(:term)')
        ->setParameter('term', '%' . $term . '%')
        ->orderBy('t.createdAt', 'DESC')
        ->getQuery()
        ->getResult();
}

    /**
     * @return Theme[]
     */
    public function findForConscience(?string $search, string $sort, bool $isAdmin): array
    {
        $qb = $this->createQueryBuilder('t');

        if (!$isAdmin) {
            $qb->andWhere('t.actif = :active')->setParameter('active', true);
        }

        if ($search !== null && trim($search) !== '') {
            $term = '%' . mb_strtolower(trim($search)) . '%';
            $qb
                ->andWhere('LOWER(t.nom) LIKE :term OR LOWER(t.intention) LIKE :term OR LOWER(t.description_q) LIKE :term')
                ->setParameter('term', $term);
        }

        switch ($sort) {
            case 'smart':
                $qb->leftJoin('t.questions', 'q', 'WITH', 'q.actif = :activeQuestion')
                    ->setParameter('activeQuestion', true)
                    ->addSelect('COUNT(q) AS HIDDEN questionCount')
                    ->addSelect('(COALESCE(t.priorite, 1) * 100 + COUNT(q) * 10) AS HIDDEN smartScore')
                    ->groupBy('t.id_t')
                    ->orderBy('smartScore', 'DESC')
                    ->addOrderBy('t.createdAt', 'DESC');
                break;
            case 'priority_desc':
                $qb->orderBy('t.priorite', 'DESC')
                    ->addOrderBy('t.createdAt', 'DESC');
                break;
            case 'priority_asc':
                $qb->orderBy('t.priorite', 'ASC')
                    ->addOrderBy('t.createdAt', 'DESC');
                break;
            case 'questions_desc':
                $qb->leftJoin('t.questions', 'q', 'WITH', 'q.actif = :activeQuestion')
                    ->setParameter('activeQuestion', true)
                    ->addSelect('COUNT(q) AS HIDDEN questionCount')
                    ->groupBy('t.id_t')
                    ->orderBy('questionCount', 'DESC')
                    ->addOrderBy('t.createdAt', 'DESC');
                break;
            case 'newest':
            default:
                $qb->orderBy('t.createdAt', 'DESC');
                break;
        }

        return $qb->getQuery()->getResult();
    }


    //    /**
    //     * @return Theme[] Returns an array of Theme objects
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

    //    public function findOneBySomeField($value): ?Theme
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
