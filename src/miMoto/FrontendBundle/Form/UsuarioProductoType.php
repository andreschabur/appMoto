<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioProductoType extends AbstractType
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
            ->add('direccion')
            ->add('telefono')
            ->add('telefonodos')
            /*->add('ciudad', 'entity', array(
                'class' => 'miMoto\EntidadesBundle\Entity\Ciudad', 
                'choices' => $options['ciudad'],
                'empty_value' => 'Seleccione una Ciudad',
            ))
            ->add('departamento', 'entity', array(
                'class' => 'miMoto\EntidadesBundle\Entity\Departamento', 
                'choices' => $options['departamento'],
                'empty_value' => 'Seleccione un Departamento',
            ))
            ->add('pais', 'entity', array(
                'class' => 'miMoto\EntidadesBundle\Entity\Pais', 
                'choices' => $options['pais'],
                'empty_value' => 'Seleccione un Pais',
            ))*/ 
            ->add('ciudad', 'choice', array(                
                'choices' => $options['ciudad'],
                'empty_value' => 'Seleccione una Ciudad',
            ))
            ->add('departamento', 'choice', array(              
                'choices' => $options['departamento'],
                'empty_value' => 'Seleccione un Departamento',
            ))
            ->add('pais', 'choice', array(                
                'choices' => $options['pais'],
                'empty_value' => 'Seleccione un Pais',
            ))  
            ->add('identificacion')
            ->add('tipoIdentificacion', 'choice', array(
                'choices' => array(
                    'CC' => 'Cedula',
                    'PA' => 'Pasaporte',
                    'RG' => 'Registro Civil',                                        
                    ),
                'empty_value' => 'Seleccione tipo documento',
                ))
            ->add('productsCollection', 'collection', array('type' => new ProductsType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'miMoto\EntidadesBundle\Entity\Usuario',
            'fabricantes' => true,	    
	    'cilindrajes' => true,	    
	    'opcionesProductos' => true,	    
	    'colores' => true,
            'pais' => true,
            'departamento' => true,
            'ciudad' => true,
        ));
    }

    public function getName()
    {
        return 'mimoto_frontendbundle_usuarioproductotype';
    }
}
