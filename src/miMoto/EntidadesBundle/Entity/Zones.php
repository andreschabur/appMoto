<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zones
 *
 * @ORM\Table(name="zones", indexes={@ORM\Index(name="idx_zones_country_id", columns={"zone_country_id"})})
 * @ORM\Entity
 */
class Zones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $zoneId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_country_id", type="integer", nullable=false)
     */
    private $zoneCountryId;

    /**
     * @var string
     *
     * @ORM\Column(name="zone_code", type="string", length=32, nullable=false)
     */
    private $zoneCode;

    /**
     * @var string
     *
     * @ORM\Column(name="zone_name", type="string", length=255, nullable=false)
     */
    private $zoneName;



    /**
     * Get zoneId
     *
     * @return integer 
     */
    public function getZoneId()
    {
        return $this->zoneId;
    }

    /**
     * Set zoneCountryId
     *
     * @param integer $zoneCountryId
     * @return Zones
     */
    public function setZoneCountryId($zoneCountryId)
    {
        $this->zoneCountryId = $zoneCountryId;

        return $this;
    }

    /**
     * Get zoneCountryId
     *
     * @return integer 
     */
    public function getZoneCountryId()
    {
        return $this->zoneCountryId;
    }

    /**
     * Set zoneCode
     *
     * @param string $zoneCode
     * @return Zones
     */
    public function setZoneCode($zoneCode)
    {
        $this->zoneCode = $zoneCode;

        return $this;
    }

    /**
     * Get zoneCode
     *
     * @return string 
     */
    public function getZoneCode()
    {
        return $this->zoneCode;
    }

    /**
     * Set zoneName
     *
     * @param string $zoneName
     * @return Zones
     */
    public function setZoneName($zoneName)
    {
        $this->zoneName = $zoneName;

        return $this;
    }

    /**
     * Get zoneName
     *
     * @return string 
     */
    public function getZoneName()
    {
        return $this->zoneName;
    }
}
