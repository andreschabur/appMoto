<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsToCategories
 *
 * @ORM\Table(name="products_to_categories")
 * @ORM\Entity
 */
class ProductsToCategories
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
     * @ORM\Column(name="categories_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoriesId;



    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return ProductsToCategories
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
     * Set categoriesId
     *
     * @param integer $categoriesId
     * @return ProductsToCategories
     */
    public function setCategoriesId($categoriesId)
    {
        $this->categoriesId = $categoriesId;

        return $this;
    }

    /**
     * Get categoriesId
     *
     * @return integer 
     */
    public function getCategoriesId()
    {
        return $this->categoriesId;
    }
}
