<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specials
 *
 * @ORM\Table(name="specials", indexes={@ORM\Index(name="idx_specials_products_id", columns={"products_id"})})
 * @ORM\Entity
 */
class Specials
{
    /**
     * @var integer
     *
     * @ORM\Column(name="specials_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $specialsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_id", type="integer", nullable=false)
     */
    private $productsId;

    /**
     * @var string
     *
     * @ORM\Column(name="specials_new_products_price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $specialsNewProductsPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="specials_date_added", type="datetime", nullable=true)
     */
    private $specialsDateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="specials_last_modified", type="datetime", nullable=true)
     */
    private $specialsLastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_date", type="datetime", nullable=true)
     */
    private $expiresDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_status_change", type="datetime", nullable=true)
     */
    private $dateStatusChange;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';



    /**
     * Get specialsId
     *
     * @return integer 
     */
    public function getSpecialsId()
    {
        return $this->specialsId;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return Specials
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return integer 
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set specialsNewProductsPrice
     *
     * @param string $specialsNewProductsPrice
     * @return Specials
     */
    public function setSpecialsNewProductsPrice($specialsNewProductsPrice)
    {
        $this->specialsNewProductsPrice = $specialsNewProductsPrice;

        return $this;
    }

    /**
     * Get specialsNewProductsPrice
     *
     * @return string 
     */
    public function getSpecialsNewProductsPrice()
    {
        return $this->specialsNewProductsPrice;
    }

    /**
     * Set specialsDateAdded
     *
     * @param \DateTime $specialsDateAdded
     * @return Specials
     */
    public function setSpecialsDateAdded($specialsDateAdded)
    {
        $this->specialsDateAdded = $specialsDateAdded;

        return $this;
    }

    /**
     * Get specialsDateAdded
     *
     * @return \DateTime 
     */
    public function getSpecialsDateAdded()
    {
        return $this->specialsDateAdded;
    }

    /**
     * Set specialsLastModified
     *
     * @param \DateTime $specialsLastModified
     * @return Specials
     */
    public function setSpecialsLastModified($specialsLastModified)
    {
        $this->specialsLastModified = $specialsLastModified;

        return $this;
    }

    /**
     * Get specialsLastModified
     *
     * @return \DateTime 
     */
    public function getSpecialsLastModified()
    {
        return $this->specialsLastModified;
    }

    /**
     * Set expiresDate
     *
     * @param \DateTime $expiresDate
     * @return Specials
     */
    public function setExpiresDate($expiresDate)
    {
        $this->expiresDate = $expiresDate;

        return $this;
    }

    /**
     * Get expiresDate
     *
     * @return \DateTime 
     */
    public function getExpiresDate()
    {
        return $this->expiresDate;
    }

    /**
     * Set dateStatusChange
     *
     * @param \DateTime $dateStatusChange
     * @return Specials
     */
    public function setDateStatusChange($dateStatusChange)
    {
        $this->dateStatusChange = $dateStatusChange;

        return $this;
    }

    /**
     * Get dateStatusChange
     *
     * @return \DateTime 
     */
    public function getDateStatusChange()
    {
        return $this->dateStatusChange;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Specials
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
