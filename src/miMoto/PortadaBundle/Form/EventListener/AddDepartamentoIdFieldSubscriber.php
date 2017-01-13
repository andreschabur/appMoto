<?php
 
namespace miMoto\PortadaBundle\Form\EventListener;

 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
 
class AddDepartamentoIdFieldSubscriber implements EventSubscriberInterface
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
 
    private function addDepartamentoIdForm($form, $departamento)
    {
        $form->add($this->factory->createNamed('departamentoId', 'entity', $departamento, array(
            'class'         => 'EntidadesBundle:Departamento',
            'mapped'        => false,
            'empty_value'   => 'Departamento',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('Departamento');
 
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
 
        $departamento= ($data->getCiudadId()) ? $data->getCiudadId()->getDepartamentoId() : null ;
        $this->addDepartamentoIdForm($form, $departamento);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $departamento = array_key_exists('departamento', $data) ? $data['departamento'] : null;
        $this->addDepartamentoIdForm($form, $departamento);
    }
}