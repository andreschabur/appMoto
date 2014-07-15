<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZonesToGeoZones
 *
 * @ORM\Table(name="zones_to_geo_zones", indexes={@ORM\Index(name="idx_zones_to_geo_zones_country_id", columns={"zone_country_id"})})
 * @ORM\Entity
 */
class ZonesToGeoZones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="association_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $associationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_country_id", type="integer", nullable=false)
     */
    private $zoneCountryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=true)
     */
    private $zoneId;

    /**
     * @var integer
     *
     * @ORM\Column(name="geo_zone_id", type="integer", nullable=true)
     */
    private $geoZoneId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;



    /**
     * Get associationId
     *
     * @return integer 
     */
    public function getAssociationId()
    {
        return $this->associationId;
    }

    /**
     * Set zoneCountryId
     *
     * @param integer $zoneCountryId
     * @return ZonesToGeoZones
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
     * Set zoneId
     *
     * @param integer $zoneId
     * @return ZonesToGeoZones
     */
    public function setZoneId($zoneId)
    {
        $this->zoneId = $zoneId;

        return $this;
    }

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
     * Set geoZoneId
     *
     * @param integer $geoZoneId
     * @return ZonesToGeoZones
     */
    public function setGeoZoneId($geoZoneId)
    {
        $this->geoZoneId = $geoZoneId;

        return $this;
    }

    /**
     * Get geoZoneId
     *
     * @return integer 
     */
    public function getGeoZoneId()
    {
        return $this->geoZoneId;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return ZonesToGeoZones
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return ZonesToGeoZones
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }
}
