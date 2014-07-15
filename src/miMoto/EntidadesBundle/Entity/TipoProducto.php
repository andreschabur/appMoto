<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoProducto
 *
 * @ORM\Table(name="tipo_producto")
 * @ORM\Entity
 */
class TipoProducto
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
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\ProductsTipoPublicacion", mappedBy="tipoPublicacionId", cascade={"all"})     
     */
    private $productsTipoPublicacionCollection;

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

    public function getProductsTipoPublicacionCollection() {
        return $this->productsTipoPublicacionCollection;
    }

    public function setProductsTipoPublicacionCollection($productsTipoPublicacionCollection) {
        $this->productsTipoPublicacionCollection = $productsTipoPublicacionCollection;
    }
    
    public function __toString() {
        return $this->descripcion;
    }


}
