<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxClass
 *
 * @ORM\Table(name="tax_class")
 * @ORM\Entity
 */
class TaxClass
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tax_class_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxClassId;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_class_title", type="string", length=32, nullable=false)
     */
    private $taxClassTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_class_description", type="string", length=255, nullable=false)
     */
    private $taxClassDescription;

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
     * Get taxClassId
     *
     * @return integer 
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * Set taxClassTitle
     *
     * @param string $taxClassTitle
     * @return TaxClass
     */
    public function setTaxClassTitle($taxClassTitle)
    {
        $this->taxClassTitle = $taxClassTitle;

        return $this;
    }

    /**
     * Get taxClassTitle
     *
     * @return string 
     */
    public function getTaxClassTitle()
    {
        return $this->taxClassTitle;
    }

    /**
     * Set taxClassDescription
     *
     * @param string $taxClassDescription
     * @return TaxClass
     */
    public function setTaxClassDescription($taxClassDescription)
    {
        $this->taxClassDescription = $taxClassDescription;

        return $this;
    }

    /**
     * Get taxClassDescription
     *
     * @return string 
     */
    public function getTaxClassDescription()
    {
        return $this->taxClassDescription;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return TaxClass
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
     * @return TaxClass
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
