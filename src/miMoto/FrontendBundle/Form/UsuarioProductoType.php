<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
            ->add('correo', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
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
//            ->add('ciudad', 'choice', array(  
//                'auto_initialize' => false,
//                'choices' => $options['ciudad'],
//                'empty_value' => 'Seleccione una Ciudad',
//            ))
//            ->add('departamento', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(              
//                'choices' => $options['departamento'],
//                'placeholder' => 'Seleccione un Departamento',
//            ))
            ->addEventSubscriber(new EventListener\AddCiudadFieldSubscriber($builder->getFormFactory()))
            ->addEventSubscriber(new EventListener\AddDepartamentoFieldSubscriber($builder->getFormFactory()))
            ->add('pais', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(                
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
            ->add('productsCollection', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array('entry_type' => new ProductsType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                ))
//                ->add('password')
//                ->add('plainPassword', RepeatedType::class, array(
            ->add('password', \Symfony\Component\Form\Extension\Core\Type\RepeatedType::class, array(
                'type' => \Symfony\Component\Form\Extension\Core\Type\PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repita Password'),
            ))
                
                
            /*->add('termsAccepted', CheckboxType::class, array(
                'mapped' => false,
                'constraints' => new IsTrue(),
            ))*/
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
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'miMoto\EntidadesBundle\Entity\Usuario',
            'fabricantes' => null,	    
	    'cilindrajes' => null,	    
	    'colores' => null,
	    'opcionesProductos' => null,
            'pais' => null,
            'departamento' => null,
            'ciudad' => null,
        ));
    }

//    public function getName()
//    {
//        return 'mimoto_frontendbundle_usuarioproductotype';
//    }
}
