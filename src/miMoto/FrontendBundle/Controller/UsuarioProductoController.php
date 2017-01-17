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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class UsuarioProductoController extends Controller
{
    
    private $imprimirEjecucion = false;
    
    public function indexAction($name)
    {
        return $this->render('FrontendBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * Guardar anuncio
     * Este metodo es llamado en el momento en que se va a registar por 
     * primera vez un anuncio y un usuario. desde la ventana principal
     * ruta: http://kpizk.net/appTienda/web/app_dev.php/producto/usuario_producto_nuevo
     * @return type
     */
    public function nuevoAction(Request $peticion){
//        dump($peticion);
         if($this->imprimirEjecucion){
            echo 'yyyyyyyyyyyEste si se usa';
         }
        //***Cargar un anuncion nuevo para una moto entidad producto
        //***obtener usuario en sesion, si no hay cree nueva instancia
        //***crear formulario con campos de producto, 
        
        
        
//        $peticion = $this->getRequest();
        
//        $usuario = new Usuario();                
//        $producto = new Products();
        
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
        
         //***Armar mas combos para pasar
        $paises = $em->getRepository('EntidadesBundle:Pais')->findAll();        
        foreach ($paises as $paiss){
            $pais[$paiss->getId()] = $paiss->getDescripcion();
        }

        $departamentos = $em->getRepository('EntidadesBundle:Departamento')->findAll();
        foreach ($departamentos as $deptos){
            $departamento[$deptos->getId()] = $deptos->getDescripcion();
        }

        $ciudades = $em->getRepository('EntidadesBundle:Ciudad')->findAll();
        foreach ($ciudades as $city){
            $ciudad[$city->getId()] = $city->getDescripcion();
        }

        $options = array('fabricantes' => $fabricantesOptions, 
            'cilindrajes' => $cilindrajes, 
            'opcionesProductos' => $opcionesProductos, 
            'colores' => $colores,
            'pais' => $pais, 
            'departamento' => $departamento, 
            'ciudad' => $ciudad);    
        
        //**********************************************************************************
        //**************SECCION PARA CREAR UNA NUEVA INSTANCIA DE FORMULARIO****************
        //**********************************************************************************
        //**********************************************************************************
         //***Crear formularios           
        if (!isset($formulario)) {
            if($this->imprimirEjecucion){
                        echo '<br/>El formulario no esta seteado';
                    }
            $usuario = new Usuario();                
            $producto = new Products();
            
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
        
        
        //**********************************************************************************
        //**********************************************************************************
        //**********************************************************************************
       
        //**********************************************************************************
        //********SECCION PARA GUARDAR EL FORMULARIO DE REGISTRO ***************************
        //********EN NUEVA PUBLICACION SIN INICIAR SESION***********************************
        //**********************************************************************************
        
//        $formulario = $this->createForm(new ProductsType(), $producto);
        if ($peticion->getMethod() == 'POST') {
            if($this->imprimirEjecucion){
                echo '<br/><font color="red">Entro en el post </font>';
            }
        // Validar los datos enviados y guardarlos en la base de datos
//            dump($formulario);
            $this->imprimirVariosDatos($peticion);
            
            //de la siguiente forma se obtienen los datos de formulario sin los datos de archivos, header etc del request, solamente los de formulario del request
//         $formulario->submit($peticion->request->get($formulario->getName()));
            //de la siguiente forma se obtiene todo lo que viene en el request
         $formulario->handleRequest($peticion);
         if ($formulario->isSubmitted() && $formulario->isValid()) {
//            $formulario->bindRequest($peticion);
//            $formulario->bind($peticion);
//            if ($formulario->isValid()) {
                if($this->imprimirEjecucion){
                        echo '<br/>El formulario es valido';
                    }
//                var_dump($usuario);
            // guardar la información en la base de datos//          
//                $em = $this->getDoctrine()->getEntityManager();
                //***
//                $producto = new Products();
                $idProducto = 0;
                foreach ($usuario->getProductsCollection() as $producto){     
//                    dump($producto);
                    $fecha = new \DateTime;
                    $producto->setProductsDateAdded($fecha);
//                    $producto->setProductsDateAvailable($fecha);
                    $producto->asignarDisponibilidadPorUnMes($fecha);
                    $producto->setProductsLastModified($fecha);
                    $producto->setProductsStatus(1);
                    $producto->setUsuarioId($usuario);
                    //***Buscar la entidad para relacionarla (TODO:reparar esto haciendo que el usuario tenga entidades)
                    $paisEntity = $em->getRepository('EntidadesBundle:Pais')->find($usuario->getPais());
//                    dump($usuario);
                    if($usuario->getDepartamento() == null){
                        echo 'es el departamento nulo salir <br/>';
                        exit();
                    }
                    if(!($usuario->getDepartamento() instanceof  Departamento)){                        
                        $departamentoEntity = $em->getRepository('EntidadesBundle:Departamento')->find($usuario->getDepartamento());
                    }else{
                        $departamentoEntity = $usuario->getDepartamento();
                    }
                    if($usuario->getCiudad() == null){
                        echo 'es nulo la ciudad salir <br/>';
                        exit();
                    }
                    if(!($usuario->getCiudad() instanceof  Ciudad)){
                        $ciudadEntity = $em->getRepository('EntidadesBundle:Ciudad')->find($usuario->getCiudad());
                    }else{
                        $ciudadEntity = $usuario->getCiudad();
                    }
                    //***
                    $producto->setPaisId($paisEntity->getId());
                    $producto->setDepartamentoId($departamentoEntity);
                    $producto->setCiudadId($ciudadEntity->getId());
                    $producto->upload();
                    
//                    if($this->imprimirEjecucion){
//                        echo '<br/>El path de la placa es '.$producto->getPath();
//                        echo '<br/><br/>El id '.$producto->getId();
//                        echo '<br/>htmlContent '.$producto->getHtmlcontent();
//                        echo '<br/>image '.$producto->getImage();
//                        echo '<br/>nombreImagen '.$producto->getNombreImagen();                        
//                        echo '<br/>sortOrder '.$producto->getSortOrder();
//                        echo '<br/>webPath '.$producto->getWebPath();
//                        echo '<br/>fileImage '.$producto->getProductsFileImage().'<br/><br/>';
//                    }
                    
                    //**********************************************************
                    //***************VALIDACIONES MANUALES**********************
                    //**********************************************************
                    
                    //***Validar que exista por lo menos la foto de la placa
//                    dump($producto);
                    if($producto->getPath() == null){                          
                        $this->get('session')->getFlashBag()->add('info',
                        'La foto principal es una foto obligatoria.'
                        );
//                        return $this->render(
//                                'FrontendBundle:Default:registrarProducto.html.twig',
//                                array('formulario' => $formulario->createView())
//                        );
                        return $this->render(
                                'FrontendBundle:UsuarioProducto:registroUsuarioProducto.html.twig',
                                array('formulario' => $formulario->createView())
                        );
                        break;
                    }                   
                    //***************************************************************
                    //**************FIN VALIDACIONES MANUALES*******************************
                    //***************************************************************
                    
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
                
                //**********************************************************
                //***************VALIDACIONES MANUALES**********************
                //**********************************************************
                //***Validar que exista el Pais, Departamento y Ciudad
                //***Realizar algunas validaciones manuales
                if($usuario->getDepartamento() == null || $usuario->getCiudad() == null){
                    $this->get('session')->getFlashBag()->add('info',
                        'Por algun motivo usted no posee Departamento o Ciudad, por favor adicione estos datos.'
                        );                                

                    //***
//                    echo '<br/>$pais '.$usuario->getPais();
//                    echo '<br/>$departamento '.$usuario->getDepartamento();
//                    echo '<br/>$ciudad '.$usuario->getCiudad();   
                    return $this->render(
                                   'FrontendBundle:UsuarioProducto:registroUsuarioProducto.html.twig',
                                   array('formulario' => $formulario->createView())
                    );                    
                }
                //***************************************************************
                //**************FIN VALIDACIONES MANUALES*******************************
                //***************************************************************
                
                
                
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
                $this->container->get('security.token_storage')->setToken($token);
                //***Fin registrar usuario en sesion
                
                //***Mostrar mensaje flash en la siguiente pagina visitada
                foreach ($usuario->getProductsCollection() as $producto){
                    $idProducto = $producto->getProductsId();
                }
                $this->get('session')->getFlashBag()->add('info',
                    '¡Enhorabuena! Te has registrado tu y tu mascota correctamente en Mi mascota, el numero de publicacion es: '.$idProducto
                    );                                


//                return $this->redirect($this->generateUrl('producto_ver'));
                return $this->render(
                'FrontendBundle:UsuarioProducto:verUsuarioProducto.html.twig',
                array('usuario' => $usuario));

            }else{
                if($this->imprimirEjecucion){
                        echo '<br/><font color="red">El formulario no es valido</font>';
                    }
            }

        }
        
        if($this->imprimirEjecucion){
            echo '<br/><font color="red">Voy a mostrar el registrar producto</font>';
        }
        
        
        
//        return $this->render(
//                'LoginBundle:Default:registro.html.twig',
//                array('formulario' => $formulario->createView())
        return $this->render(
                'FrontendBundle:UsuarioProducto:registroUsuarioProducto.html.twig',
                array('formulario' => $formulario->createView())
        );
    }
    
   /* public function editarAction(){
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
    }*/
    
    
    /**
     * Visualizar anuncio
     * @return type
     */
    public function verAction(){
        $usuarioContext = $this->get('security.token_storage')->getToken()->getUser();
//        dump($this->get('security.token_storage'));
//        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
//            echo 'no tiene rol de ROLE_USER';
//        }
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USUARIO')) {
            throw new AccessDeniedException();
//            echo 'no tiene rol de ROLE_USUARIO, redireccionar a la pagina principal osbservar el usario/perfil';
//            exit();
        }
//        $usuarioContext = $this->get('security.context')->getToken()->getUser();
//        dump($this->get('security.context'));
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
    
    /**
    * @ Route("/departamentos", name="select_provinces")
    */
    /*public function departamentosAction(Request $request)
    {
        $country_id = $request->request->get('pais_id');

        $em = $this->getDoctrine()->getManager();
        $provinces = $em->getRepository('MainBundle:Province')->findByCountryId($country_id);

        return new JsonResponse($provinces);
    }*/

    /**
     * 
     * @param \miMoto\FrontendBundle\Controller\Request $request
     * @return \miMoto\FrontendBundle\Controller\JsonResponse
     */
    public function ciudadesAction(Request $request)
//    public function ciudadesAction()
    {
//        echo 'voy a buscar las ciudades Action aqui ejecuntadome';
        $departamento_id = $request->request->get('departamento_id');
//        $departamento_id = 66;

        $em = $this->getDoctrine()->getManager();
        $cities = $em->getRepository('EntidadesBundle:Ciudad')->findBy(array('departamentoId' => $departamento_id));
        
//        return new JsonResponse($cities);
        
        $ciudades = array();
        foreach ($cities as $citi) {
            $ciudad['id'] = $citi->getId();
            $ciudad['descripcion'] = $citi->getDescripcion();
            $ciudades[] = $ciudad;
        }        
        return new JsonResponse($ciudades);
    }

    /**
     * 
     * @param \miMoto\FrontendBundle\Controller\Request $request
     * @return \miMoto\FrontendBundle\Controller\JsonResponse
     */
    public function razasAction(Request $request){
        $manufacturers_id = $request->request->get('mascota_id');
        $em = $this->getDoctrine()->getManager();
        $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findBy(array('manufacturersId' => $manufacturers_id));
        $cilindrajesJson = array();
        foreach ($cilindrajes as $cilindraje) {
            $cilindrajeJson['id'] = $cilindraje->getId();
            $cilindrajeJson['descripcion'] = $cilindraje->getDescripcion();
            $cilindrajesJson[] = $cilindrajeJson;
        }        
        return new JsonResponse($cilindrajesJson);
    }
    
    public function imprimirVariosDatos($peticion){
        if($this->imprimirEjecucion){
            dump($peticion->server);
            echo '<br/>';
            echo '$peticion->server[SERVER_ADDR]'.$peticion->server->get('SERVER_ADDR');
            echo '<br/>';
            echo '$peticion->server[REMOTE_ADDR]'.$peticion->server->get('REMOTE_ADDR');
            echo '<br/>';
            echo '$peticion->server[HTTP_HOST]'.$peticion->server->get('HTTP_HOST');
            echo '<br/>';
            echo '$peticion->server[HTTP_REFERER]'.$peticion->server->get('HTTP_REFERER');
            echo '<br/>';
            echo '$peticion->server[SERVER_SIGNATURE]'.$peticion->server->get('SERVER_SIGNATURE');
            echo '<br/>';
            echo '$peticion->server[SERVER_SOFTWARE]'.$peticion->server->get('SERVER_SOFTWARE');
            echo '<br/>';
        }
    }

}
