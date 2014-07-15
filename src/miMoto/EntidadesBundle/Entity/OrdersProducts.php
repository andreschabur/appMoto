<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersProducts
 *
 * @ORM\Table(name="orders_products", indexes={@ORM\Index(name="idx_orders_products_orders_id", columns={"orders_id"}), @ORM\Index(name="idx_orders_products_products_id", columns={"products_id"})})
 * @ORM\Entity
 */
class OrdersProducts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_products_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersProductsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     */
    private $ordersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_id", type="integer", nullable=false)
     */
    private $productsId;

    /**
     * @var string
     *
     * @ORM\Column(name="products_model", type="string", length=12, nullable=true)
     */
    private $productsModel;

    /**
     * @var string
     *
     * @ORM\Column(name="products_name", type="string", length=64, nullable=false)
     */
    private $productsName;

    /**
     * @var string
     *
     * @ORM\Column(name="products_price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $productsPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="final_price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $finalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="products_tax", type="decimal", precision=7, scale=4, nullable=false)
     */
    private $productsTax;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_quantity", type="integer", nullable=false)
     */
    private $productsQuantity;



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
     * Set ordersId
     *
     * @param integer $ordersId
     * @return OrdersProducts
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
     * Set productsId
     *
     * @param integer $productsId
     * @return OrdersProducts
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
     * Set productsModel
     *
     * @param string $productsModel
     * @return OrdersProducts
     */
    public function setProductsModel($productsModel)
    {
        $this->productsModel = $productsModel;

        return $this;
    }

    /**
     * Get productsModel
     *
     * @return string 
     */
    public function getProductsModel()
    {
        return $this->productsModel;
    }

    /**
     * Set productsName
     *
     * @param string $productsName
     * @return OrdersProducts
     */
    public function setProductsName($productsName)
    {
        $this->productsName = $productsName;

        return $this;
    }

    /**
     * Get productsName
     *
     * @return string 
     */
    public function getProductsName()
    {
        return $this->productsName;
    }

    /**
     * Set productsPrice
     *
     * @param string $productsPrice
     * @return OrdersProducts
     */
    public function setProductsPrice($productsPrice)
    {
        $this->productsPrice = $productsPrice;

        return $this;
    }

    /**
     * Get productsPrice
     *
     * @return string 
     */
    public function getProductsPrice()
    {
        return $this->productsPrice;
    }

    /**
     * Set finalPrice
     *
     * @param string $finalPrice
     * @return OrdersProducts
     */
    public function setFinalPrice($finalPrice)
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    /**
     * Get finalPrice
     *
     * @return string 
     */
    public function getFinalPrice()
    {
        return $this->finalPrice;
    }

    /**
     * Set productsTax
     *
     * @param string $productsTax
     * @return OrdersProducts
     */
    public function setProductsTax($productsTax)
    {
        $this->productsTax = $productsTax;

        return $this;
    }

    /**
     * Get productsTax
     *
     * @return string 
     */
    public function getProductsTax()
    {
        return $this->productsTax;
    }

    /**
     * Set productsQuantity
     *
     * @param integer $productsQuantity
     * @return OrdersProducts
     */
    public function setProductsQuantity($productsQuantity)
    {
        $this->productsQuantity = $productsQuantity;

        return $this;
    }

    /**
     * Get productsQuantity
     *
     * @return integer 
     */
    public function getProductsQuantity()
    {
        return $this->productsQuantity;
    }
}
