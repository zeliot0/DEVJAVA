<?php

namespace App\Repository;

use App\Entity\Theme;
use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Question>
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    /**
     * @return Question[]
     */
    public function findByThemeOrdered(Theme $theme): array
    {
        return $this->sortQuestionsByOrder(
            $this->createQueryBuilder('q')
                ->andWhere('q.theme = :theme')
                ->setParameter('theme', $theme)
                ->getQuery()
                ->getResult()
        );
    }

    /**
     * @return Question[]
     */
    public function findActiveByThemeOrdered(Theme $theme): array
    {
        return $this->sortQuestionsByOrder(
            $this->createQueryBuilder('q')
                ->andWhere('q.theme = :theme')
                ->andWhere('q.actif = :active')
                ->setParameter('theme', $theme)
                ->setParameter('active', true)
                ->getQuery()
                ->getResult()
        );
    }

    /**
     * @param Question[] $questions
     * @return Question[]
     */
    private function sortQuestionsByOrder(array $questions): array
    {
        usort($questions, static function (Question $a, Question $b): int {
            $orderA = $a->getOrdre() ?? PHP_INT_MAX;
            $orderB = $b->getOrdre() ?? PHP_INT_MAX;

            if ($orderA === $orderB) {
                return ($a->getId() ?? 0) <=> ($b->getId() ?? 0);
            }

            return $orderA <=> $orderB;
        });

        return $questions;
    }

    //    /**
    //     * @return Question[] Returns an array of Question objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('q')
    //            ->andWhere('q.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('q.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Question
    //    {
    //        return $this->createQueryBuilder('q')
    //            ->andWhere('q.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
