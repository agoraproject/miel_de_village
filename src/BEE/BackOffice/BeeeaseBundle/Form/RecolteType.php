<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecolteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('ruche','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:rucher',
                                'empty_value' => 'Choisissez une ruche',
                                'attr' => array(
                                'class' => 'form-control')))    
            ->add('qte','text',array(
                                'attr' => array(
                                'class' => 'form-control',
                                'placeholder' => 'Entrez une quantité',
                                'label'=>'quantité')))
            ->add('typeRecolte','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:typeRecolte',
                                'empty_value' => 'Entrez un type de récolte',
                                'attr' => array(
                                'class' => 'form-control',
                                 )))   
            ->add('natureRecolte','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:natureRecolte',
                                'empty_value' => 'Entrez une nature de récolte',
                                'attr' => array(
                                'class' => 'form-control',
                                 )))   
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Recolte'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_recolte';
    }
}
