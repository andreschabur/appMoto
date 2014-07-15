<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPublicacion
 *
 * @ORM\Table(name="tipo_publicacion")
 * @ORM\Entity
 */
class TipoPublicacion
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
     * @var integer
     *
     * @ORM\Column(name="cantidad_fotos", type="integer", nullable=false)
     */
    private $cantidadFotos;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255, nullable=false)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=15, scale=0, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=10, nullable=false)
     */
    private $tipo;
    
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

    public function getCantidadFotos() {
        return $this->cantidadFotos;
    }

    public function setCantidadFotos($cantidadFotos) {
        $this->cantidadFotos = $cantidadFotos;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getProductsTipoPublicacionCollection() {
        return $this->productsTipoPublicacionCollection;
    }

    public function setProductsTipoPublicacionCollection($productsTipoPublicacionCollection) {
        $this->productsTipoPublicacionCollection = $productsTipoPublicacionCollection;
    }


    public function __toString() {
        return $this->descripcion.' -- Cantidad de fotos: '.$this->getCantidadFotos().' -- Ubicacion: '.$this->getUbicacion().' -- Precio: $ '.$this->getPrecio();
    }



}
