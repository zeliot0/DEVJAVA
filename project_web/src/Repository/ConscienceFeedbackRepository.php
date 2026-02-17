<?php

namespace App\Repository;

use App\Entity\ConscienceFeedback;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConscienceFeedback>
 */
class ConscienceFeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConscienceFeedback::class);
    }

    /**
     * @return ConscienceFeedback[]
     */
    public function findLatestWithRelations(int $limit = 50): array
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.user', 'u')->addSelect('u')
            ->leftJoin('f.favoriteTheme', 't')->addSelect('t')
            ->orderBy('f.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array{total:int, avg:float, five:int, four:int, three:int, two:int, one:int}
     */
    public function getOverviewStats(): array
    {
        $row = $this->createQueryBuilder('f')
            ->select('COUNT(f.id) AS total')
            ->addSelect('COALESCE(AVG(f.satisfaction), 0) AS avg')
            ->addSelect('SUM(CASE WHEN f.satisfaction = 5 THEN 1 ELSE 0 END) AS five')
            ->addSelect('SUM(CASE WHEN f.satisfaction = 4 THEN 1 ELSE 0 END) AS four')
            ->addSelect('SUM(CASE WHEN f.satisfaction = 3 THEN 1 ELSE 0 END) AS three')
            ->addSelect('SUM(CASE WHEN f.satisfaction = 2 THEN 1 ELSE 0 END) AS two')
            ->addSelect('SUM(CASE WHEN f.satisfaction = 1 THEN 1 ELSE 0 END) AS one')
            ->getQuery()
            ->getSingleResult();

        return [
            'total' => (int) ($row['total'] ?? 0),
            'avg' => round((float) ($row['avg'] ?? 0), 2),
            'five' => (int) ($row['five'] ?? 0),
            'four' => (int) ($row['four'] ?? 0),
            'three' => (int) ($row['three'] ?? 0),
            'two' => (int) ($row['two'] ?? 0),
            'one' => (int) ($row['one'] ?? 0),
        ];
    }

    /**
     * @return array<int, array{theme:string, count:int}>
     */
    public function getTopFavoriteThemes(int $limit = 5): array
    {
        $rows = $this->createQueryBuilder('f')
            ->select('t.nom AS theme, COUNT(f.id) AS count')
            ->join('f.favoriteTheme', 't')
            ->groupBy('t.id_t, t.nom')
            ->orderBy('count', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return array_map(
            static fn(array $r): array => [
                'theme' => (string) ($r['theme'] ?? 'N/A'),
                'count' => (int) ($r['count'] ?? 0),
            ],
            $rows
        );
    }
}
