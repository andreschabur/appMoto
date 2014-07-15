<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsTipoPublicacion
 *
 * @ORM\Table(name="products_tipo_publicacion")
 * @ORM\Entity
 */
class ProductsTipoPublicacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="products_id")
     * })
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_publicacion_id", type="integer", nullable=false)
     */
    
    /**
     * @var \TipoPublicacion
     *
     * @ORM\ManyToOne(targetEntity="TipoPublicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_publicacion_id", referencedColumnName="id")
     * })
     */
    private $tipoPublicacionId;

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
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProductsId() {
        return $this->productsId;
    }

    public function setProductsId($productsId) {
        $this->productsId = $productsId;
    }

    
    public function getTipoPublicacionId() {
        return $this->tipoPublicacionId;
    }

    public function setTipoPublicacionId($tipoPublicacionId) {
        $this->tipoPublicacionId = $tipoPublicacionId;
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


}
