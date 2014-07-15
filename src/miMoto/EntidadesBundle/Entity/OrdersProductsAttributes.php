<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersProductsAttributes
 *
 * @ORM\Table(name="orders_products_attributes", indexes={@ORM\Index(name="idx_orders_products_att_orders_id", columns={"orders_id"})})
 * @ORM\Entity
 */
class OrdersProductsAttributes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_products_attributes_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersProductsAttributesId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     */
    private $ordersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_products_id", type="integer", nullable=false)
     */
    private $ordersProductsId;

    /**
     * @var string
     *
     * @ORM\Column(name="products_options", type="string", length=32, nullable=false)
     */
    private $productsOptions;

    /**
     * @var string
     *
     * @ORM\Column(name="products_options_values", type="string", length=32, nullable=false)
     */
    private $productsOptionsValues;

    /**
     * @var string
     *
     * @ORM\Column(name="options_values_price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $optionsValuesPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="price_prefix", type="string", length=1, nullable=false)
     */
    private $pricePrefix;



    /**
     * Get ordersProductsAttributesId
     *
     * @return integer 
     */
    public function getOrdersProductsAttributesId()
    {
        return $this->ordersProductsAttributesId;
    }

    /**
     * Set ordersId
     *
     * @param integer $ordersId
     * @return OrdersProductsAttributes
     */
    public function setOrdersId($ordersId)
    {
        $this->ordersId = $ordersId;

        return $this;
    }

    /**
     * Get ordersId
     *
     * @return integer 
     */
    public function getOrdersId()
    {
        return $this->ordersId;
    }

    /**
     * Set ordersProductsId
     *
     * @param integer $ordersProductsId
     * @return OrdersProductsAttributes
     */
    public function setOrdersProductsId($ordersProductsId)
    {
        $this->ordersProductsId = $ordersProductsId;

        return $this;
    }

    /**
     * Get ordersProductsId
     *
     * @return integer 
     */
    public function getOrdersProductsId()
    {
        return $this->ordersProductsId;
    }

    /**
     * Set productsOptions
     *
     * @param string $productsOptions
     * @return OrdersProductsAttributes
     */
    public function setProductsOptions($productsOptions)
    {
        $this->productsOptions = $productsOptions;

        return $this;
    }

    /**
     * Get productsOptions
     *
     * @return string 
     */
    public function getProductsOptions()
    {
        return $this->productsOptions;
    }

    /**
     * Set productsOptionsValues
     *
     * @param string $productsOptionsValues
     * @return OrdersProductsAttributes
     */
    public function setProductsOptionsValues($productsOptionsValues)
    {
        $this->productsOptionsValues = $productsOptionsValues;

        return $this;
    }

    /**
     * Get productsOptionsValues
     *
     * @return string 
     */
    public function getProductsOptionsValues()
    {
        return $this->productsOptionsValues;
    }

    /**
     * Set optionsValuesPrice
     *
     * @param string $optionsValuesPrice
     * @return OrdersProductsAttributes
     */
    public function setOptionsValuesPrice($optionsValuesPrice)
    {
        $this->optionsValuesPrice = $optionsValuesPrice;

        return $this;
    }

    /**
     * Get optionsValuesPrice
     *
     * @return string 
     */
    public function getOptionsValuesPrice()
    {
        return $this->optionsValuesPrice;
    }

    /**
     * Set pricePrefix
     *
     * @param string $pricePrefix
     * @return OrdersProductsAttributes
     */
    public function setPricePrefix($pricePrefix)
    {
        $this->pricePrefix = $pricePrefix;

        return $this;
    }

    /**
     * Get pricePrefix
     *
     * @return string 
     */
    public function getPricePrefix()
    {
        return $this->pricePrefix;
    }
}
