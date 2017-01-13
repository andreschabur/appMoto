<?php

namespace miMoto\PortadaBundle\Controller;

use DateTime;
use miMoto\EntidadesBundle\Entity\Products;
use miMoto\PortadaBundle\Form\ProductsFiltroType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;


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
        $producto = new Products();
        $producto = $em->getRepository('EntidadesBundle:Products')->find($id);
        $criteriosAtributosMostrados = array('productsId' => $producto->getProductsId(), 'optionStatus' => true);
//        $criteriosAtributosMostrados = array('productsId' => $producto->getProductsId());
        $productsAttributesCollection = $em->getRepository('EntidadesBundle:ProductsAttributes')->findBy($criteriosAtributosMostrados);
        $producto->setProductsAttributesCollection($productsAttributesCollection);
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
    
    public function inicioAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();        
        //***
//        $peticion = $this->getRequest();
        $peticion = $request;
        $sesion = $peticion->getSession();        
//        $error = $peticion->attributes->get(
//                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR));
        $error = $peticion->attributes->get(
                Security::AUTHENTICATION_ERROR, $sesion->get(Security::AUTHENTICATION_ERROR));
        
        //***Si se va a mostrar, 
        if (!isset($productoForm)){
            $producto = new Products();
//            $productoFiltroType = new ProductsFiltroType();
            //***
            $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findBy(array('estado' => 'A'));
            $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
            $anios = $this->generarArrayAnios();
            $preciosDesde = $this->generarArrayPreciosDesde();
            $preciosHasta = $this->generarArrayPreciosHasta();
            $options = array('fabricantes' => $fabricantes, 'cilindrajes' => $cilindrajes,'anios' => $anios, 'preciosDesde' => $preciosDesde, 'preciosHasta' => $preciosHasta, 'em' => $em);

            $productoForm = $this->createForm(ProductsFiltroType::class, $producto, $options);
        }
        
        //***Si se esta filtrando
        if ($peticion->getMethod() == 'POST') {
//            $peticion = $request;        
             $productoForm->submit($peticion->request->get($productoForm->getName()));
//            $productoForm->handleRequest($peticion);
//            $productoForm->bind($peticion);
            if ($productoForm->isSubmitted() && $productoForm->isValid()) {
                return $this->listar($producto);                        
            }
        }
        //***
        return $this->render(
        'PortadaBundle:Portada:inicio.html.twig',
        array('producto' => $productoForm->createView(),
            'last_username' => $sesion->get(Security::LAST_USERNAME),
            'error' => $error));
    }
    
    
    public function generarArrayAnios(){
//        $fechaActual = new DateTime;
//        $anioActual = $fechaActual->format('Y');
//        $mesActual = $fechaActual->format('m');
//        $anios = array();
//        if($mesActual > 6){
//            $anioActual = $anioActual + 1;
//        }
        for ($contadorAnios = 0; $contadorAnios <= 30; $contadorAnios++) {
            $anios[$contadorAnios] = $contadorAnios;
        }
        return $anios;
        
    }
    
    public function generarArrayPreciosDesde(){
        $precios = array();
        $precios['0'] = 'En Adopcion';
        $precios['50000'] = '$ 50.000';
        $precios['100000'] = '$ 100.000';
        $precios['200000'] = '$ 200.000';
        $precios['500000'] = '$ 500.000';
        $precios['1000000'] = '$ 1.000.000';
        return $precios;
        
    }
    
    public function generarArrayPreciosHasta(){
        $precios = array();        
        $precios['0'] = 'En Adopcion';
        $precios['50000'] = '$ 50.000';
        $precios['100000'] = '$ 100.000';
        $precios['200000'] = '$ 200.000';
        $precios['500000'] = '$ 500.000';
        $precios['1000000'] = '$ 1.000.000';               
        $precios['100000000'] = 'Mayor a $ 1.000.000';
        return $precios;
        
    }
    
    public function tarifasAction(){
          return $this->render('PortadaBundle:Default:tarifas.html.twig');
    }
    
    public function modificarAnuncioAction(){
          return $this->render('PortadaBundle:Default:modificarAnuncio.html.twig');
    }
    
    public function renovarAnuncioAction(){
          return $this->render('PortadaBundle:Default:renovarAnuncio.html.twig');
    }
    
    public function notificarVentaAction(){
          return $this->render('PortadaBundle:Default:notificarVenta.html.twig');
    }
    
}
