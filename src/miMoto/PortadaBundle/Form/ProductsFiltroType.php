<?php

namespace miMoto\PortadaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductsFiltroType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder                 
                ->add('productsAnioDesdeFilter', 'choice', array(
                    'choices' => $options['anios'],
                    'empty_value' => 'Desde',
                    'required' => false))                        
                ->add('productsAnioHastaFilter', 'choice', array(
                    'choices' => $options['anios'],
                    'empty_value' => 'Hasta',
                    'required' => false))                  
                ->add('productsPriceDesdeFilter', 'choice', array(
                    'choices' => $options['preciosDesde'],     
                    'empty_value' => 'Desde',
                    'required' => false))                
                ->add('productsPriceHastaFilter', 'choice', array(
                    'choices' => $options['preciosHasta'],     
                    'empty_value' => 'Hasta',
                    'required' => false))                
                ->add('manufacturersIdFilter', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Manufacturers', 
                    'choices' => $options['fabricantes'], 
                    'empty_value' => 'Todos',
                    'required' => false))                
                ->add('cilindrajeIdFilter', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Cilindraje', 
                    'choices' => $options['cilindrajes'], 
                    'empty_value' => 'Todos',
                    'required' => false))                                
                ->add('tipoProductoId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\TipoProducto', 
                    'empty_value' => 'Todos',
                    'required' => false))                
                ->add('departamentoId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Departamento', 
                    'empty_value' => 'Todos',
                    'required' => false))                
        ;
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'miMoto\EntidadesBundle\Entity\Products',
	    'fabricantes' => true,	    
	    'cilindrajes' => true,	    	    
	    'anios' => true,	    	   
            'preciosDesde' => true, 
            'preciosHasta' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mimoto_portadabundle_productsFiltrotype';
    }

}
