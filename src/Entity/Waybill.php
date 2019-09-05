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
 * @Entity(repositoryClass="App\Repository\WaybillRepository")
 * @ORM\Table(name="wb_waybill")
 */

class Waybill extends AppEntity
{

    const ORE_SOFER = ['0' => 'Sofer 1', '1' => 'Sofer 2'];
    const TIP_CURSA = ['0' => 'CURSA NORMALA', '1' => 'CURSA ANULATA'];

    /**
     * @ORM\Column(type="string")
     */
    protected $seria;

    /**
     * @ORM\Column(type="string")
     */
    protected $numar_fp;

    /**
     * @ORM\Column(type="string")
     */
    protected $numar_beb;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_start;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    protected $hour_start;

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
     * @ORM\ManyToOne(targetEntity="Destination")
     * @ORM\JoinColumn(name="destination_id", referencedColumnName="id")
     */
    protected $destination;

    /**
     * @ORM\ManyToOne(targetEntity="Terminal")
     * @ORM\JoinColumn(name="terminal_id", referencedColumnName="id")
     */
    protected $terminal;

    /**
     * @ORM\ManyToOne(targetEntity="Trip")
     * @ORM\JoinColumn(name="trip_id", referencedColumnName="id")
     */
    protected $trip;

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
     * @ORM\ManyToOne(targetEntity="Driver")
     * @ORM\JoinColumn(name="driver_extra_id", referencedColumnName="id")
     */
    protected $driver_extra;

    /**
     * @ORM\Column(type="float")
     */
    protected $motorina;

    /**
     * @ORM\Column(type="float")
     */
    protected $motorina_rest;

    /**
     * @ORM\Column(type="float")
     */
    protected $plan;

    /**
     * @ORM\Column(type="time")
     */
    protected $ore_lucru;

    /**
     * @ORM\Column(type="time")
     */
    protected $ora_retur;

    /**
     * @ORM\Column(type="integer")
     */
    protected $ore_sofer = 0;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notes;

     /**
     * @ORM\Column(type="smallint")
     */
    protected $tp = 1;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $motorina_plecare;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $motorina_consumata;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $km_start;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $km_end;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $km_parcurs;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $plan_defacto;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $plan_brut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $diagrama_qnt;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $diagrama_amount;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $annulled = 0;

    /**
     * @return mixed
     */
    public function getSeria()
    {
        return $this->seria;
    }

    /**
     * @param mixed $seria
     * @return Waybill
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
     * @return Waybill
     */
    public function setNumarFp($numar_fp)
    {
        $this->numar_fp = $numar_fp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumarBeb()
    {
        return $this->numar_beb;
    }

    /**
     * @param mixed $numar_beb
     * @return Waybill
     */
    public function setNumarBeb($numar_beb)
    {
        $this->numar_beb = $numar_beb;
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
     * @return Waybill
     */
    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
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
     * @return Waybill
     */
    public function setHourStart($hour_start)
    {
        $this->hour_start = $hour_start;
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
     * @return Waybill
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
     * @return Waybill
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
     * @return Waybill
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
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
     * @return Waybill
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * @param mixed $trip
     * @return Waybill
     */
    public function setTrip($trip)
    {
        $this->trip = $trip;
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
     * @return Waybill
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
     * @return Waybill
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDriverExtra()
    {
        return $this->driver_extra;
    }

    /**
     * @param mixed $driver_extra
     * @return Waybill
     */
    public function setDriverExtra($driver_extra)
    {
        $this->driver_extra = $driver_extra;
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
     * @return Waybill
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
     * @return Waybill
     */
    public function setMotorinaRest($motorina_rest)
    {
        $this->motorina_rest = $motorina_rest;
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
     * @return Waybill
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
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
     * @return Waybill
     */
    public function setOreLucru($ore_lucru)
    {
        $this->ore_lucru = $ore_lucru;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOraRetur()
    {
        return $this->ora_retur;
    }

    /**
     * @param mixed $ora_retur
     * @return Waybill
     */
    public function setOraRetur($ora_retur)
    {
        $this->ora_retur = $ora_retur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOreSofer()
    {
        return $this->ore_sofer;
    }

    /**
     * @param mixed $ore_sofer
     * @return Waybill
     */
    public function setOreSofer($ore_sofer)
    {
        $this->ore_sofer = $ore_sofer;
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
     * @return Waybill
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotorinaPlecare()
    {
        return $this->motorina_plecare;
    }

    /**
     * @param mixed $motorina_plecare
     * @return Waybill
     */
    public function setMotorinaPlecare($motorina_plecare)
    {
        $this->motorina_plecare = $motorina_plecare;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotorinaConsumata()
    {
        return $this->motorina_consumata;
    }

    /**
     * @param mixed $motorina_consumata
     * @return Waybill
     */
    public function setMotorinaConsumata($motorina_consumata)
    {
        $this->motorina_consumata = $motorina_consumata;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKmStart()
    {
        return $this->km_start;
    }

    /**
     * @param mixed $km_start
     * @return Waybill
     */
    public function setKmStart($km_start)
    {
        $this->km_start = $km_start;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKmEnd()
    {
        return $this->km_end;
    }

    /**
     * @param mixed $km_end
     * @return Waybill
     */
    public function setKmEnd($km_end)
    {
        $this->km_end = $km_end;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKmParcurs()
    {
        return $this->km_parcurs;
    }

    /**
     * @param mixed $km_parcurs
     * @return Waybill
     */
    public function setKmParcurs($km_parcurs)
    {
        $this->km_parcurs = $km_parcurs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanDefacto()
    {
        return $this->plan_defacto;
    }

    /**
     * @param mixed $plan_defacto
     * @return Waybill
     */
    public function setPlanDefacto($plan_defacto)
    {
        $this->plan_defacto = $plan_defacto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanBrut()
    {
        return $this->plan_brut;
    }

    /**
     * @param mixed $plan_brut
     * @return Waybill
     */
    public function setPlanBrut($plan_brut)
    {
        $this->plan_brut = $plan_brut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiagramaQnt()
    {
        return $this->diagrama_qnt;
    }

    /**
     * @param mixed $diagrama_qnt
     * @return Waybill
     */
    public function setDiagramaQnt($diagrama_qnt)
    {
        $this->diagrama_qnt = $diagrama_qnt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiagramaAmount()
    {
        return $this->diagrama_amount;
    }

    /**
     * @param mixed $diagrama_amount
     * @return Waybill
     */
    public function setDiagramaAmount($diagrama_amount)
    {
        $this->diagrama_amount = $diagrama_amount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnnulled()
    {
        return $this->annulled;
    }

    /**
     * @param mixed $annulled
     * @return Waybill
     */
    public function setAnnulled($annulled)
    {
        $this->annulled = $annulled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * @param mixed $tp
     * @return Waybill
     */
    public function setTp($tp)
    {
        $this->tp = $tp;
        return $this;
    }

}