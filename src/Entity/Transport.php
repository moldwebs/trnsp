<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_transport")
 */

class Transport extends AppEntity
{
    /**
     * @ORM\Column(type="TransportType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\Type\TransportType")
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="Owner")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    protected $owner;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $model;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $model_fp;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vin_cod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $anul;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $consum;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $kilometraj;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_asigurare;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $termen_testare;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Transport
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     * @return Transport
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Transport
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return Transport
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModelFp()
    {
        return $this->model_fp;
    }

    /**
     * @param mixed $model_fp
     * @return Transport
     */
    public function setModelFp($model_fp)
    {
        $this->model_fp = $model_fp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVinCod()
    {
        return $this->vin_cod;
    }

    /**
     * @param mixed $vin_cod
     * @return Transport
     */
    public function setVinCod($vin_cod)
    {
        $this->vin_cod = $vin_cod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnul()
    {
        return $this->anul;
    }

    /**
     * @param mixed $anul
     * @return Transport
     */
    public function setAnul($anul)
    {
        $this->anul = $anul;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsum()
    {
        return $this->consum;
    }

    /**
     * @param mixed $consum
     * @return Transport
     */
    public function setConsum($consum)
    {
        $this->consum = $consum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKilometraj()
    {
        return $this->kilometraj;
    }

    /**
     * @param mixed $kilometraj
     * @return Transport
     */
    public function setKilometraj($kilometraj)
    {
        $this->kilometraj = $kilometraj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenAsigurare()
    {
        return $this->termen_asigurare;
    }

    /**
     * @param mixed $termen_asigurare
     * @return Transport
     */
    public function setTermenAsigurare($termen_asigurare)
    {
        $this->termen_asigurare = $termen_asigurare;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermenTestare()
    {
        return $this->termen_testare;
    }

    /**
     * @param mixed $termen_testare
     * @return Transport
     */
    public function setTermenTestare($termen_testare)
    {
        $this->termen_testare = $termen_testare;
        return $this;
    }

}