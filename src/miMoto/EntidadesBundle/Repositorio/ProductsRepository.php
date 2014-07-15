<?php

namespace miMoto\EntidadesBundle\Repositorio;

use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Products;




class ProductsRepository extends EntityRepository{
    
    public $imprimirEjecucion = false;    
    
    
    public function findByFiltro($producto){
        $em = $this->getEntityManager();
        $dql = 'SELECT p FROM EntidadesBundle:Products p join p.usuarioId u WHERE 1 = 1 ';
        $parameters = array();
        
        
        //***Añadir filtros
        $dql .= ' and p.productsStatus = true ';

        if($producto->getProductsAnioDesdeFilter() != null){
            $dql .=  ' and p.anio >= '.$producto->getProductsAnioDesdeFilter();            
        }
        if($producto->getProductsAnioHastaFilter() != null){
            $dql .=  ' and p.anio <= '.$producto->getProductsAnioHastaFilter();            
        }
        if($producto->getProductsPriceDesdeFilter() != null){
            $dql .=  ' and p.productsPrice >= '.$producto->getProductsPriceDesdeFilter();            
        }
        if($producto->getProductsPriceHastaFilter() != null){
            $dql .=  ' and p.productsPrice <= '.$producto->getProductsPriceHastaFilter();
        }            
        if($producto->getCilindrajeIdFilter() != null){
            $dql .=  ' and p.cilindrajeId = '.$producto->getCilindrajeIdFilter()->getId();            
        }
        if($producto->getManufacturersIdFilter() != null){
            $dql .=  ' and p.manufacturersId = '.$producto->getManufacturersIdFilter()->getManufacturersId();
        }
        if($producto->getDepartamentoId() != null){
            $dql .=  ' and u.departamento = '.$producto->getDepartamentoId()->getId();
//            $dql .=  ' and p.departamentoId = '.$producto->getDepartamentoId();
        }                        
        if($producto->getTipoProductoId() != null){
            $dql .=  ' and p.tipoProductoId = '.$producto->getTipoProductoId()->getId();
        }        
        
//        foreach($filtros as $key => $value){
//            if($value != null && trim($value) != ''){
//                $dql.=" and c.".$key." = ".":".$key;
//                $parameters[$key] = $value;
//            } 
//        }
        
        
//        echo $dql."<br>";print_r($parameters);exit();
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
