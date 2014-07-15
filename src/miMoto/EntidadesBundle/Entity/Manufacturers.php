<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manufacturers
 *
 * @ORM\Table(name="manufacturers", indexes={@ORM\Index(name="IDX_MANUFACTURERS_NAME", columns={"manufacturers_name"})})
 * @ORM\Entity
 */
class Manufacturers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="manufacturers_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $manufacturersId;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturers_name", type="string", length=32, nullable=false)
     */
    private $manufacturersName;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturers_image", type="string", length=64, nullable=true)
     */
    private $manufacturersImage;

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
     * @var srting
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;



    /**
     * Get manufacturersId
     *
     * @return integer 
     */
    public function getManufacturersId()
    {
        return $this->manufacturersId;
    }

    /**
     * Set manufacturersName
     *
     * @param string $manufacturersName
     * @return Manufacturers
     */
    public function setManufacturersName($manufacturersName)
    {
        $this->manufacturersName = $manufacturersName;

        return $this;
    }

    /**
     * Get manufacturersName
     *
     * @return string 
     */
    public function getManufacturersName()
    {
        return $this->manufacturersName;
    }

    /**
     * Set manufacturersImage
     *
     * @param string $manufacturersImage
     * @return Manufacturers
     */
    public function setManufacturersImage($manufacturersImage)
    {
        $this->manufacturersImage = $manufacturersImage;

        return $this;
    }

    /**
     * Get manufacturersImage
     *
     * @return string 
     */
    public function getManufacturersImage()
    {
        return $this->manufacturersImage;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Manufacturers
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
     * @return Manufacturers
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
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

        
    public function __toString() {
        return $this->manufacturersName;
    }

}
