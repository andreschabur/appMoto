<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersBasket
 *
 * @ORM\Table(name="customers_basket", indexes={@ORM\Index(name="idx_customers_basket_customers_id", columns={"customers_id"})})
 * @ORM\Entity
 */
class CustomersBasket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customers_basket_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customersBasketId;

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
     * @ORM\Column(name="customers_basket_quantity", type="integer", nullable=false)
     */
    private $customersBasketQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="final_price", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $finalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_basket_date_added", type="string", length=8, nullable=true)
     */
    private $customersBasketDateAdded;



    /**
     * Get customersBasketId
     *
     * @return integer 
     */
    public function getCustomersBasketId()
    {
        return $this->customersBasketId;
    }

    /**
     * Set customersId
     *
     * @param integer $customersId
     * @return CustomersBasket
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
     * @return CustomersBasket
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
     * Set customersBasketQuantity
     *
     * @param integer $customersBasketQuantity
     * @return CustomersBasket
     */
    public function setCustomersBasketQuantity($customersBasketQuantity)
    {
        $this->customersBasketQuantity = $customersBasketQuantity;

        return $this;
    }

    /**
     * Get customersBasketQuantity
     *
     * @return integer 
     */
    public function getCustomersBasketQuantity()
    {
        return $this->customersBasketQuantity;
    }

    /**
     * Set finalPrice
     *
     * @param string $finalPrice
     * @return CustomersBasket
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
     * Set customersBasketDateAdded
     *
     * @param string $customersBasketDateAdded
     * @return CustomersBasket
     */
    public function setCustomersBasketDateAdded($customersBasketDateAdded)
    {
        $this->customersBasketDateAdded = $customersBasketDateAdded;

        return $this;
    }

    /**
     * Get customersBasketDateAdded
     *
     * @return string 
     */
    public function getCustomersBasketDateAdded()
    {
        return $this->customersBasketDateAdded;
    }
}
