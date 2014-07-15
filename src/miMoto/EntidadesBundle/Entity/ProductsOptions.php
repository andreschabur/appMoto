<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsOptions
 *
 * @ORM\Table(name="products_options")
 * @ORM\Entity
 */
class ProductsOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_options_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $productsOptionsId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)          
     */
    private $languageId = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="products_options_name", type="string", length=32, nullable=false)
     */
    private $productsOptionsName = '';
    
    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $categoryId;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;



    /**
     * Set productsOptionsId
     *
     * @param integer $productsOptionsId
     * @return ProductsOptions
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
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductsOptions
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
     * Set productsOptionsName
     *
     * @param string $productsOptionsName
     * @return ProductsOptions
     */
    public function setProductsOptionsName($productsOptionsName)
    {
        $this->productsOptionsName = $productsOptionsName;

        return $this;
    }

    /**
     * Get productsOptionsName
     *
     * @return string 
     */
    public function getProductsOptionsName()
    {
        return $this->productsOptionsName;
    }
    
    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    
        
    public function __toString() {
        return $this->productsOptionsName;
    }

}
