<?php
namespace App\Entity\Filter;
use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;

class UidFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        // Check if the entity implements the LocalAware interface
        if (!$targetEntity->reflClass->hasProperty('uid')) {
            return "";
        }

        return $targetTableAlias.'.uid = 0';
    }
}