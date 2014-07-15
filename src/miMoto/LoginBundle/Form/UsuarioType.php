<?php

namespace miMoto\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
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
            ->add('correo', 'email')
//            ->add('salt')
//            ->add('password', 'password')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'options' => array('label' => ' ')
                ))
//->add('permite_email', 'checkbox', array('required' => false))
//                ->add('fecha_nacimiento', 'birthday')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'miMoto\EntidadesBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'mimoto_loginbundle_usuariotype';
    }
}
