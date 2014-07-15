<?php

namespace miMoto\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductsImagesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder 
               /* ->add('path')
                ->add('image')*/
                ->add('fileImage')
                ->add('nombreImagen', 'hidden')
        ;
    }    
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(    
            'data_class' => 'miMoto\EntidadesBundle\Entity\ProductsImages',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mimoto_frontendbundle_productsImagestype';
    }

}
