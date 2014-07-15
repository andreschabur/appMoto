<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity
 */
class Departamento
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
     * @ORM\Column(name="pais_id", type="integer", nullable=true)
     */
    private $paisId;

    /**
     * @var integer
     *
     * @ORM\Column(name="departamento_id", type="integer", nullable=false)
     */
    private $departamentoId;
    
    /**
     * @ ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\Usuario", mappedBy="departamento", cascade={"all"})     
     */
//    private $usuarioCollection;
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\Products", mappedBy="departamentoId", cascade={"all"})     
     */
    private $productoCollection;


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

    public function getPaisId() {
        return $this->paisId;
    }

    public function setPaisId($paisId) {
        $this->paisId = $paisId;
    }

    public function getDepartamentoId() {
        return $this->departamentoId;
    }

    public function setDepartamentoId($departamentoId) {
        $this->departamentoId = $departamentoId;
    }
//    public function getUsuarioCollection() {
//        return $this->usuarioCollection;
//    }
//
//    public function setUsuarioCollection($usuarioCollection) {
//        $this->usuarioCollection = $usuarioCollection;
//    }
    
    public function getProductoCollection() {
        return $this->productoCollection;
    }

    public function setProductoCollection($productoCollection) {
        $this->productoCollection = $productoCollection;
    }
    

    public function __toString() {
        return $this->descripcion;
    }

}
