<?php
 
namespace miMoto\PortadaBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Manufacturers;
 //--Cilindraje
class AddRazaFieldSubscriber implements EventSubscriberInterface
{
    private $factory;
 
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
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
        $form->add($this->factory->createNamed('cilindrajeIdFilter','entity', null, array(
            'class'         => 'EntidadesBundle:Cilindraje',
            'empty_value'   => 'Raza',
            'query_builder' => function (EntityRepository $repository) use ($mascota) {
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
 
                return $qb;
            },
            'auto_initialize' => false
        )));
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
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
 
        $mascota = array_key_exists('manufacturersId', $data) ? $data['manufacturersId'] : null;
        $this->addRazaForm($form, $mascota);
    }
}