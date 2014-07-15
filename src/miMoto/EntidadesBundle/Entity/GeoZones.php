<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoZones
 *
 * @ORM\Table(name="geo_zones")
 * @ORM\Entity
 */
class GeoZones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="geo_zone_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $geoZoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="geo_zone_name", type="string", length=32, nullable=false)
     */
    private $geoZoneName;

    /**
     * @var string
     *
     * @ORM\Column(name="geo_zone_description", type="string", length=255, nullable=false)
     */
    private $geoZoneDescription;

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
     * Get geoZoneId
     *
     * @return integer 
     */
    public function getGeoZoneId()
    {
        return $this->geoZoneId;
    }

    /**
     * Set geoZoneName
     *
     * @param string $geoZoneName
     * @return GeoZones
     */
    public function setGeoZoneName($geoZoneName)
    {
        $this->geoZoneName = $geoZoneName;

        return $this;
    }

    /**
     * Get geoZoneName
     *
     * @return string 
     */
    public function getGeoZoneName()
    {
        return $this->geoZoneName;
    }

    /**
     * Set geoZoneDescription
     *
     * @param string $geoZoneDescription
     * @return GeoZones
     */
    public function setGeoZoneDescription($geoZoneDescription)
    {
        $this->geoZoneDescription = $geoZoneDescription;

        return $this;
    }

    /**
     * Get geoZoneDescription
     *
     * @return string 
     */
    public function getGeoZoneDescription()
    {
        return $this->geoZoneDescription;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return GeoZones
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
     * @return GeoZones
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
