<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersBasketAttributes
 *
 * @ORM\Table(name="customers_basket_attributes", indexes={@ORM\Index(name="idx_customers_basket_att_customers_id", columns={"customers_id"})})
 * @ORM\Entity
 */
class CustomersBasketAttributes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customers_basket_attributes_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customersBasketAttributesId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=false)
     */
    private $customersId;

    /**
     * @var string
     *
     * @ORM\Column(name="products_id", type="text", nullable=false)
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_id", type="integer", nullable=false)
     */
    private $productsOptionsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_value_id", type="integer", nullable=false)
     */
    private $productsOptionsValueId;



    /**
     * Get customersBasketAttributesId
     *
     * @return integer 
     */
    public function getCustomersBasketAttributesId()
    {
        return $this->customersBasketAttributesId;
    }

    /**
     * Set customersId
     *
     * @param integer $customersId
     * @return CustomersBasketAttributes
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
     * Set productsId
     *
     * @param string $productsId
     * @return CustomersBasketAttributes
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return string 
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set productsOptionsId
     *
     * @param integer $productsOptionsId
     * @return CustomersBasketAttributes
     */
    public function setProductsOptionsId($productsOptionsId)
    {
        $this->productsOptionsId = $productsOptionsId;

        return $this;
    }

    /**
     * Get productsOptionsId
     *
     * @return integer 
     */
    public function getProductsOptionsId()
    {
        return $this->productsOptionsId;
    }

    /**
     * Set productsOptionsValueId
     *
     * @param integer $productsOptionsValueId
     * @return CustomersBasketAttributes
     */
    public function setProductsOptionsValueId($productsOptionsValueId)
    {
        $this->productsOptionsValueId = $productsOptionsValueId;

        return $this;
    }

    /**
     * Get productsOptionsValueId
     *
     * @return integer 
     */
    public function getProductsOptionsValueId()
    {
        return $this->productsOptionsValueId;
    }
}
