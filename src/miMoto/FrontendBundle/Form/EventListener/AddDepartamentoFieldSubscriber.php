<?php
 
namespace miMoto\FrontendBundle\Form\EventListener;

 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
 
class AddDepartamentoFieldSubscriber implements EventSubscriberInterface
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
 
    private function addDepartamentoForm($form, $pais)
    {
        $form->add($this->factory->createNamed('departamento', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, null, array(
            'class'         => 'EntidadesBundle:Departamento',            
            'placeholder'   => 'Departamento',
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
 $pais = 1;
//        $pais = ($data->getDepartamento()) ? $data->getDepartamento()->getPais() : null ;
        $this->addDepartamentoForm($form, $pais);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 $pais = 1;
//        $pais = array_key_exists('pais', $data) ? $data['pais'] : null;
        $this->addDepartamentoForm($form, $pais);
    }
}