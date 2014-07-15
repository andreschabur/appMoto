<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsNotifications
 *
 * @ORM\Table(name="products_notifications")
 * @ORM\Entity
 */
class ProductsNotifications
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $customersId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;



    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return ProductsNotifications
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
     * Set customersId
     *
     * @param integer $customersId
     * @return ProductsNotifications
     */
    public function setCustomersId($customersId)
    {
        $this->customersId = $customersId;

        return $this;
    }

    /**
     * Get customersId
     *
     * @return integer 
     */
    public function getCustomersId()
    {
        return $this->customersId;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return ProductsNotifications
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
