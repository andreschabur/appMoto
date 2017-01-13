<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cilindraje
 *
 * @ORM\Table(name="cilindraje")
 * @ORM\Entity
 */
class Cilindraje
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=20, nullable=false)
     */
    private $descripcion;
    
        /**
     * @var \Manufacturers
     *
     * @ORM\ManyToOne(targetEntity="Manufacturers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manufacturers_id", referencedColumnName="manufacturers_id")
     * })
     */
    private $manufacturersId;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    function getManufacturersId() {
        return $this->manufacturersId;
    }

    function setManufacturersId(\Manufacturers $manufacturersId) {
        $this->manufacturersId = $manufacturersId;
    }
    
    public function __toString() {
        return $this->descripcion;
    }



}
