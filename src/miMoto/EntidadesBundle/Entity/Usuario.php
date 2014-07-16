<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;


//* @ORM\Entity(repositoryClass="solicitudReserva\UsuarioBundle\Entity\UsuarioRepository")

/**
 * miMoto\EntidadesBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="miMoto\EntidadesBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity("correo")
 */
class Usuario implements UserInterface {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank(message = "Por favor, escribe tu nombre")
     */
    private $nombre;

    /**
     * @var string $apellido
     *
     * @ORM\Column(name="apellido", type="string", length=100)
     */
    private $apellido;

    /**
     * @var string $correo
     *
     * @ORM\Column(name="correo", type="string", length=80)
     * @Assert\Email()
     */
    private $correo;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @ Assert\MinLength(limit=6)     
     */
    private $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=false)
     */
    private $telefono;

    
    /**
     * @var string $telefonodos
     *
     * @ORM\Column(name="telefonodos", type="string", length=15, nullable=true)
     */
    private $telefonodos;

    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ciudad", type="integer", nullable=false)
     */
    private $ciudad;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="departamento", type="integer", nullable=false)
     */
    private $departamento;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="pais", type="integer", nullable=false)
     */
    private $pais;
    
    /**
     * @var string $identificacion
     *
     * @ORM\Column(name="identificacion", type="string", length=20)
     */
    private $identificacion;
    
    /**
     * @var string $tipoIdentificacion
     *
     * @ORM\Column(name="tipo_identificacion", type="string", length=10)
     */
    private $tipoIdentificacion;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\Products", mappedBy="usuarioId", cascade={"all"})     
     */
    private $productsCollection;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido() {
        return $this->apellido;
    }

    /**
     * Set correo
     *
     * @param string $correo
     */
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo() {
        return $this->correo;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
//        $this->password = 'xxx123';
        return $this->password;
    }
    
    
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getTelefonodos() {
        return $this->telefonodos;
    }

    public function setTelefonodos($telefonodos) {
        $this->telefonodos = $telefonodos;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
    
    public function getPais() {
        return $this->pais;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }
        
    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt) {
        $this->salt = $salt;
    }    
    

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt() {
        return $this->salt;
    }
    
    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function getTipoIdentificacion() {
        return $this->tipoIdentificacion;
    }

    public function setTipoIdentificacion($tipoIdentificacion) {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

        
    public function getProductsCollection() {
        return $this->productsCollection;
    }

    public function setProductsCollection($productsCollection) {
        $this->productsCollection = $productsCollection;
    }
    
    public function addProductsCollection(Products $products) {
        $this->productsCollection[] = $products;
    }
    
    public function removeProductsCollection(Products $products) {
//        $this->productsCollection[] = $products;
        //***TODO
    }

    //*********

    function equals(\Symfony\Component\Security\Core\User\UserInterface $usuario) {
//        echo '<br />el correo de this : '. $this->getCorreo() . ' el correo de usuario: ' . $usuario->getCorreo() . '<br />';         
        return $this->getCorreo() == $usuario->getCorreo();
    }

    function eraseCredentials() {
        
    }

    function getRoles() {
        return array('ROLE_USUARIO');
    }

    function getUsername() {
        return $this->getCorreo();
    }            

        
    
    //***Validacion adhoc
    /**
    * @Assert\True(message = "Debes tener al menos 18 años")
    */
    public function isMayorDeEdad(){
        return 1 == 1;
//        return $this->fecha_nacimiento <= new \DateTime('today - 18 years');
    }


}