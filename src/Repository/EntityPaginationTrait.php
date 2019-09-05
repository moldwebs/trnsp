<?php

namespace App\Repository;

trait EntityPaginationTrait
{
    public function getPaginationQuery($conditions = [])
    {
        $qb = $this->createQueryBuilder("q");
        if (!empty($this->_class->associationMappings)) {
            foreach ($this->_class->associationMappings as $assoc => $associationMapping) {
                $qb->leftJoin('q.' . $assoc, $assoc);
            }
        }
        if (!empty($conditions)) foreach ($conditions as $key => $val) {
            $param = 'param_' . uniqid();
            $qb->andWhere("{$key} = :{$param}")
                ->setParameter($param, $val);
        }
        return $qb;
    }
}