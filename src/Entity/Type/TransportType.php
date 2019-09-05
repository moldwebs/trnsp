<?php
namespace App\Entity\Type;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class TransportType extends AbstractEnumType
{
    public const RUTIERA = '0';
    public const AUTOCAR = '1';

    protected static $choices = [
        self::RUTIERA => 'Rutiera',
        self::AUTOCAR => 'Autocar',
    ];
}