<?php
 
namespace miMoto\FrontendBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use miMoto\EntidadesBundle\Entity\Departamento;
 
class AddCiudadFieldSubscriber implements EventSubscriberInterface
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
 
    private function addCiudadForm($form, $departamento)
    {
        $form->add($this->factory->createNamed('ciudad',\Symfony\Bridge\Doctrine\Form\Type\EntityType::class, null, array(
            'class'         => 'EntidadesBundle:Ciudad',
            'placeholder'   => 'Ciudad',
            'query_builder' => function (EntityRepository $repository) use ($departamento) {
                $qb = $repository->createQueryBuilder('Ciudad')
                    ->innerJoin('Ciudad.departamentoId', 'departamento');
                if ($departamento instanceof Departamento) {
                    echo 'en el if <br/>';
                    $qb->where('Ciudad.departamentoId = :departamentoId')
                    ->setParameter('departamentoId', $departamento);
                } elseif (is_numeric($departamento)) {
                    echo 'en el else if <br/>';
                    $qb->where('departamento.id = :departamento')
                    ->setParameter('departamento', $departamento);
                } else {
                    echo 'en el else <br/>';
                    $qb->where('departamento.descripcion = :departamento')
                    ->setParameter('departamento', null);
                }
 
                return $qb;
            },
            'auto_initialize' => false,
            'required' =>false
        )));
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $departamento = ($data->getCiudad()) ? $data->getCiudad()->getDepartamentoId() : null ;
        $this->addCiudadForm($form, $departamento);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
//        var_dump($data);
        $departamento = array_key_exists('departamento', $data) ? $data['departamento'] : null;
//        echo 'departamento '.$departamento.'<br/>';
        $this->addCiudadForm($form, $departamento);
    }
}