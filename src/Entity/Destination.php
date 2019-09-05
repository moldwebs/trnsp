<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_destination")
 */

class Destination extends AppEntity
{

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    protected $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Destination
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}