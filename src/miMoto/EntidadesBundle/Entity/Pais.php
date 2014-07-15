<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="pais")
 * @ORM\Entity
 */
class Pais
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
     * @ ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\Usuario", mappedBy="paisId", cascade={"all"})     
     */
//    private $usuarioCollection;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
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

//    public function getUsuarioCollection() {
//        return $this->usuarioCollection;
//    }
//
//    public function setUsuarioCollection($usuarioCollection) {
//        $this->usuarioCollection = $usuarioCollection;
//    }



    public function __toString() {
        return $this->descripcion;
    }

}
