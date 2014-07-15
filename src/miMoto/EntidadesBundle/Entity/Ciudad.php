<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudad
 *
 * @ORM\Table(name="ciudad")
 * @ORM\Entity(repositoryClass="miMoto\EntidadesBundle\Repositorio\CiudadRepository")
 */
class Ciudad
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
     * @ORM\Column(name="departamento_id", type="integer", nullable=false)
     */
    private $departamentoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ciudad_id", type="integer", nullable=false)
     */
    private $ciudadId;
    
    /**
     * @ ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\Usuario", mappedBy="paisId", cascade={"all"})     
     */
//    private $usuarioCollection;
    
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

    public function getDepartamentoId() {
        return $this->departamentoId;
    }

    public function setDepartamentoId($departamentoId) {
        $this->departamentoId = $departamentoId;
    }

    public function getCiudadId() {
        return $this->ciudadId;
    }

    public function setCiudadId($ciudadId) {
        $this->ciudadId = $ciudadId;
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
