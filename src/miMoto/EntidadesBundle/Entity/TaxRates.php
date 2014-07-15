<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxRates
 *
 * @ORM\Table(name="tax_rates")
 * @ORM\Entity
 */
class TaxRates
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tax_rates_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxRatesId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_zone_id", type="integer", nullable=false)
     */
    private $taxZoneId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_class_id", type="integer", nullable=false)
     */
    private $taxClassId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_priority", type="integer", nullable=true)
     */
    private $taxPriority = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="tax_rate", type="decimal", precision=7, scale=4, nullable=false)
     */
    private $taxRate;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_description", type="string", length=255, nullable=false)
     */
    private $taxDescription;

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
     * Get taxRatesId
     *
     * @return integer 
     */
    public function getTaxRatesId()
    {
        return $this->taxRatesId;
    }

    /**
     * Set taxZoneId
     *
     * @param integer $taxZoneId
     * @return TaxRates
     */
    public function setTaxZoneId($taxZoneId)
    {
        $this->taxZoneId = $taxZoneId;

        return $this;
    }

    /**
     * Get taxZoneId
     *
     * @return integer 
     */
    public function getTaxZoneId()
    {
        return $this->taxZoneId;
    }

    /**
     * Set taxClassId
     *
     * @param integer $taxClassId
     * @return TaxRates
     */
    public function setTaxClassId($taxClassId)
    {
        $this->taxClassId = $taxClassId;

        return $this;
    }

    /**
     * Get taxClassId
     *
     * @return integer 
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * Set taxPriority
     *
     * @param integer $taxPriority
     * @return TaxRates
     */
    public function setTaxPriority($taxPriority)
    {
        $this->taxPriority = $taxPriority;

        return $this;
    }

    /**
     * Get taxPriority
     *
     * @return integer 
     */
    public function getTaxPriority()
    {
        return $this->taxPriority;
    }

    /**
     * Set taxRate
     *
     * @param string $taxRate
     * @return TaxRates
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return string 
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Set taxDescription
     *
     * @param string $taxDescription
     * @return TaxRates
     */
    public function setTaxDescription($taxDescription)
    {
        $this->taxDescription = $taxDescription;

        return $this;
    }

    /**
     * Get taxDescription
     *
     * @return string 
     */
    public function getTaxDescription()
    {
        return $this->taxDescription;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return TaxRates
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
     * @return TaxRates
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
