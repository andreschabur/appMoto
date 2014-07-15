<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsAttributesDownload
 *
 * @ORM\Table(name="products_attributes_download")
 * @ORM\Entity
 */
class ProductsAttributesDownload
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
     * @var string
     *
     * @ORM\Column(name="products_attributes_filename", type="string", length=255, nullable=false)
     */
    private $productsAttributesFilename = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="products_attributes_maxdays", type="integer", nullable=true)
     */
    private $productsAttributesMaxdays = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="products_attributes_maxcount", type="integer", nullable=true)
     */
    private $productsAttributesMaxcount = '0';



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
     * Set productsAttributesFilename
     *
     * @param string $productsAttributesFilename
     * @return ProductsAttributesDownload
     */
    public function setProductsAttributesFilename($productsAttributesFilename)
    {
        $this->productsAttributesFilename = $productsAttributesFilename;

        return $this;
    }

    /**
     * Get productsAttributesFilename
     *
     * @return string 
     */
    public function getProductsAttributesFilename()
    {
        return $this->productsAttributesFilename;
    }

    /**
     * Set productsAttributesMaxdays
     *
     * @param integer $productsAttributesMaxdays
     * @return ProductsAttributesDownload
     */
    public function setProductsAttributesMaxdays($productsAttributesMaxdays)
    {
        $this->productsAttributesMaxdays = $productsAttributesMaxdays;

        return $this;
    }

    /**
     * Get productsAttributesMaxdays
     *
     * @return integer 
     */
    public function getProductsAttributesMaxdays()
    {
        return $this->productsAttributesMaxdays;
    }

    /**
     * Set productsAttributesMaxcount
     *
     * @param integer $productsAttributesMaxcount
     * @return ProductsAttributesDownload
     */
    public function setProductsAttributesMaxcount($productsAttributesMaxcount)
    {
        $this->productsAttributesMaxcount = $productsAttributesMaxcount;

        return $this;
    }

    /**
     * Get productsAttributesMaxcount
     *
     * @return integer 
     */
    public function getProductsAttributesMaxcount()
    {
        return $this->productsAttributesMaxcount;
    }
}
