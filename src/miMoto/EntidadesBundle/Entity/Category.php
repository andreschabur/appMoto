<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
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
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;
    
    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\ProductsOptions", mappedBy="categoryId", cascade={"all"})     
     */
    private $productsOptionsCollection;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    
    public function getProductsOptionsCollection() {
        return $this->productsOptionsCollection;
    }

    public function setProductsOptionsCollection($productsOptionsCollection) {
        $this->productsOptionsCollection = $productsOptionsCollection;
    }


}
