<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsOptionsValuesToProductsOptions
 *
 * @ORM\Table(name="products_options_values_to_products_options")
 * @ORM\Entity
 */
class ProductsOptionsValuesToProductsOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_values_to_products_options_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productsOptionsValuesToProductsOptionsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_id", type="integer", nullable=false)
     */
    private $productsOptionsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_values_id", type="integer", nullable=false)
     */
    private $productsOptionsValuesId;



    /**
     * Get productsOptionsValuesToProductsOptionsId
     *
     * @return integer 
     */
    public function getProductsOptionsValuesToProductsOptionsId()
    {
        return $this->productsOptionsValuesToProductsOptionsId;
    }

    /**
     * Set productsOptionsId
     *
     * @param integer $productsOptionsId
     * @return ProductsOptionsValuesToProductsOptions
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
     * Set productsOptionsValuesId
     *
     * @param integer $productsOptionsValuesId
     * @return ProductsOptionsValuesToProductsOptions
     */
    public function setProductsOptionsValuesId($productsOptionsValuesId)
    {
        $this->productsOptionsValuesId = $productsOptionsValuesId;

        return $this;
    }

    /**
     * Get productsOptionsValuesId
     *
     * @return integer 
     */
    public function getProductsOptionsValuesId()
    {
        return $this->productsOptionsValuesId;
    }
}
