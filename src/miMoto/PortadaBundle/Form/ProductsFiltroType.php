<?php

namespace miMoto\PortadaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsFiltroType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {   
        //***
//        $factory = $builder->getFormFactory();
//        //***Añadir subscribers para manejo de combos dependientes departamento - ciudad, tipoMascota - raza
//        $ciudadSubscriber = new AddCiudadFieldSubscriber($factory);
//        $builder->addEventSubscriber($ciudadSubscriber);
//        //***
//        $departamentoSubscriber = new AddDepartamentoFieldSubscriber($factory);
//        $builder->addEventSubscriber($departamentoSubscriber);
        //***
        
        
        $builder                 
                ->add('productsAnioDesdeFilter', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                    'choices' => $options['anios'],
                    'choices_as_values' => true,
                    'placeholder' => 'Desde',
                    'required' => false))                        
                ->add('productsAnioHastaFilter', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                    'choices' => $options['anios'],
                    'placeholder' => 'Hasta',
                    'choices_as_values' => true,
                    'required' => false))                  
                ->add('productsPriceDesdeFilter', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                    'choices' => $options['preciosDesde'],     
                    'placeholder' => 'Desde',
                    'choices_as_values' => false,
                    'required' => false))                
                ->add('productsPriceHastaFilter', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                    'choices' => $options['preciosHasta'],     
                    'placeholder' => 'Hasta',
                    'choices_as_values' => false,
                    'required' => false))                
                ->add('manufacturersIdFilter', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Manufacturers', 
                    'choices' => $options['fabricantes'], 
                    'placeholder' => 'Todos',
                    'required' => false))        
//                ->add('cilindrajeIdFilter',\Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
//                    'placeholder'   => 'Raza',
//                    'choices' => $options['cilindrajes'],
//                    'auto_initialize' => false,
//                    'required' =>false
//                ))
//                ->add('cilindrajeIdFilter', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\Cilindraje', 
//                    'choices' => $options['cilindrajes'], 
//                    'placeholder' => 'Todos',
//                    'required' => false))                                
//                ->add('tipoProductoId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\TipoProducto', 
//                    'placeholder' => 'Todos',
//                    'required' => false))                
//                ->add('ciudadId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\Ciudad', 
//                    'placeholder' => 'Cualquiera',
//                    'required' => false,
//                    'auto_initialize' => false))                
//                ->add('departamentoId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\Departamento', 
//                    'placeholder' => 'Cualquiera',
//                    'required' => false))
                ->addEventSubscriber(new EventListener\AddRazaFieldSubscriber($builder->getFormFactory()))
                ->addEventSubscriber(new EventListener\AddCiudadIdFieldSubscriber($builder->getFormFactory()))
                ->addEventSubscriber(new EventListener\AddDepartamentoIdFieldSubscriber($builder->getFormFactory()))
        ;
        
//                ->add('departamentoId', 'genemu_jqueryselect2_entity', array(
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'miMoto\EntidadesBundle\Entity\Products',
	    'fabricantes' => null,	    
	    'cilindrajes' => null,	    	    
	    'anios' => null,	    	   
            'preciosDesde' => null, 
            'preciosHasta' => null,
            'em' => null,
        ));
    }


        /**
     * @return string
     */
//    public function getName()
//    {
//        return 'mimoto_portadabundle_productsFiltrotype';
//    }

}
