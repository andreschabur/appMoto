<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories", indexes={@ORM\Index(name="idx_categories_parent_id", columns={"parent_id"})})
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="categories_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoriesId;

    /**
     * @var string
     *
     * @ORM\Column(name="categories_image", type="string", length=64, nullable=true)
     */
    private $categoriesImage;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=true)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;



    /**
     * Get categoriesId
     *
     * @return integer 
     */
    public function getCategoriesId()
    {
        return $this->categoriesId;
    }

    /**
     * Set categoriesImage
     *
     * @param string $categoriesImage
     * @return Categories
     */
    public function setCategoriesImage($categoriesImage)
    {
        $this->categoriesImage = $categoriesImage;

        return $this;
    }

    /**
     * Get categoriesImage
     *
     * @return string 
     */
    public function getCategoriesImage()
    {
        return $this->categoriesImage;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Categories
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Categories
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Categories
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Categories
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }
}
