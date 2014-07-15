<?php

namespace miMoto\EntidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $name = $name . ' desde el controlador de entidades';
        return $this->render('EntidadesBundle:Default:index.html.twig', array('name' => $name));
    }
}
