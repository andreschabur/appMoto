<?php

namespace miMoto\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use miMoto\EntidadesBundle\Entity\Products;
use miMoto\EntidadesBundle\Entity\Usuario;
use miMoto\EntidadesBundle\Entity\ProductsAttributes;
use miMoto\EntidadesBundle\Entity\ProductsTipoPublicacion;
use miMoto\EntidadesBundle\Entity\ProductsImages;
use miMoto\FrontendBundle\Form\UsuarioProductoType;


class UsuarioProductoController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontendBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * Guardar anuncio
     * @return type
     */
    public function nuevoAction(){
        //***Cargar un anuncion nuevo para una moto entidad producto
        //***obtener usuario en sesion, si no hay cree nueva instancia
        //***crear formulario con campos de producto, 
        
        
        
        $peticion = $this->getRequest();
        
        $usuario = new Usuario();                
        $producto = new Products();
        
        //***Crear options para pasarle al combo de cajas de compensacion
        $options = array();
        $em = $this->getDoctrine()->getManager();                
        //***
        $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findBy(array('estado' => 'A'));
        foreach($fabricantes as $fabricante){
            $fabricantesOptions[$fabricante->getManufacturersId()] = $fabricante;
        }
        $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
        $colores = $em->getRepository('EntidadesBundle:Color')->findAll();
        $opcionesProductos = $em->getRepository('EntidadesBundle:ProductsOptionsValues')->findAll();

        $options = array('fabricantes' => $fabricantesOptions, 
            'cilindrajes' => $cilindrajes, 
            'opcionesProductos' => $opcionesProductos, 
            'colores' => $colores,);        

        //***Crear formularios        
        if (!isset($formulario)) {                                    
            
            //****************LLENAR LAS CATEGORIAS CON SUS ATRIBUTOS DEL PRODUCTO SEGURIDAD, SONIDO, ACCESORIOS, CONDICIONES
            //***Buscar todas las categorias activas y recorrerlas            
            $categoryCollection = $em->getRepository('EntidadesBundle:Category')->findBy(array('estado' => 'A'));
            //***Por cada categoria recorrer sus ProductsOptions            
            foreach ($categoryCollection as $category){                
                if($category->getEstado() == 'A'){
                    foreach ($category->getProductsOptionsCollection() as $optionsId){
                        //***si el estado del product options es activo entonces adicionelo al producto
                        if($optionsId->getEstado() == 'A'){
                            $productsAtributes = new ProductsAttributes();            
            //                $productsAtributes->setOptionsId($optionsId);
                            $productsAtributes->setOptionsId($optionsId->getProductsOptionsId());
                            $productsAtributes->setOptionsLabel($optionsId->getProductsOptionsName());                
                            $productsAtributes->setCategoryId($category->getId());
                            $productsAtributes->setCategoryLabel($category->getLabel());
            //                $productsAtributes->setOptionsValuesId($optionsId);
                            $productsAtributes->setProductsId($producto);                            
                            $producto->addProductsAttributesCollection($productsAtributes);
                            
                        }
                    }
                }
            }
            
            //**************LLENAR LOS TIPOS PUBLICACION, (OPCIONES DE PAGO PERMITIDAS)            
            $productsTipoPublicacion = new ProductsTipoPublicacion();            
            $productsTipoPublicacion->setProductsId($producto);
            $producto->addProductsTipoPublicacionCollection($productsTipoPublicacion);
             
            //**************LLENAR LAS FOTOS            
            $cantidadFotos = $this->container->getParameter('cantidadFotos');
//            $cantidadFotos = 2;
            for ($contadorFotos = 1; $contadorFotos < $cantidadFotos; $contadorFotos++) {
                $productsImages = new ProductsImages();
                $productsImages->setSortOrder($contadorFotos);
                $productsImages->setProductsId($producto);
                $producto->addProductsImagesCollection($productsImages);
            }

            
            //***
            $usuario->addProductsCollection($producto);
            //***
//            $formulario = $this->createForm(new ProductsType(), $producto, $options);
            $formulario = $this->createForm(new UsuarioProductoType(), $usuario, $options);
            
        }

        
//        $formulario = $this->createForm(new ProductsType(), $producto);
        if ($peticion->getMethod() == 'POST') {
        // Validar los datos enviados y guardarlos en la base de datos
//            $formulario->bindRequest($peticion);
            $formulario->bind($peticion);
            if ($formulario->isValid()) {
                
            // guardar la información en la base de datos//          
//                $em = $this->getDoctrine()->getEntityManager();
                //***
//                $producto = new Products();
                $idProducto = 0;
                foreach ($usuario->getProductsCollection() as $producto){                    
                    $fecha = new \DateTime;
                    $producto->setProductsDateAdded($fecha);
                    $producto->setProductsDateAvailable($fecha);
                    $producto->setProductsLastModified($fecha);
                    $producto->setProductsStatus(1);
                    $producto->setUsuarioId($usuario);
                    $producto->setPaisId($usuario->getPais());
                    $producto->setDepartamentoId($usuario->getDepartamento());
                    $producto->setCiudadId($usuario->getCiudad());
                    $producto->upload();
                    
                    //***Validar que exista por lo menos la foto de la placa
                    if($producto->getPath() == null){                        
                        $this->get('session')->getFlashBag()->add('info',
                        'La foto de la placa es una foto obligatoria.'
                        );
                        return $this->render(
                                'FrontendBundle:Default:registrarProducto.html.twig',
                                array('formulario' => $formulario->createView())
                        );
                        break;
                    }
                    //***
                    
//                    $producto = new Products();
                    foreach ($producto->getProductsTipoPublicacionCollection() as $productsTipoPublicacion){
//                        $productsTipoPublicacion = new ProductsTipoPublicacion();
                        $tipoPublicacion = $productsTipoPublicacion->getTipoPublicacionId();
                        $productsTipoPublicacion->setCantidadFotos($tipoPublicacion->getCantidadFotos());
                        $productsTipoPublicacion->setDescripcion($tipoPublicacion->getDescripcion());
                        $productsTipoPublicacion->setEstado($tipoPublicacion->getEstado());
                        $productsTipoPublicacion->setPrecio($tipoPublicacion->getPrecio());
                        $productsTipoPublicacion->setTipo($tipoPublicacion->getTipo());
                        $productsTipoPublicacion->setUbicacion($tipoPublicacion->getUbicacion());
                    }
                    
                    foreach ($producto->getProductsImagesCollection() as $productsImages){
                        $productsImages->upload();                    
                    }
                    
                }
                
                
                
                //***
                $usuario->setPassword('kpizk');
                
                //***
                $em->persist($usuario);
                $em->flush();
                
                //****Registrar usuario en sesion
                $token = new UsernamePasswordToken(
                        $usuario,
                        $usuario->getPassword(),
                        'usuarios',
                        $usuario->getRoles()
                        );
                $this->container->get('security.context')->setToken($token);
                //***Fin registrar usuario en sesion
                
                //***Mostrar mensaje flash en la siguiente pagina visitada
                foreach ($usuario->getProductsCollection() as $producto){
                    $idProducto = $producto->getProductsId();
                }
                $this->get('session')->getFlashBag()->add('info',
                    '¡Enhorabuena! Te has registrado tu y tu moto correctamente en Mi moto, el numero de publicacion es: '.$idProducto
                    );                                


//                return $this->redirect($this->generateUrl('producto_ver'));
                return $this->render(
                'FrontendBundle:UsuarioProducto:verUsuarioProducto.html.twig',
                array('usuario' => $usuario));

            }

        }
//        return $this->render(
//                'LoginBundle:Default:registro.html.twig',
//                array('formulario' => $formulario->createView())
        return $this->render(
                'FrontendBundle:UsuarioProducto:registroUsuarioProducto.html.twig',
                array('formulario' => $formulario->createView())
        );
    }
    
    public function editarAction(){
        $peticion = $this->getRequest();
        
        
        //***Crear options para pasarle al combo de cajas de compensacion
        $options = array();
        $em = $this->getDoctrine()->getManager();                
        //***
        $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findBy(array('estado' => 'A'));
        $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
        $colores = $em->getRepository('EntidadesBundle:Color')->findAll();
        $opcionesProductos = $em->getRepository('EntidadesBundle:ProductsOptionsValues')->findAll();
        //***
        $options = array('fabricantes' => $fabricantes, 'cilindrajes' => $cilindrajes, 'opcionesProductos' => $opcionesProductos, 'colores' => $colores);        
        //***
        if (!isset($formulario)) {
            // Obtener los datos del usuario logueado y utilizarlos para
            $usuario = $this->get('security.context')->getToken()->getUser();
            $formulario = $this->createForm(new UsuarioProductoType(), $usuario, $options);
        }
        
        if ($peticion->getMethod() == 'POST') {
        // Validar los datos enviados y guardarlos en la base de datos
            $formulario->bind($peticion);
            if ($formulario->isValid()) {
                //***
                $em->persist($usuario);
                $em->flush();
                //***
                return $this->render(
                'FrontendBundle:UsuarioProducto:verUsuarioProducto.html.twig',
                array('usuario' => $usuario));
            }
        }
        
        
        return $this->render(
                'FrontendBundle:UsuarioProducto:registroUsuarioProducto.html.twig',
                array('formulario' => $formulario->createView())
        );
    }
    
    
    /**
     * Visualizar anuncio
     * @return type
     */
    public function verAction(){
        $usuarioContext = $this->get('security.context')->getToken()->getUser();
//        $usuario = new Usuario();
//        foreach( $usuario->getProductsCollection() as $producto){
////            $producto = new Products();
//            foreach ($producto->getProductsAttributesCollection() as $productsAttributes){
//                $productsAttributes = new ProductsAttributes();
//                $productsAttributes->get
//            }
//        }    
        $em = $this->getDoctrine()->getManager();                
        $productos = $em->getRepository('EntidadesBundle:Products')->findBy(array('usuarioId' => $usuarioContext->getId()));        

//        $usuario = $producto->getUsuarioId();                
//        $usuario->setProductsCollection($productos);        

        //***
        return $this->render(
        'FrontendBundle:UsuarioProducto:verUsuarioProducto.html.twig',
        array(
            'usuario' => $usuarioContext,             
            'productos' => $productos,             
            ));

    }    

}
