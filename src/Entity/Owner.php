<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_owner")
 */

class Owner extends AppEntity
{

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Owner
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}