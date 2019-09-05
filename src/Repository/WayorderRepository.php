<?php

namespace App\Repository;

use App\Entity\Wayorder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class WayorderRepository extends ServiceEntityRepository
{

    use EntityPaginationTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Wayorder::class);
    }

}
