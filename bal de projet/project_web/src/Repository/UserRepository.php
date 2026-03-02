<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    /**
     * @return User[]
     */
    public function findForAdminList(?string $search, string $sort): array
    {
        $qb = $this->createQueryBuilder('u');

        if ($search !== null && trim($search) !== '') {
            $term = '%' . mb_strtolower(trim($search)) . '%';
            $qb
                ->andWhere('LOWER(u.email) LIKE :term OR LOWER(u.nom_user) LIKE :term')
                ->setParameter('term', $term);
        }

        switch ($sort) {
            case 'email_asc':
                $qb->orderBy('u.email', 'ASC');
                break;
            case 'name_asc':
                $qb->orderBy('u.nom_user', 'ASC');
                break;
            case 'admin_first':
                $qb
                    ->addSelect("CASE WHEN u.roles LIKE '%ROLE_ADMIN%' THEN 0 ELSE 1 END AS HIDDEN roleOrder")
                    ->orderBy('roleOrder', 'ASC')
                    ->addOrderBy('u.id_user', 'ASC');
                break;
            case 'newest':
            default:
                $qb->orderBy('u.id_user', 'DESC');
                break;
        }

        return $qb->getQuery()->getResult();
    }
}
