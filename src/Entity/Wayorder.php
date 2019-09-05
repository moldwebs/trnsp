<?php

namespace App\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * @ORM\Entity
 * @Entity(repositoryClass="App\Repository\WayorderRepository")
 * @ORM\Table(name="wb_wayorder")
 */

class Wayorder extends AppEntity
{

    /**
     * @ORM\Column(type="string")
     */
    protected $seria;

    /**
     * @ORM\Column(type="string")
     */
    protected $numar_fp;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_start;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_end;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\Column(type="string")
     */
    protected $destination;

    /**
     * @ORM\ManyToOne(targetEntity="Driver")
     * @ORM\JoinColumn(name="driver_id", referencedColumnName="id")
     */
    protected $driver;

    /**
     * @ORM\ManyToOne(targetEntity="Transport")
     * @ORM\JoinColumn(name="transport_id", referencedColumnName="id")
     */
    protected $transport;

    /**
     * @ORM\Column(type="float")
     */
    protected $motorina;

    /**
     * @ORM\Column(type="float")
     */
    protected $motorina_rest;

    /**
     * @ORM\Column(type="time")
     */
    protected $ore_lucru;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notes;

    /**
     * @return mixed
     */
    public function getSeria()
    {
        return $this->seria;
    }

    /**
     * @param mixed $seria
     * @return Wayorder
     */
    public function setSeria($seria)
    {
        $this->seria = $seria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumarFp()
    {
        return $this->numar_fp;
    }

    /**
     * @param mixed $numar_fp
     * @return Wayorder
     */
    public function setNumarFp($numar_fp)
    {
        $this->numar_fp = $numar_fp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     * @return Wayorder
     */
    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     * @return Wayorder
     */
    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     * @return Wayorder
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     * @return Wayorder
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $driver
     * @return Wayorder
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param mixed $transport
     * @return Wayorder
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotorina()
    {
        return $this->motorina;
    }

    /**
     * @param mixed $motorina
     * @return Wayorder
     */
    public function setMotorina($motorina)
    {
        $this->motorina = $motorina;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotorinaRest()
    {
        return $this->motorina_rest;
    }

    /**
     * @param mixed $motorina_rest
     * @return Wayorder
     */
    public function setMotorinaRest($motorina_rest)
    {
        $this->motorina_rest = $motorina_rest;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOreLucru()
    {
        return $this->ore_lucru;
    }

    /**
     * @param mixed $ore_lucru
     * @return Wayorder
     */
    public function setOreLucru($ore_lucru)
    {
        $this->ore_lucru = $ore_lucru;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     * @return Wayorder
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

}