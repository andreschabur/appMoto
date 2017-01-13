<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder                 
//        ->add('productsModel')
        ->add('negociable', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
            'choices' => array('SI' => 'Si',
                'NO' => 'No')
            ))
                ->add('productsFileImage')
                ->add('productsPrice')
//                ->add('productsQuantity')
                ->add('manufacturersId',  \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Manufacturers', 
                    'choices' => $options['fabricantes'], 
                    'placeholder' => 'Tipo de mascota',))                
//                ->add('tipoProductoId', 'entity', array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\TipoProducto', 
//                    'empty_value' => 'Seleccione un Tipo',))                
                ->add('cilindrajeId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Cilindraje', 
                    'choices' => $options['cilindrajes'], 
                    'placeholder' => 'Seleccione un Cilindraje',))                
                ->add('colorId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'miMoto\EntidadesBundle\Entity\Color',
                    'choices' => $options['colores'],
                    'placeholder' => 'Seleccione un Color',))                   
//                ->add('placa')
                /*->add('anio', 'choice', array(
                    'choices' => $options['anios'],
                    'empty_value' => 'Seleccione Año',))*/
                ->add('anio', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, array(
                    'choices' => $this->generarArrayAnios(),
                    'placeholder' => 'Seleccione Año'
                ))                    
                ->add('observacion', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class, array(
                    'max_length' => 255,
                    'required' => false,))               
                ->add('productsAttributesCollection', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array('type' => new ProductsAttributesType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options' => array('opcionesProductos' => $options['opcionesProductos'])))
                ->add('productsTipoPublicacionCollection', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array('type' => new ProductsTipoPublicacionType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,))
                ->add('productsImagesCollection', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array('type' => new ProductsImagesType(),
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
//        $fechaActual = new \DateTime;
//        $anioActual = $fechaActual->format('Y');
//        $mesActual = $fechaActual->format('m');
        $anios = array();
//        if($mesActual > 6){
//            $anioActual = $anioActual + 1;
//        }
        for ($contadorAnios = 0; $contadorAnios <= 30; $contadorAnios++) {
            $anios[$contadorAnios] = $contadorAnios;
        }
        return $anios;
        
    }

}
