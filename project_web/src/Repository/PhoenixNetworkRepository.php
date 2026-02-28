<?php

namespace App\Repository;

use App\Entity\PhoenixNetwork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhoenixNetwork>
 */
class PhoenixNetworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhoenixNetwork::class);
    }

    // Add custom methods here if needed
}