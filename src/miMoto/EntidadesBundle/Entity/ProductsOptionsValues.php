<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsOptionsValues
 *
 * @ORM\Table(name="products_options_values")
 * @ORM\Entity
 */
class ProductsOptionsValues
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_values_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $productsOptionsValuesId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="products_options_values_name", type="string", length=64, nullable=false)
     */
    private $productsOptionsValuesName = '';



    /**
     * Set productsOptionsValuesId
     *
     * @param integer $productsOptionsValuesId
     * @return ProductsOptionsValues
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

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductsOptionsValues
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set productsOptionsValuesName
     *
     * @param string $productsOptionsValuesName
     * @return ProductsOptionsValues
     */
    public function setProductsOptionsValuesName($productsOptionsValuesName)
    {
        $this->productsOptionsValuesName = $productsOptionsValuesName;

        return $this;
    }

    /**
     * Get productsOptionsValuesName
     *
     * @return string 
     */
    public function getProductsOptionsValuesName()
    {
        return $this->productsOptionsValuesName;
    }
    
    public function __toString() {
        return $this->productsOptionsValuesName;
    }

}
