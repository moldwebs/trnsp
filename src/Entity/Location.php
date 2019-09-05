<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_location")
 */

class Location extends AppEntity
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
     * @return Location
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}