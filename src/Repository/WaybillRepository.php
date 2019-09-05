<?php

namespace App\Repository;

use App\Entity\Waybill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class WaybillRepository extends ServiceEntityRepository
{

    use EntityPaginationTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Waybill::class);
    }

}
