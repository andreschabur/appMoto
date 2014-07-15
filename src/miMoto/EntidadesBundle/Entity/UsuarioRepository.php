<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository{

    public function findUsuarioByCorreo($correo){
        $em = $this->getEntityManager();
        $dql = 'SELECT us
            FROM EntidadesBundle:Usuario us             
            WHERE us.correo = :correo';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('correo', $correo);
//        $solicitud = $em->getRepository('SolicitudBundle:Solicitud')->findOneBy(array('id' => $solicitudId));
        $usuarios = $consulta->getResult();
        foreach ($usuarios as $usuario) {
            return $usuario;
        }
        
    }
}

