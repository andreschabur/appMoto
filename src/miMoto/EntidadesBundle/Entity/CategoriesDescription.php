<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriesDescription
 *
 * @ORM\Table(name="categories_description", indexes={@ORM\Index(name="idx_categories_name", columns={"categories_name"})})
 * @ORM\Entity
 */
class CategoriesDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="categories_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoriesId = '0';

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
     * @ORM\Column(name="categories_name", type="string", length=32, nullable=false)
     */
    private $categoriesName;



    /**
     * Set categoriesId
     *
     * @param integer $categoriesId
     * @return CategoriesDescription
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

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return CategoriesDescription
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
     * Set categoriesName
     *
     * @param string $categoriesName
     * @return CategoriesDescription
     */
    public function setCategoriesName($categoriesName)
    {
        $this->categoriesName = $categoriesName;

        return $this;
    }

    /**
     * Get categoriesName
     *
     * @return string 
     */
    public function getCategoriesName()
    {
        return $this->categoriesName;
    }
}
