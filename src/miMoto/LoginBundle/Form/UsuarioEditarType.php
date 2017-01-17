<?php

namespace miMoto\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use miMoto\FrontendBundle\Form\EventListener\AddCiudadFieldSubscriber;
use miMoto\FrontendBundle\Form\EventListener\AddDepartamentoFieldSubscriber;

class UsuarioEditarType extends AbstractType
{
//    public function buildForm(FormBuilder $builder, array $options)
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('correo', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)            
            ->add('direccion')
            ->add('telefono')
            ->add('telefonodos')
//            ->add('ciudad', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
//                /*'class' => 'miMoto\EntidadesBundle\Entity\Ciudad', */
//                'choices' => $options['ciudad'],
//                'placeholder' => 'Seleccione una Ciudad',
//            ))
//            ->add('departamento', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
//              /*  'class' => 'miMoto\EntidadesBundle\Entity\Departamento', */
//                'choices' => $options['departamento'],
//                'placeholder' => 'Seleccione un Departamento',
//            ))
            ->addEventSubscriber(new AddCiudadFieldSubscriber($builder->getFormFactory()))
            ->addEventSubscriber(new AddDepartamentoFieldSubscriber($builder->getFormFactory()))
            ->add('pais', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                /*'class' => 'miMoto\EntidadesBundle\Entity\Pais', */
                'choices' => $options['pais'],
                'placeholder' => 'Seleccione un Pais',
            ))            
            ->add('identificacion')
            ->add('tipoIdentificacion', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                'choices' => array(
                    'CC' => 'Cedula',
                    'PA' => 'Pasaporte',
                    'RG' => 'Registro Civil',                                        
                    ),
                'placeholder' => 'Seleccione tipo documento',
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'miMoto\EntidadesBundle\Entity\Usuario',
            'pais' => null,
            'departamento' => null,
            'ciudad' => null,
        ));
    }

//    public function getName()
//    {
//        return 'mimoto_loginbundle_usuarioeditartype';
//    }
}
