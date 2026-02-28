<?php

namespace App\Repository;

use App\Entity\RegistrationAttempt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RegistrationAttempt>
 */
class RegistrationAttemptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistrationAttempt::class);
    }

    /**
     * @return RegistrationAttempt[]
     */
    public function findForAdminList(?string $search, string $sort = 'newest'): array
    {
        $qb = $this->createQueryBuilder('ra');

        if ($search !== null && trim($search) !== '') {
            $term = '%' . mb_strtolower(trim($search)) . '%';
            $qb
                ->andWhere('LOWER(ra.email) LIKE :term OR LOWER(ra.reason) LIKE :term OR LOWER(ra.country) LIKE :term OR LOWER(ra.city) LIKE :term')
                ->setParameter('term', $term);
        }

        switch ($sort) {
            case 'oldest':
                $qb->orderBy('ra.createdAt', 'ASC');
                break;
            case 'email_asc':
                $qb->orderBy('ra.email', 'ASC');
                break;
            case 'status_asc':
                $qb->orderBy('ra.status', 'ASC')->addOrderBy('ra.createdAt', 'DESC');
                break;
            case 'newest':
            default:
                $qb->orderBy('ra.createdAt', 'DESC');
                break;
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @return RegistrationAttempt[]
     */
    public function findLatest(int $limit = 8): array
    {
        $limit = max(1, $limit);

        return $this->createQueryBuilder('ra')
            ->orderBy('ra.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string[] $emails
     * @return array<string, RegistrationAttempt>
     */
    public function findLatestByEmails(array $emails): array
    {
        $emails = array_values(array_unique(array_filter(array_map(
            static fn ($email) => mb_strtolower(trim((string) $email)),
            $emails
        ))));

        if ($emails === []) {
            return [];
        }

        $attempts = $this->createQueryBuilder('ra')
            ->where('LOWER(ra.email) IN (:emails)')
            ->setParameter('emails', $emails)
            ->orderBy('ra.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        $latestByEmail = [];
        foreach ($attempts as $attempt) {
            $key = mb_strtolower((string) $attempt->getEmail());
            if (!isset($latestByEmail[$key])) {
                $latestByEmail[$key] = $attempt;
            }
        }

        return $latestByEmail;
    }
}
