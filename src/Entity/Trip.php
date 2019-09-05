<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="wb_trip")
 */

class Trip extends AppEntity
{

    /**
     * @ORM\Column(type="TransportType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\Type\TransportType")
     */
    protected $transport_type;

    /**
     * @ORM\Column(type="simple_array")
     */
    protected $days;

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
     * @ORM\Column(type="decimal")
     */
    protected $plan;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $motorina;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $venit;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $fisa_lunara;

    /**
     * @ORM\Column(type="time")
     */
    protected $hour_start;

    /**
     * @ORM\Column(type="time")
     */
    protected $hour_end;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    protected $work_hours;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    protected $supl_hours;

    /**
     * @return mixed
     */
    public function getTransportType()
    {
        return $this->transport_type;
    }

    /**
     * @param mixed $transport_type
     * @return Trip
     */
    public function setTransportType($transport_type)
    {
        $this->transport_type = $transport_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     * @return Trip
     */
    public function setDays($days)
    {
        $this->days = $days;
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
     * @return Trip
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
     * @return Trip
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
     * @return Trip
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param mixed $plan
     * @return Trip
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
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
     * @return Trip
     */
    public function setMotorina($motorina)
    {
        $this->motorina = $motorina;
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
     * @return Trip
     */
    public function setVenit($venit)
    {
        $this->venit = $venit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFisaLunara()
    {
        return $this->fisa_lunara;
    }

    /**
     * @param mixed $fisa_lunara
     * @return Trip
     */
    public function setFisaLunara($fisa_lunara)
    {
        $this->fisa_lunara = $fisa_lunara;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHourStart()
    {
        return $this->hour_start;
    }

    /**
     * @param mixed $hour_start
     * @return Trip
     */
    public function setHourStart($hour_start)
    {
        $this->hour_start = $hour_start;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHourEnd()
    {
        return $this->hour_end;
    }

    /**
     * @param mixed $hour_end
     * @return Trip
     */
    public function setHourEnd($hour_end)
    {
        $this->hour_end = $hour_end;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkHours()
    {
        return $this->work_hours;
    }

    /**
     * @param mixed $work_hours
     * @return Trip
     */
    public function setWorkHours($work_hours)
    {
        $this->work_hours = $work_hours;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuplHours()
    {
        return $this->supl_hours;
    }

    /**
     * @param mixed $supl_hours
     * @return Trip
     */
    public function setSuplHours($supl_hours)
    {
        $this->supl_hours = $supl_hours;
        return $this;
    }

    public function __toString()
    {
        return $this->hour_start->format('H:i');
    }

}