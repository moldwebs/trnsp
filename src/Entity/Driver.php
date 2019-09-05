<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_drivers")
 */

class Driver extends AppEntity
{

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nr_matricol;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $idnp;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $data_nasterii;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_permis;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_medic;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_narcolog;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_competenta;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_procura;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Driver
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrMatricol()
    {
        return $this->nr_matricol;
    }

    /**
     * @param mixed $nr_matricol
     * @return Driver
     */
    public function setNrMatricol($nr_matricol)
    {
        $this->nr_matricol = $nr_matricol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdnp()
    {
        return $this->idnp;
    }

    /**
     * @param mixed $idnp
     * @return Driver
     */
    public function setIdnp($idnp)
    {
        $this->idnp = $idnp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataNasterii()
    {
        return $this->data_nasterii;
    }

    /**
     * @param mixed $data_nasterii
     * @return Driver
     */
    public function setDataNasterii($data_nasterii)
    {
        $this->data_nasterii = $data_nasterii;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenPermis()
    {
        return $this->termen_permis;
    }

    /**
     * @param mixed $termen_permis
     * @return Driver
     */
    public function setTermenPermis($termen_permis)
    {
        $this->termen_permis = $termen_permis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenMedic()
    {
        return $this->termen_medic;
    }

    /**
     * @param mixed $termen_medic
     * @return Driver
     */
    public function setTermenMedic($termen_medic)
    {
        $this->termen_medic = $termen_medic;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenNarcolog()
    {
        return $this->termen_narcolog;
    }

    /**
     * @param mixed $termen_narcolog
     * @return Driver
     */
    public function setTermenNarcolog($termen_narcolog)
    {
        $this->termen_narcolog = $termen_narcolog;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenCompetenta()
    {
        return $this->termen_competenta;
    }

    /**
     * @param mixed $termen_competenta
     * @return Driver
     */
    public function setTermenCompetenta($termen_competenta)
    {
        $this->termen_competenta = $termen_competenta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenProcura()
    {
        return $this->termen_procura;
    }

    /**
     * @param mixed $termen_procura
     * @return Driver
     */
    public function setTermenProcura($termen_procura)
    {
        $this->termen_procura = $termen_procura;
        return $this;
    }



}