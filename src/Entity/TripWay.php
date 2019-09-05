<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_tripway")
 */

class TripWay extends AppEntity
{

    /**
     * @ORM\Column(type="TransportType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\Type\TransportType")
     */
    protected $transport_type;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\ManyToOne(targetEntity="Terminal")
     * @ORM\JoinColumn(name="terminal_id", referencedColumnName="id")
     */
    protected $terminal;

    /**
     * @ORM\ManyToOne(targetEntity="Destination")
     * @ORM\JoinColumn(name="destination_id", referencedColumnName="id")
     */
    protected $destination;

    /**
     * @ORM\Column(type="time")
     */
    protected $ore_lucru;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $motorina;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $distanta;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $venit;

    /**
     * @return mixed
     */
    public function getTransportType()
    {
        return $this->transport_type;
    }

    /**
     * @param mixed $transport_type
     * @return TripWay
     */
    public function setTransportType($transport_type)
    {
        $this->transport_type = $transport_type;
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
     * @return TripWay
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param mixed $terminal
     * @return TripWay
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;
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
     * @return TripWay
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
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
     * @return TripWay
     */
    public function setOreLucru($ore_lucru)
    {
        $this->ore_lucru = $ore_lucru;
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
     * @return TripWay
     */
    public function setMotorina($motorina)
    {
        $this->motorina = $motorina;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistanta()
    {
        return $this->distanta;
    }

    /**
     * @param mixed $distanta
     * @return TripWay
     */
    public function setDistanta($distanta)
    {
        $this->distanta = $distanta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenit()
    {
        return $this->venit;
    }

    /**
     * @param mixed $venit
     * @return TripWay
     */
    public function setVenit($venit)
    {
        $this->venit = $venit;
        return $this;
    }

}