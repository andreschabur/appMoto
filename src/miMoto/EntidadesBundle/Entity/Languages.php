<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Languages
 *
 * @ORM\Table(name="languages", indexes={@ORM\Index(name="IDX_LANGUAGES_NAME", columns={"name"})})
 * @ORM\Entity
 */
class Languages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="languages_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $languagesId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=64, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=32, nullable=true)
     */
    private $directory;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;



    /**
     * Get languagesId
     *
     * @return integer 
     */
    public function getLanguagesId()
    {
        return $this->languagesId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Languages
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Languages
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Languages
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set directory
     *
     * @param string $directory
     * @return Languages
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string 
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Languages
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
}
