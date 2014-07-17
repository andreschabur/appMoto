<?php

namespace miMoto\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use miMoto\EntidadesBundle\Entity\Products;
use miMoto\PortadaBundle\Form\ProductsFiltroType;

use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class PortadaController extends Controller
{
//    public function buscarAction(){
//        $producto = new Products();
//        $productoFiltroType = new ProductsFiltroType();
//        $productoForm = $this->createForm(new $productoFiltroType(), $producto, $options);
//        return $this->render('PortadaBundle:Portada:producto_buscar.html.twig', array('producto' => $productoForm));
//    }
    
    public function listar($producto){
        /*$producto = new Products();
        $productoFiltroType = new ProductsFiltroType();
        $options = array();
        $productoForm = $this->createForm(new $productoFiltroType(), $producto, $options);
        echo '<br/>Los filtros son:';
        $peticion = $this->getRequest();        
        $productoForm->bind($peticion);
        if ($productoForm->isValid()) {
//            $producto = new Products();
//            $producto = $productoForm;*/
//            var_dump($producto->getProductsAnioDesdeFilter());
        echo '<br/>Usted ha buscado:';
        
        if($producto->getProductsAnioDesdeFilter() != null){
            echo '<br/>filtro año desde: '.$producto->getProductsAnioDesdeFilter();
        }
        if($producto->getProductsAnioHastaFilter() != null){
            echo '<br/>filtro año hasta: '.$producto->getProductsAnioHastaFilter();
        }
        if($producto->getProductsPriceDesdeFilter() != null){
            echo '<br/>filtro precio desde: '.$producto->getProductsPriceDesdeFilter();
        }
        if($producto->getProductsPriceHastaFilter() != null){
            echo '<br/>filtro precio hasta: '.$producto->getProductsPriceHastaFilter();
        }
        if($producto->getCilindrajeIdFilter() != null){
            echo '<br/>filtro cilindraje: '.$producto->getCilindrajeIdFilter();
        }
        if($producto->getManufacturersIdFilter() != null){
            echo '<br/>filtro fabricante: '.$producto->getManufacturersIdFilter();
        }
        if($producto->getDepartamentoId() != null){
            echo '<br/>filtro departamento: '.$producto->getDepartamentoId();
        }
            
            
            
//        }
//    public function listarAction($filtros){        
        $em = $this->getDoctrine()->getManager();                
        $productos = $em->getRepository('EntidadesBundle:Products')->findByFiltro($producto);        
//        echo '<br/>La cantidad encontrada es: '.sizeof($productos);
//        $productos = $em->getRepository('EntidadesBundle:Products')->findBy(array('productsStatus' => true));        
        return $this->render('PortadaBundle:Portada:producto_listar.html.twig', array('productos' => $productos));
    }
    
    public function verAction($id){
        $producto = 'buscar por '.$id;
        $em = $this->getDoctrine()->getManager();                
        $producto = $em->getRepository('EntidadesBundle:Products')->find($id);        
        //***
        return $this->render(
        'PortadaBundle:Portada:producto_ver.html.twig',
        array(
            'usuario' => $producto->getUsuarioId(),             
            'producto' => $producto,             
            ));
        //***
//        return $this->render('PortadaBundle:Portada:producto_ver.html.twig', array('producto' => $producto));
    }    
    
    public function inicioAction(){
        
        $em = $this->getDoctrine()->getManager();        
        //***
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();        
        $error = $peticion->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR));
        
        //***Si se va a mostrar, 
        if (!isset($productoForm)){
            $producto = new Products();
            $productoFiltroType = new ProductsFiltroType();
            //***
            $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findBy(array('estado' => 'A'));
            $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
            $anios = $this->generarArrayAnios();
            $preciosDesde = $this->generarArrayPreciosDesde();
            $preciosHasta = $this->generarArrayPreciosHasta();
            $options = array('fabricantes' => $fabricantes, 'cilindrajes' => $cilindrajes,'anios' => $anios, 'preciosDesde' => $preciosDesde, 'preciosHasta' => $preciosHasta);        

            $productoForm = $this->createForm(new $productoFiltroType(), $producto, $options);
        }
        
        //***Si se esta filtrando
        if ($peticion->getMethod() == 'POST') {
            $peticion = $this->getRequest();        
            $productoForm->bind($peticion);
            if ($productoForm->isValid()) {
                return $this->listar($producto);                        
            }
        }
        //***
        return $this->render(
        'PortadaBundle:Portada:inicio.html.twig',
        array('producto' => $productoForm->createView(),
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error));
    }
    
    
    public function generarArrayAnios(){
        $fechaActual = new \DateTime;
        $anioActual = $fechaActual->format('Y');
        $mesActual = $fechaActual->format('m');
        $anios = array();
        if($mesActual > 6){
            $anioActual = $anioActual + 1;
        }
        for ($contadorAnios = 1930; $contadorAnios < $anioActual; $anioActual--) {
            $anios[$anioActual] = $anioActual;
        }
        return $anios;
        
    }
    
    public function generarArrayPreciosDesde(){
        $precios = array();
        $precios['0'] = 'Menor a $ 5.000.000';
        $precios['5000000'] = '$ 5.000.000';
        $precios['10000000'] = '$ 10.000.000';
        $precios['15000000'] = '$ 15.000.000';
        $precios['20000000'] = '$ 20.000.000';
        $precios['25000000'] = '$ 25.000.000';                
        return $precios;
        
    }
    
    public function generarArrayPreciosHasta(){
        $precios = array();        
        $precios['5000000'] = '$ 5.000.000';
        $precios['10000000'] = '$ 10.000.000';
        $precios['15000000'] = '$ 15.000.000';
        $precios['20000000'] = '$ 20.000.000';
        $precios['25000000'] = '$ 25.000.000';                
        $precios['100000000'] = 'Mayor a $ 30.000.000';
        return $precios;
        
    }
    
}
