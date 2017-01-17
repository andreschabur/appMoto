<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsTipoPublicacionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder 
//                ->add('optionsId', 'hidden')
//                ->add('descripcion')
//                ->add('cantidad_fotos')
//                ->add('categoryId')
//                ->add('ubicacion')
//                ->add('precio')
//                ->add('optionStatus', 'checkbox', array(
//                    'required' => false,))
                ->add('tipoPublicacionId', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'miMoto\EntidadesBundle\Entity\TipoPublicacion',                     
                    'disabled' => false,
                    'expanded' => true,
                    'multiple' => false,
                    ))
//                ->add('optionsValuesId', 'entity', array(
//                    'class' => 'miMoto\EntidadesBundle\Entity\ProductsOptionsValues', 
//                    'choices' => $options['opcionesProductos']))                
        ;
        
    }    

    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(    
            'data_class' => 'miMoto\EntidadesBundle\Entity\ProductsTipoPublicacion',	    
        ));
    }

    /**
     * @return string
     */
//    public function getName()
//    {
//        return 'mimoto_frontendbundle_productstipopublicaciontype';
//    }

}
