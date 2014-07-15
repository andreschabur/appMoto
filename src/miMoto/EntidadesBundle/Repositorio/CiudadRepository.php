<?php

namespace miMoto\EntidadesBundle\Repositorio;

use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Ciudad;




class CiudadRepository extends EntityRepository{
    
    public $imprimirEjecucion = false;    
    
    
    public function findByFiltro($filtro){
        $em = $this->getEntityManager();
        $dql = 'SELECT p FROM EntidadesBundle:Ciudad p WHERE 1 = 1 ';
        $parameters = array();
        
        
        //***Añadir filtros
        

        if($filtro['ciudadId'] != null){
            $dql .=  ' and p.ciudadId = '.$filtro['ciudadId'];
        }
        if($filtro['departamentoId'] != null){
            $dql .=  ' and p.departamentoId = '.$filtro['departamentoId'];
        }
        
        $query = $em->createQuery($dql);
        $query->setParameters($parameters);
        return $query->getResult();
    }
     /**
     * Andres Chabur
     * retorna los creditos de una persona filtrando por el cucod
     * @param type $cucod
     * @return type
     */     
  /*  public function findCreditosPorCodClienteComfamiliar($cucod){        
        $dql = "SELECT cre FROM EntidadesBundle:Credito cre join cre.idsolicitud  sc join sc.cliente cli WHERE cli.cucod = :cucod";
        $query = $this->getEntityManager()->createQuery($dql);
//        $query = $this->getManager()->createQuery($dql);
        $query->setParameter("cucod", $cucod);
        $creditos = $query->getResult();
        return $creditos;
    }      */
               
}
