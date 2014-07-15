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

    public function __toString() {
        return $this->descripcion;
    }



}
