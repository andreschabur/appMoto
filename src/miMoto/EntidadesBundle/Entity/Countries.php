<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="countries", indexes={@ORM\Index(name="IDX_COUNTRIES_NAME", columns={"countries_name"})})
 * @ORM\Entity
 */
class Countries
{
    /**
     * @var integer
     *
     * @ORM\Column(name="countries_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countriesId;

    /**
     * @var string
     *
     * @ORM\Column(name="countries_name", type="string", length=255, nullable=false)
     */
    private $countriesName;

    /**
     * @var string
     *
     * @ORM\Column(name="countries_iso_code_2", type="string", length=2, nullable=false)
     */
    private $countriesIsoCode2;

    /**
     * @var string
     *
     * @ORM\Column(name="countries_iso_code_3", type="string", length=3, nullable=false)
     */
    private $countriesIsoCode3;

    /**
     * @var integer
     *
     * @ORM\Column(name="address_format_id", type="integer", nullable=false)
     */
    private $addressFormatId;



    /**
     * Get countriesId
     *
     * @return integer 
     */
    public function getCountriesId()
    {
        return $this->countriesId;
    }

    /**
     * Set countriesName
     *
     * @param string $countriesName
     * @return Countries
     */
    public function setCountriesName($countriesName)
    {
        $this->countriesName = $countriesName;

        return $this;
    }

    /**
     * Get countriesName
     *
     * @return string 
     */
    public function getCountriesName()
    {
        return $this->countriesName;
    }

    /**
     * Set countriesIsoCode2
     *
     * @param string $countriesIsoCode2
     * @return Countries
     */
    public function setCountriesIsoCode2($countriesIsoCode2)
    {
        $this->countriesIsoCode2 = $countriesIsoCode2;

        return $this;
    }

    /**
     * Get countriesIsoCode2
     *
     * @return string 
     */
    public function getCountriesIsoCode2()
    {
        return $this->countriesIsoCode2;
    }

    /**
     * Set countriesIsoCode3
     *
     * @param string $countriesIsoCode3
     * @return Countries
     */
    public function setCountriesIsoCode3($countriesIsoCode3)
    {
        $this->countriesIsoCode3 = $countriesIsoCode3;

        return $this;
    }

    /**
     * Get countriesIsoCode3
     *
     * @return string 
     */
    public function getCountriesIsoCode3()
    {
        return $this->countriesIsoCode3;
    }

    /**
     * Set addressFormatId
     *
     * @param integer $addressFormatId
     * @return Countries
     */
    public function setAddressFormatId($addressFormatId)
    {
        $this->addressFormatId = $addressFormatId;

        return $this;
    }

    /**
     * Get addressFormatId
     *
     * @return integer 
     */
    public function getAddressFormatId()
    {
        return $this->addressFormatId;
    }
}
