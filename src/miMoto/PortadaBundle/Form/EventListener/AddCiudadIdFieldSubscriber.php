<?php
 
namespace miMoto\PortadaBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Departamento;
 
class AddCiudadIdFieldSubscriber implements EventSubscriberInterface
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
 
    private function addCiudadIdForm($form, $departamento)
    {
        $form->add($this->factory->createNamed('ciudadId','entity', null, array(
            'class'         => 'EntidadesBundle:Ciudad',
            'empty_value'   => 'Ciudad',
            'query_builder' => function (EntityRepository $repository) use ($departamento) {
                $qb = $repository->createQueryBuilder('Ciudad')
                    ->innerJoin('Ciudad.departamentoId', 'departamento');
                if ($departamento instanceof Departamento) {
                    $qb->where('Ciudad.departamentoId = :departamentoId')
                    ->setParameter('departamentoId', $departamento);
                } elseif (is_numeric($departamento)) {
                    $qb->where('departamento.id = :departamento')
                    ->setParameter('departamento', $departamento);
                } else {
                    $qb->where('departamento.descripcion = :departamento')
                    ->setParameter('departamento', null);
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
 
        $departamento = ($data->getCiudadId()) ? $data->getCiudadId()->getDepartamentoId() : null ;
        $this->addCiudadIdForm($form, $departamento);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $departamento = array_key_exists('departamentoId', $data) ? $data['departamentoId'] : null;
        $this->addCiudadIdForm($form, $departamento);
    }
}