<?php

namespace miMoto\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use miMoto\EntidadesBundle\Entity\Usuario;

use miMoto\LoginBundle\Form\UsuarioType;
use miMoto\LoginBundle\Form\UsuarioEditarType;

use miMoto\EntidadesBundle\Entity\Products;
use miMoto\PortadaBundle\Form\ProductsFiltroType;

class DefaultController extends Controller 
{
    public function indexAction($name)
    {
        return $this->render('LoginBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function testAction()
    {
//        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')){
//            throw new AccessDeniedException();
//        }
        if (false === $this->get('security.context')->isGranted('ROLE_USUARIO')){
            throw new AccessDeniedException();
        }

        $name = 'tu';
//        $usuario = $this->get('security.context')->getToken()->getUser();
//        $nombre = $usuario->getNombre();
//        return $this->render('LoginBundle:Default:index.html.twig', array('name' => $name, 'usuario' => $usuario));
        return $this->render('LoginBundle:Default:index.html.twig', array('name' => $name));
    }
    
       /**
     * @ Route("/login", name="_demo_login")
     * @ Template()
     */
//    public function loginAction(Request $request)
//    {
//        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
//            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
//        } else {
//            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
//        }
//
//        return array(
//            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
//            'error'         => $error,
//        );
//    }
    
//    public function iniciarSesionAction(){
//        $error = array();
//        return $this->render('LoginBundle:Default:login.html.twig', array('error' => $error, 'last_username' => ''));
//    }
    
    
    
    
    public function loginAction() {
//        echo '<br />entro en login action<br />';
        $peticion = $this->getRequest();
//        echo '<br />obtuvo peticion<br />';
        $sesion = $peticion->getSession();        
//        echo '<br />obtuvo sesion<br />';
//        if(isset($_POST['contrasena'])){
//            echo '<br />la contrasena es: ' . $_POST['contrasena'] . '<br />';        
//        }       
//        var_dump($sesion);
        $error = $peticion->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );//        echo '<br />obtuvo error, es : ' . $error . '<br />';        
        $producto = new Products();
        $productoFiltroType = new ProductsFiltroType();
        $em = $this->getDoctrine()->getManager();
        $fabricantes = $em->getRepository('EntidadesBundle:Manufacturers')->findAll();
        $cilindrajes = $em->getRepository('EntidadesBundle:Cilindraje')->findAll();
        $options = array('fabricantes' => $fabricantes, 'cilindrajes' => $cilindrajes);        
        $productoForm = $this->createForm(new $productoFiltroType(), $producto, $options);
        return $this->render(
        'PortadaBundle:Portada:inicio.html.twig',
            array(
                'producto' => $productoForm->createView(),
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error' => $error)
                );
        
        
//        return $this->render('LoginBundle:Default:login.html.twig', array(
//                    'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
//                    'error'
//                    => $error
//                ));                
        
        
        //        echo 'entro en iniciarAction';
     /*   $usuario = new Usuario();
        $formulario = $this->createForm(new UsuarioType(), $usuario);
        $peticion = $this->getRequest();
         if($peticion->getMethod() == 'POST'){
            $formulario->bindRequest($peticion);
//            echo '<br />usuario es: ' . $usuario->getCorreo() . '<br />';
//            echo '<br />contrasena es: ' . $usuario->getPassword() . '<br />';
            
                $em = $this->getDoctrine()->getEntityManager();
                $entities = $em->getRepository('SolicitudBundle:Solicitud')->findAll();  
                foreach ($entities as $entity) {
                    $entity->setDetalleSolicitudCollection($em->getRepository('DetalleSolicitudBundle:DetalleSolicitud')->findDetalleSolicitudBySolicitudId($entity->getId()));
                }
                //*************************************Inicio loguear usuario manualmente
                // Tienes que crear la entidad del usuario que quieres loguear, por ejemplo  
//                $em = $this->getDoctrine()->getEntityManager();  
                $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUsuarioByCorreo($usuario->getCorreo());  

                // Si usas FOSUserBundle puedes sacar así el $providerKey  
//                $providerKey = $this->container->getParameter('fos_user.firewall_name');  
                // Si no, puedes simplemente poner el nombre del firewall de tu aplicación  
                $providerKey = 'main';  

                // Si usas FOSUserBundle y has creado la entidad puedes sacar así los roles del user  
                echo 'Bienvenido: ' . $usuario->getNombre() . ' ' . $usuario->getApellido(); 
                $roles = $usuario->getRoles();  
//                echo 'roles son : ' . $roles[0];
                // Si no puedes hacerlo manualmente  
//                $roles = array('ROLE_USER');  

                // Finalmente logueamos al usuario  
                $token = new UsernamePasswordToken($usuario, null, $providerKey, $roles);  
                $this->container->get('security.context')->setToken($token);  

                // Y si lo crees necesario le rediriges con un mensajito  
                $this->get("session")->setFlash('info', $this->get('translator')->trans('flash.logged_successfully'));  

                return $this->redirect($this->generateUrl('solicitud'));
                //*************************************Fin loguear usuario manualmente
//                return $this->render('SolicitudBundle:Default:index.html.twig', array('entities' => $entities));            
            
        }
        return $this->render('UsuarioBundle:Default:iniciarSesion.html.twig', array('formulario' => $formulario->createView()));
//        return $this->render('UsuarioBundle:Default:iniciarSesion.html.twig');
    }*/
        
    }
    
   /* public function login_checkAction(){
        if(isset($_POST['contrasena'])){
            echo '<br />la contrasena es: ' . $_POST['contrasena'] . '<br />';        
        }
        echo 'entro en chequear action';
    }
    
   
    public function securityCheckAction()
    {
        echo 'entro en securytiCheck';
        // The security layer will intercept this request
    }*/
    
//    public function iniciarAction(){
////        echo 'entro en iniciarAction';
//        $usuario = new Usuario();
//        $formulario = $this->createForm(new UsuarioType(), $usuario);
//        $peticion = $this->getRequest();
//         if($peticion->getMethod() == 'POST'){
//            $formulario->bindRequest($peticion);
////            echo '<br />usuario es: ' . $usuario->getCorreo() . '<br />';
////            echo '<br />contrasena es: ' . $usuario->getPassword() . '<br />';
//            if($this->validarSec($usuario)){
//                $em = $this->getDoctrine()->getEntityManager();
//                $entities = $em->getRepository('SolicitudBundle:Solicitud')->findAll();  
//                foreach ($entities as $entity) {
//                    $entity->setDetalleSolicitudCollection($em->getRepository('DetalleSolicitudBundle:DetalleSolicitud')->findDetalleSolicitudBySolicitudId($entity->getId()));
//                }
//                //*************************************Inicio loguear usuario manualmente
//                // Tienes que crear la entidad del usuario que quieres loguear, por ejemplo  
////                $em = $this->getDoctrine()->getEntityManager();  
//                $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUsuarioByCorreo($usuario->getCorreo());  
//
//                // Si usas FOSUserBundle puedes sacar así el $providerKey  
////                $providerKey = $this->container->getParameter('fos_user.firewall_name');  
//                // Si no, puedes simplemente poner el nombre del firewall de tu aplicación  
//                $providerKey = 'main';  
//
//                // Si usas FOSUserBundle y has creado la entidad puedes sacar así los roles del user  
//                echo 'Bienvenido: ' . $usuario->getNombre() . ' ' . $usuario->getApellido(); 
//                $roles = $usuario->getRoles();  
////                echo 'roles son : ' . $roles[0];
//                // Si no puedes hacerlo manualmente  
////                $roles = array('ROLE_USER');  
//
//                // Finalmente logueamos al usuario  
//                $token = new UsernamePasswordToken($usuario, null, $providerKey, $roles);  
//                $this->container->get('security.context')->setToken($token);  
//
//                // Y si lo crees necesario le rediriges con un mensajito  
//                $this->get("session")->setFlash('info', $this->get('translator')->trans('flash.logged_successfully'));  
//
//                return $this->redirect($this->generateUrl('solicitud'));
//                //*************************************Fin loguear usuario manualmente
////                return $this->render('SolicitudBundle:Default:index.html.twig', array('entities' => $entities));            
//            }
//        }
//        return $this->render('UsuarioBundle:Default:iniciarSesion.html.twig', array('formulario' => $formulario->createView()));
////        return $this->render('UsuarioBundle:Default:iniciarSesion.html.twig');
//    }
    
    public function cerrarAction(){
//        echo 'entro a cerrar sesion';
//        $usuario = new Usuario();
//        $formulario = $this->createForm(new UsuarioType(), $usuario);
//        $peticion = $this->getRequest();
        //***Cerrar sesion del usuario
        $this->get("request")->getSession()->invalidate();
        $this->get("security.context")->setToken(null);
        //***Mostrar mensaje
//        $this->get("session")->setFlash('message.success', true);
//        return new RedirectResponse($this->generateUrl('homepage'));
//        return $this->render('LoginBundle:Default:hastaLuego.html.twig', array('formulario' => $formulario->createView()));
        return $this->render('LoginBundle:Default:hastaLuego.html.twig', array());
    }
    
//    public function validarSec(Usuario $usuario){
//        $iniciarSesionControl = new \IniciarSesionControl();
//        $esValido = $iniciarSesionControl->iniciarSesion($usuario->getCorreo(), $usuario->getPassword());        
////        echo '<br /> es valido en sec: ' . $esValido . '<br />';
//        return $esValido;        
//    }
    
    public function registroAction(){
        /*Crear formulario quemado en la clase
//        $usuario = new Usuario();
//        $formulario = $this->createFormBuilder($usuario)
//                ->add('nombre')
//                ->add('apellidos')
//                ->add('direccion', 'text')
//                ->add('fechaNacimiento', 'date')
//                ->getForm();
//        return $this->render('LoginBundle:Default:registro.html.twig',
//                array('formulario' => $formulario->createView())
//                );         
         */
        $peticion = $this->getRequest();
        $usuario = new Usuario();
        
        /*$usuario->setPermiteEmail(true);//casilla marcada
        $usuario->setFechaNacimiento(new \DateTime('today - 18 years'));//indica mayor a 18 años*/

        
        $formulario = $this->createForm(new UsuarioType(), $usuario);
        if ($peticion->getMethod() == 'POST') {
        // Validar los datos enviados y guardarlos en la base de datos
//            $formulario->bindRequest($peticion);
            $formulario->bind($peticion);
            if ($formulario->isValid()) {
                
            // guardar la información en la base de datos
//                $encoder = $this->get('security.encoder_factory')
//                ->getEncoder($usuario);
//                $usuario->setSalt(md5(time()));
//                $passwordCodificado = $encoder->encodePassword(
//                $usuario->getPassword(),
//                $usuario->getSalt()
//                );
//                $usuario->setPassword($passwordCodificado);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($usuario);
                $em->flush();
                
                //***Mostrar mensaje flash en la siguiente pagina visitada
                $this->get('session')->getFlashBag()->add('info',
                    '¡Enhorabuena! Te has registrado correctamente en Mi moto'
                    );
                
                //****Registrar usuario en sesion
                $token = new UsernamePasswordToken(
                        $usuario,
                        $usuario->getPassword(),
                        'usuarios',
                        $usuario->getRoles()
                        );
                $this->container->get('security.context')->setToken($token);
                //***Fin registrar usuario en sesion


                return $this->redirect($this->generateUrl('usuario_perfil'));

            }else{
                echo '<br/>No es valido el valid';
            }

        }
        return $this->render(
                'LoginBundle:Default:registro.html.twig',
                array('formulario' => $formulario->createView())
        );
        
    }
    
    public function perfilAction(){
    // Obtener los datos del usuario logueado y utilizarlos para
    $usuario = $this->get('security.context')->getToken()->getUser();        
    
    return $this->render('LoginBundle:Default:perfil.html.twig', array(
                'usuario' => $usuario));    

    }

    public function perfilEditarAction(){
    // Obtener los datos del usuario logueado y utilizarlos para
    $usuario = $this->get('security.context')->getToken()->getUser();
    $em = $this->getDoctrine()->getEntityManager();
    
    //***Armar combos para pasar
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
    
    
    
    
    
    $options = array('pais' => $pais, 'departamento' => $departamento, 'ciudad' => $ciudad);
    $formulario = $this->createForm(new UsuarioEditarType(), $usuario, $options);
    
    $peticion = $this->getRequest();
    
    // rellenar un formulario de registro.
    //
    // Si la petición es GET, mostrar el formulario
    // Si la petición es POST, actualizar la información del usuario con
    // los nuevos datos obtenidos del formulario
    
    if ($peticion->getMethod() == 'POST') {
        
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
            }

                // actualizar el perfil del usuario                
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
        }
    }
    
    return $this->render('LoginBundle:Default:perfil_editar.html.twig', array(
                'usuario' => $usuario,
                'formulario' => $formulario->createView()));    

    }

}
