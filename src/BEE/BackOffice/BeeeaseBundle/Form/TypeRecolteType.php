<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeRecolteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle','text',array(
                  'label'=>'Type de récolte'
                  ));
        
            //->add('natureRecolte','entity',array('class'=> 'BEE\Services\BeeeaseBundle\Entity\NatureRecolte',
                 //  'label'=>'Nature de la  récolte'
                 // ));
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\TypeRecolte'
           
        ));
   }
// public function getDefaultOptions(array $options)
//    {
//        return array(
//            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\TypeRecolte',
//        );
//    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_typerecolte';
    }
}
