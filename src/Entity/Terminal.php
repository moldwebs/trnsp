<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_terminal")
 */

class Terminal extends AppEntity
{

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    protected $title;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $diagrama_procente;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Terminal
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiagramaProcente()
    {
        return $this->diagrama_procente;
    }

    /**
     * @param mixed $diagrama_procente
     * @return Terminal
     */
    public function setDiagramaProcente($diagrama_procente)
    {
        $this->diagrama_procente = $diagrama_procente;
        return $this;
    }


}