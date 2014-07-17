<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

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
                'auto_initialize' => false,
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
        
        /*$ff = $builder->getFormFactory();

        // function to add 'template' choice field dynamically 
        $func = function (FormEvent $e) use ($ff) {
            $data = $e->getData();
            $form = $e->getForm();
            if ($form->has('ciudad')) {
                $form->remove('ciudad');
            }
            
            // During form creation setData() is called with null as an argument
            // by the FormBuilder constructor. We're only concerned with when
            // setData is called with an actual Entity object in it (whether new,
            // or fetched with Doctrine). This if statement let's us skip right
            // over the null condition.
//            if (null === $data) {
//                return;
//            }

//            $cat = isset($data['departamento'])?$data['departamento']:null;
//        $cat = isset($data->getDepartamento())?$data->getDepartamento():null;
            $cat = null;
            if($data->getDepartamento() != null){
                $cat = $data->getDepartamento();
            }

            // here u can populate ur choices in a manner u do it in loadChoices
            $choices = array();
//            echo '<br/>Cat es '.$cat;
//            var_dump($data);
//            if ($cat == 66) {
//                $choices = array('3' => '3', '4' => '4');
//            }

//            $form->add($ff->createNamed('ciudad', 'choice', null, compact('choices')));
            $form->add($ff->createNamed('ciudad', 'choice', null, array(
                'choices' => $choices,
                'empty_value' => 'Seleccione una Ciudad',
                'auto_initialize' => false)));
        };

        // Register the function above as EventListener on PreSet and PreBind
        $builder->addEventListener(FormEvents::PRE_SET_DATA, $func);
        $builder->addEventListener(FormEvents::PRE_BIND, $func);*/
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
