<?php

namespace miMoto\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use miMoto\EntidadesBundle\Entity\Products;
use miMoto\EntidadesBundle\Entity\ProductsAttributes;
use miMoto\FrontendBundle\Form\ProductsType;
use miMoto\EntidadesBundle\Entity\ProductsTipoPublicacion;
use miMoto\EntidadesBundle\Entity\ProductsImages;

class DefaultController extends Controller
{
    
    private $imprimirEjecucion = true;
            
    public function indexAction($name)
    {
        return $this->render('FrontendBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * Guardar anuncio
     * @return type
     */
   /* public function nuevoAction(){
        echo 'xxxxxxxxEste metodo nunca se utiliza..';
        //***Cargar un anuncion nuevo para una moto entidad producto
        //***obtener usuario en sesion, si no hay cree nueva instancia
        //***crear formulario con campos de producto, 
        
        
        
        $peticion = $this->getRequest();
        $producto = new Products();        
        
        //***Crear options para pasarle al combo de cajas de compensacion
        $options = array();
        $em = $this->getDoctrine()->getManager();
//        $tipoAlojamiento = $em->getRepository('CodigoVariosBundle:CodigoVarios')->findListaByVanomtabla('TipoAlojamiento');
//        $fabricantes['01'] = 'HONDA';
//        $fabricantes['02'] = 'SUZUKI';
//        $fabricantes['03'] = 'YAMAHA';
        $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findBy(array('estado' => 'A'));
        $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
        $colores = $em->getRepository('EntidadesBundle:Color')->findAll();
        $opcionesProductos = $em->getRepository('EntidadesBundle:ProductsOptionsValues')->findAll();
//        $options = array('fabricantes' => $fabricantes, 'tipoSorteo' => $tipoSorteo);        
        $options = array('fabricantes' => $fabricantes, 'cilindrajes' => $cilindrajes, 'opcionesProductos' => $opcionesProductos, 'colores' => $colores);        
//        Crear formularios        
        if (!isset($formulario)) {
            if($this->imprimirEjecucion){
                echo '<br/>Entro en no esta seteado el formulario';
            }
//            $formulario = $this->createForm(new SolicitudType(), $solicitud, $options);
            
            //***Adicionar un item al detalle del producto
//            $criteria = array('productsOptionsId' => 1);            
//            $criteria['languageId'] = '1';            
            
            //***Buscar todas las categorias activas y recorrerlas
            
            //***Por cada categoria recorrer sus ProductsOptions
            $categoryCollection = $em->getRepository('EntidadesBundle:Category')->findBy(array('estado' => 'A'));
//            
            foreach ($categoryCollection as $category){                
                if($category->getEstado() == 'A'){
                    foreach ($category->getProductsOptionsCollection() as $optionsId){



    //                $optionsIdCollection = $em->getRepository('EntidadesBundle:ProductsOptions')->findAll();
    //                foreach ($category->getProductsOptionsCollection() as $optionsId){
    //                foreach ($optionsIdCollection as $optionsId){


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
//            $cantidadFotos = 8;
            for ($contadorFotos = 1; $contadorFotos < $cantidadFotos; $contadorFotos++) {
                $productsImages = new ProductsImages();
                $productsImages->setSortOrder($contadorFotos);
                $productsImages->setProductsId($producto);
                $producto->addProductsImagesCollection($productsImages);
            }
            
            //***Adicionar un item al detalle del producto
//            $criteria['productsOptionsId'] = 2;            
//            $productsAtributes = new ProductsAttributes();            
//            $optionsId = $em->getRepository('EntidadesBundle:ProductsOptions')->find($criteria);
//            $productsAtributes->setOptionsId($optionsId);
//            $producto->addProductsAtributesCollection($productsAtributes);
            
            
            $formulario = $this->createForm(new ProductsType(), $producto, $options);
        }

        
//        $formulario = $this->createForm(new ProductsType(), $producto);
        if ($peticion->getMethod() == 'POST') {
            if($this->imprimirEjecucion){
                echo '<br/><font color="red">Entro en el post</font>';
            }
        // Validar los datos enviados y guardarlos en la base de datos
//            $formulario->bindRequest($peticion);
            $formulario->bind($peticion);
            $usuario = $this->get('security.context')->getToken()->getUser();
            
            //***Realizar algunas validaciones manuales
            if($usuario->getDepartamento() == null || $usuario->getCiudad() == null){
                $this->get('session')->getFlashBag()->add('info',
                    'Por algun motivo usted no posee Departamento o Ciudad, por favor dirijase a la ventana de editar perfil y adicione estos datos.'
                    );                                
            
                //***
                echo '<br/>$pais '.$usuario->getPais();
                echo '<br/>$departamento '.$usuario->getDepartamento();
                echo '<br/>$ciudad '.$usuario->getCiudad();                            
            }else{
                if ($formulario->isValid()) {
                    if($this->imprimirEjecucion){
                        echo '<br/>El formulario es valido';
                    }
                // guardar la información en la base de datos//          
    //                $em = $this->getDoctrine()->getEntityManager();
                    //***
    //                $producto = new Products();
                    $fecha = new \DateTime;
                    $producto->setProductsDateAdded($fecha);
                    $producto->setProductsDateAvailable($fecha);
                    $producto->setProductsLastModified($fecha);
                    $producto->setProductsStatus(1);

                    $producto->setUsuarioId($usuario);                
                    //***
                    $pais = $em->getRepository('EntidadesBundle:Pais')->find($usuario->getPais());
                    $departamento = $em->getRepository('EntidadesBundle:Departamento')->find($usuario->getDepartamento());
                    $filtroCiudad = array('ciudadId' => $usuario->getCiudad(), 'departamentoId' => $usuario->getDepartamento());
    //                $ciudades = $em->getRepository('EntidadesBundle:Ciudad')->findByFiltro($filtroCiudad);                
    //                $ciudades = $em->getRepository('EntidadesBundle:Ciudad')->find($usuario->getCiudad());                
                    $ciudad = $em->getRepository('EntidadesBundle:Ciudad')->find($usuario->getCiudad());                
                    if($ciudad == null){
                        $this->get('session')->getFlashBag()->add('info',
                            'No encontre la hp ciudad ea vemaria malparido error, se busco el id de ciudad '.$usuario->getCiudad()
                            );                                
                    }else{
        //                var_dump($ciudades);
        //                $ciudad = $ciudades[0];
                        //***
                        //echo '<br/>$pais '.$pais;
                        //echo '<br/>$departamento '.$departamento;
                        //echo '<br/>$ciudad '.$ciudad;
                        $producto->setPaisId($departamento->getPaisId());
                        $producto->setDepartamentoId($departamento);
                        $producto->setCiudadId($ciudad);

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
                        }
                        //***

                        foreach ($producto->getProductsImagesCollection() as $productsImages){
                            $productsImages->upload();                    
                        }

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



                        //***
                        $em->persist($producto);
                        $em->flush();

                        //***Mostrar mensaje flash en la siguiente pagina visitada
                        $idProducto = 0;
                        $idProducto = $producto->getProductsId();
                        $this->get('session')->getFlashBag()->add('info',
                            '¡Enhorabuena! Has registrado tu moto correctamente en Mi moto , el numero de publicacion es: '.$idProducto
                            );                                


        //                return $this->redirect($this->generateUrl('producto_ver'));
                        return $this->render(
                        'FrontendBundle:Default:producto_ver.html.twig',
                        array('producto' => $producto));
                    }

                }else{
                    if($this->imprimirEjecucion){
                        echo '<br/><font color="red">El formulario no es valido</font>';
                    }
                }
            }

        }
//        return $this->render(
//                'LoginBundle:Default:registro.html.twig',
//                array('formulario' => $formulario->createView())
        if($this->imprimirEjecucion){
            echo '<br/><font color="red">Voy a mostrar el registrar producto</font>';
        }
        return $this->render(
                'FrontendBundle:Default:registrarProducto.html.twig',
                array('formulario' => $formulario->createView())
        );
    }*/
    

    public function editarAction($id){
    // Obtener los datos del usuario logueado y utilizarlos para
//    $usuarioContext = $this->get('security.context')->getToken()->getUser();
//    $formulario = $this->createForm(new UsuarioEditarType(), $usuario);
    
    $em = $this->getDoctrine()->getManager();                
//    $productos = $fabricantes = $em->getRepository('EntidadesBundle:Products')->findBy(array('usuarioId' => $usuarioContext->getId()), null, 1);
    $producto = $em->getRepository('EntidadesBundle:Products')->find($id);
    $productoId = $producto->getProductsId();
//    $producto = $productos[0];            
    
//    echo '<br/>entro a editar producto';
    //***Llenar las fotos que faltan por subir
                  
//    echo '<br/><br/>estoy a recorriendo el producto '.$producto->getProductsId().'<br/>';
//                    $producto = new Products();
    //***Obtener cantidad de fotos seleccionada
    $tipoPublicacionSeleccionada = null;
    foreach ($producto->getProductsTipoPublicacionCollection() as $productsTipoPublicacion){
       $tipoPublicacionSeleccionada = $productsTipoPublicacion;
       break;
    }                
    //***adicionar las fotos si son menos de la publicacion seleccionada
    $cantidadDeFotos = sizeof($producto->getProductsImagesCollection());
//    echo '<br/>cantidad de fotos de publicacion '.$tipoPublicacionSeleccionada->getCantidadFotos().'<br/>';
//    echo '<br/>cantidad de fotos actual guardadas'.$cantidadDeFotos.'<br/>';
    while($cantidadDeFotos < $tipoPublicacionSeleccionada->getCantidadFotos()){                     
        $cantidadDeFotos++;
        $productsImages = new ProductsImages();
        $productsImages->setSortOrder($cantidadDeFotos);
        $productsImages->setProductsId($producto);
        $producto->addProductsImagesCollection($productsImages);                                
//        echo '<br/>se adiciona foto con orden'.$cantidadDeFotos.'<br/>';
    }                                


        //***Fin llenar las fotos que faltan por subir
    
    $options = array();
//    $producto = $fabricantes = $em->getRepository('EntidadesBundle:Products')->find($producto->getProductsId());        
    $formulario = $this->createForm(new ProductsType(), $producto, $options);
    
    $peticion = $this->getRequest();
    
    // rellenar un formulario de registro.
    //
    // Si la petición es GET, mostrar el formulario
    // Si la petición es POST, actualizar la información del usuario con
    // los nuevos datos obtenidos del formulario
    
    if ($peticion->getMethod() == 'POST') {        
    
        
        $formulario->bind($peticion);
        if ($formulario->isValid()) {                        


                // actualizar el producto
                $producto->upload();
                
                //***Actulizar lista de producto imagen, quitar los vacios
                $producto = $this->eliminarImagenesVacias($producto);
                
                foreach ($producto->getProductsImagesCollection() as $productsImages){
                    $productsImages->upload();                    
                }
                
                $em = $this->getDoctrine()->getEntityManager();
                //***
                $em->persist($producto);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info',
                'Los datos de tu producto se han actualizado correctamente'
                );
                return $this->render(
                'FrontendBundle:Default:producto_ver.html.twig',
                array('producto' => $producto));

        }else{
            $this->get('session')->getFlashBag()->add('info',
                'Error en la actualizacion de datos'
                );
        }
    }
    
    return $this->render(
                'FrontendBundle:Default:producto_editar.html.twig',
                array(
                    'formulario' => $formulario->createView(),
                    'productoId' => $productoId
            )
        );  

    }
    
    /**
     * Visualizar anuncio
     * @return type
     */
    public function verAction($id){
    // Obtener los datos del usuario logueado y utilizarlos para
    $producto = new Products;
    // Obtener los datos del usuario logueado y utilizarlos para
//    $usuarioContext = $this->get('security.context')->getToken()->getUser();
//    $formulario = $this->createForm(new UsuarioEditarType(), $usuario);
    
    $em = $this->getDoctrine()->getManager();                
//    $productos = $fabricantes = $em->getRepository('EntidadesBundle:Products')->findBy(array('usuarioId' => $usuarioContext->getId()), null, 1);
    $producto = $em->getRepository('EntidadesBundle:Products')->find($id);
//    $producto = $productos[0];        
    $formulario = $this->createForm(new ProductsType(), $producto);
    
    $peticion = $this->getRequest();
    
    // rellenar un formulario de registro.
    //
    // Si la petición es GET, mostrar el formulario
    // Si la petición es POST, actualizar la información del usuario con
    // los nuevos datos obtenidos del formulario
    
    if ($peticion->getMethod() == 'POST') {
        echo '<br/>entro en el post de verAnuncioAction';
        /*
        $passwordOriginal = $formulario->getData()->getPassword();
        
        $formulario->bind($peticion);
        if ($formulario->isValid()) {
            
            if (null == $usuario->getPassword()) {
                $usuario->setPassword($passwordOriginal);
            }else {
//                $encoder = $this->get('security.encoder_factory')
//                ->getEncoder($usuario);
//                $usuario->setSalt(md5(time()));
//                $passwordCodificado = $encoder->encodePassword(
//                $usuario->getPassword(),
//                $usuario->getSalt()
//                );
//                $usuario->setPassword($passwordCodificado);
            }return $this->render(
                'FrontendBundle:Default:producto_ver.html.twig',
                array('producto' => $producto));

                // actualizar el perfil del usuario
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($usuario);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info',
                'Los datos de tu perfil se han actualizado correctamente'
                );
                return $this->redirect($this->generateUrl('usuario_perfil'));

        }else{
            $this->get('session')->getFlashBag()->add('info',
                'Error en la actualizacion de datos'
                );
        }*/
    }    
    
    return $this->render(
                'FrontendBundle:Default:producto_ver.html.twig',
                array('producto' => $producto));

    }

    public function carruselAction($id){
        
        //***buscar los productos seleccionados
    $producto = array();
    /*return $this->render(
                'PortadaBundle:Portada:producto_carrusel.html.twig',
                array('producto' => $producto));

    }*/
    return $this->render(
                'PortadaBundle:Portada:bootstrapTest.html.twig',
                array('producto' => $producto));

    }
    
    /**
     * El metodo funciona en el momento de editar la imagen
     * @param type $producto
     * @return type
     */
    public function eliminarImagenesVacias($producto){
        $productsImages = new ProductsImages();
        $imagenesAsociadas = array();
        foreach ($producto->getProductsImagesCollection() as $productsImages){            
            if (null === $productsImages->getWebPath()) {
//                echo '<br/><br/>Se elimina la imagen con id '.$productsImages->getId();
//                echo '<br/>Se elimina la imagen con htmlContent '.$productsImages->getHtmlcontent();
//                echo '<br/>Se elimina la imagen con image '.$productsImages->getImage();
//                echo '<br/>Se elimina la imagen con nombreImagen '.$productsImages->getNombreImagen();
//                echo '<br/>Se elimina la imagen con path '.$productsImages->getPath();                
//                echo '<br/>Se elimina la imagen con sortOrder '.$productsImages->getSortOrder();
//                echo '<br/>Se elimina la imagen con webPath '.$productsImages->getWebPath();
//                echo '<br/>Se elimina la imagen con fileImage '.$productsImages->getfileImage().'<br/><br/>';
                continue;
            }
            
            $imagenesAsociadas[] = $productsImages;
                                    
        }
        $producto->setProductsImagesCollection($imagenesAsociadas);
        return $producto;
    }
}
