<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsAttributesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder 
//                ->add('optionsId')
                ->add('optionsLabel', 'hidden')
//                ->add('categoryId')
                ->add('categoryLabel', 'hidden')
                ->add('optionStatus', 'checkbox', array(
                    'required' => false,
                ))
//                ->add('optionsId', 'entity', array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\ProductsOptions',                     
//                    'disabled' => true))
//                ->add('optionsValuesId', 'entity', array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\ProductsOptionsValues', 
//                    'choices' => $options['opcionesProductos']))                
        ;

        /*$builder->addValidator(new CallbackValidator(
                        function(FormInterface $form) {
                            if ($form['isNavidad']->getData() == null && $form['isAnoNuevo']->getData() == null) {
                                $form->addError(new FormError(
                                                'Debe seleccionar navidad o año nuevo o las dos - validacion en SolicitudType'
                                ));
                            }
                        }
        ));*/


//        $builder->add('acepto', 'checkbox', array('property_path' => false));
    }
    
//    public function getDefaultOptions(array $options){
////        return array('cajaCompensacion' => array('0' => 'Seleccione Caja'));        
//        return array('fabricantes' => array('0' => 'Seleccione un fabricante'), 'fabricantes' => array('0' => 'Seleccione Fabricante'));        
//    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(    
            'data_class' => 'miMoto\EntidadesBundle\Entity\ProductsAttributes',
	    'opcionesProductos' => null,	    	    
        ));
    }

    /**
     * @return string
     */
//    public function getName()
//    {
//        return 'mimoto_frontendbundle_productsAttributestype';
//    }

}
