<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder                 
        ->add('productsModel')
        ->add('negociable', 'choice', array(
            'choices' => array('SI' => 'Si',
                'NO' => 'No')
            ))
                ->add('productsFileImage')
                ->add('productsPrice')
                ->add('productsQuantity')
                ->add('manufacturersId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Manufacturers', 
                    'choices' => $options['fabricantes'], 
                    'empty_value' => 'Seleccione un Fabricante',))                
                ->add('tipoProductoId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\TipoProducto', 
                    'empty_value' => 'Seleccione un Tipo',))                
                ->add('cilindrajeId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Cilindraje', 
                    'choices' => $options['cilindrajes'], 
                    'empty_value' => 'Seleccione un Cilindraje',))                
                ->add('colorId', 'entity', array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Color',
                    'choices' => $options['colores'],
                    'empty_value' => 'Seleccione un Color',))                   
                ->add('placa')
                /*->add('anio', 'choice', array(
                    'choices' => $options['anios'],
                    'empty_value' => 'Seleccione Año',))*/
                ->add('anio', 'choice', array(
                    'choices' => $this->generarArrayAnios(),
                    'empty_value' => 'Seleccione Año'
                ))                    
                ->add('observacion', 'textarea', array(
                    'max_length' => 255,
                    'required' => false,))               
                ->add('productsAttributesCollection', 'collection', array('type' => new ProductsAttributesType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options' => array('opcionesProductos' => $options['opcionesProductos'])))
                ->add('productsTipoPublicacionCollection', 'collection', array('type' => new ProductsTipoPublicacionType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,))
                ->add('productsImagesCollection', 'collection', array('type' => new ProductsImagesType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,))
                ->add('captcha', 'captcha')
        ;        

//        $builder->add('acepto', 'checkbox', array('property_path' => false));
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
	    'opcionesProductos' => true,	    
	    'colores' => null,	    	    
        ));
    }

    /**
     * @return string
     */
//    public function getName()
//    {
//        return 'mimoto_fontendbundle_productstype';
//    }
    
    public function generarArrayAnios(){
        $fechaActual = new \DateTime;
        $anioActual = $fechaActual->format('Y');
        $mesActual = $fechaActual->format('m');
        $anios = array();
        if($mesActual > 6){
            $anioActual = $anioActual + 1;
        }
        for ($contadorAnios = 1930; $contadorAnios < $anioActual; $anioActual--) {
            $anios[$anioActual] = $anioActual;
        }
        return $anios;
        
    }

}
