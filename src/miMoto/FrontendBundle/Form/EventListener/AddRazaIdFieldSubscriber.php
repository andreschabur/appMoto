<?php
 
namespace miMoto\FrontendBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Manufacturers;
use Doctrine\ORM\EntityManager;
 //--Cilindraje
class AddRazaIdFieldSubscriber implements EventSubscriberInterface
{
    private $factory;
//    private $em;
 
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
//        $this->em = $em;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND     => 'preBind'
        );
    }
 
    private function addRazaForm($form, $mascota)
    {
        $form->add($this->factory->createNamed('cilindrajeId',\Symfony\Bridge\Doctrine\Form\Type\EntityType::class, null, array(
            'class'         => 'EntidadesBundle:Cilindraje',
            'placeholder'   => 'Raza',
            'query_builder' => function (EntityRepository $repository) use ($mascota) {
                $qb = $repository->createQueryBuilder('Cilindraje')
                    ->innerJoin('Cilindraje.manufacturersId', 'mascota');
                if ($mascota instanceof Manufacturers) {
//                    echo 'en el if';
                    $qb->where('Cilindraje.manufacturersId = :mascotaId')
                    ->setParameter('mascotaId', $mascota);
                } elseif (is_numeric($mascota)) {
//                    echo 'en el else if';
                    $qb->where('mascota.manufacturersId = :mascota')
                    ->setParameter('mascota', $mascota);
                } else {
//                    var_dump($mascota);
//                    echo 'en el else <br/>';
                    $qb->where('mascota.manufacturersName = :mascota')
                    ->setParameter('mascota', null);
                }
 
                return $qb;
            },
            'auto_initialize' => false,
            'required' =>false
        )));
//        $form->add($this->factory->createNamed('cilindrajeIdFilter',\Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, null,array(
//            'placeholder'   => 'Raza',
//            'choices' => array(),
//            'auto_initialize' => false,
//            'required' =>false
//        )));
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
// echo 'en el preset <br/> ';
// echo $data->getCilindrajeIdFilter().'<br/> ';
//        var_dump($data);
        $mascota = ($data->getCilindrajeId()) ? $data->getCilindrajeId()->getManufacturersId() : null ;
        $this->addRazaForm($form, $mascota);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
// echo 'en el prebind <br/>';
// var_dump($data);
        $mascota = array_key_exists('manufacturersId', $data) ? $data['manufacturersId'] : null;
        $this->addRazaForm($form, $mascota);
    }
    
    private function retornarDatosSql($mascota){
//        $em = $this->getDoctrine()->getManager();                        
        $repository = $this->em->getRepository('EntidadesBundle:Cilindraje');
//        function (EntityRepository $repository) use ($mascota) {
//        EntityRepository $repository = ;
                $qb = $repository->createQueryBuilder('Cilindraje')
                    ->innerJoin('Cilindraje.manufacturersId', 'mascota');
                if ($mascota instanceof Manufacturers) {
                    $qb->where('Cilindraje.manufacturersId = :mascotaId')
                    ->setParameter('mascotaId', $mascota);
                } elseif (is_numeric($mascota)) {
                    $qb->where('manufacturersId.manufacturersId = :mascota')
                    ->setParameter('mascota', $mascota);
                } else {
                    $qb->where('mascota.manufacturersName = :mascota')
                    ->setParameter('mascota', null);
                }
 
                
                $businessUnit = array();
                foreach($qb as $bu){
                     $businessUnit[] = array("id" => $bu->getId(), "name" => $bu->getDescripcion()); // and so on..
                }
                //***
//                return $qb;
                return $businessUnit;
//            }
    }
}