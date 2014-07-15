<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsDescription
 *
 * @ORM\Table(name="products_description", indexes={@ORM\Index(name="products_name", columns={"products_name"})})
 * @ORM\Entity
 */
class ProductsDescription
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
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="products_name", type="string", length=64, nullable=false)
     */
    private $productsName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="products_description", type="text", nullable=true)
     */
    private $productsDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="products_url", type="string", length=255, nullable=true)
     */
    private $productsUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_viewed", type="integer", nullable=true)
     */
    private $productsViewed = '0';



    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return ProductsDescription
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
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductsDescription
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
     * Set productsName
     *
     * @param string $productsName
     * @return ProductsDescription
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
     * Set productsDescription
     *
     * @param string $productsDescription
     * @return ProductsDescription
     */
    public function setProductsDescription($productsDescription)
    {
        $this->productsDescription = $productsDescription;

        return $this;
    }

    /**
     * Get productsDescription
     *
     * @return string 
     */
    public function getProductsDescription()
    {
        return $this->productsDescription;
    }

    /**
     * Set productsUrl
     *
     * @param string $productsUrl
     * @return ProductsDescription
     */
    public function setProductsUrl($productsUrl)
    {
        $this->productsUrl = $productsUrl;

        return $this;
    }

    /**
     * Get productsUrl
     *
     * @return string 
     */
    public function getProductsUrl()
    {
        return $this->productsUrl;
    }

    /**
     * Set productsViewed
     *
     * @param integer $productsViewed
     * @return ProductsDescription
     */
    public function setProductsViewed($productsViewed)
    {
        $this->productsViewed = $productsViewed;

        return $this;
    }

    /**
     * Get productsViewed
     *
     * @return integer 
     */
    public function getProductsViewed()
    {
        return $this->productsViewed;
    }
}
