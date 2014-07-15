<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AddressFormat
 *
 * @ORM\Table(name="address_format")
 * @ORM\Entity
 */
class AddressFormat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="address_format_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressFormatId;

    /**
     * @var string
     *
     * @ORM\Column(name="address_format", type="string", length=128, nullable=false)
     */
    private $addressFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="address_summary", type="string", length=48, nullable=false)
     */
    private $addressSummary;



    /**
     * Get addressFormatId
     *
     * @return integer 
     */
    public function getAddressFormatId()
    {
        return $this->addressFormatId;
    }

    /**
     * Set addressFormat
     *
     * @param string $addressFormat
     * @return AddressFormat
     */
    public function setAddressFormat($addressFormat)
    {
        $this->addressFormat = $addressFormat;

        return $this;
    }

    /**
     * Get addressFormat
     *
     * @return string 
     */
    public function getAddressFormat()
    {
        return $this->addressFormat;
    }

    /**
     * Set addressSummary
     *
     * @param string $addressSummary
     * @return AddressFormat
     */
    public function setAddressSummary($addressSummary)
    {
        $this->addressSummary = $addressSummary;

        return $this;
    }

    /**
     * Get addressSummary
     *
     * @return string 
     */
    public function getAddressSummary()
    {
        return $this->addressSummary;
    }
}
