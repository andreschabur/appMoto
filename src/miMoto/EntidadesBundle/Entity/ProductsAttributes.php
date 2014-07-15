<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsAttributes
 *
 * @ORM\Table(name="products_attributes", indexes={@ORM\Index(name="idx_products_attributes_products_id", columns={"products_id"})})
 * @ORM\Entity
 */
class ProductsAttributes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_attributes_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productsAttributesId;
    
    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="products_id")
     * })
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="options_id", type="integer", nullable=false)
     */
    private $optionsId;

    /**
     * @var string
     *
     * @ORM\Column(name="options_label", type="string", length=255, nullable=false)
     */
    private $optionsLabel;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="category_label", type="string", length=255, nullable=false)
     */
    private $categoryLabel;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="option_status", type="boolean", nullable=false)
     */
    private $optionStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="options_values_id", type="integer", nullable=false)
     */
    private $optionsValuesId;

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
     * Get productsAttributesId
     *
     * @return integer 
     */
    public function getProductsAttributesId()
    {
        return $this->productsAttributesId;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return ProductsAttributes
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
     * Set optionsId
     *
     * @param integer $optionsId
     * @return ProductsAttributes
     */
    public function setOptionsId($optionsId)
    {
        $this->optionsId = $optionsId;

        return $this;
    }

    /**
     * Get optionsId
     *
     * @return integer 
     */
    public function getOptionsId()
    {
        return $this->optionsId;
    }
    
    public function getOptionsLabel() {
        return $this->optionsLabel;
    }

    public function setOptionsLabel($optionsLabel) {
        $this->optionsLabel = $optionsLabel;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryLabel() {
        return $this->categoryLabel;
    }

    public function setCategoryLabel($categoryLabel) {
        $this->categoryLabel = $categoryLabel;
    }
    
    public function getOptionStatus() {
        return $this->optionStatus;
    }

    public function setOptionStatus($optionStatus) {
        $this->optionStatus = $optionStatus;
    }

        
    /**
     * Set optionsValuesId
     *
     * @param integer $optionsValuesId
     * @return ProductsAttributes
     */
    public function setOptionsValuesId($optionsValuesId)
    {
        $this->optionsValuesId = $optionsValuesId;

        return $this;
    }

    /**
     * Get optionsValuesId
     *
     * @return integer 
     */
    public function getOptionsValuesId()
    {
        return $this->optionsValuesId;
    }

    /**
     * Set optionsValuesPrice
     *
     * @param string $optionsValuesPrice
     * @return ProductsAttributes
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
     * @return ProductsAttributes
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
