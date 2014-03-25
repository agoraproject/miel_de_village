<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AjouterRucheType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text',array(
                                'attr' => array(
                                'class' => 'form-control',
                                'placeholder' => 'Saisissez le nom de la ruche')))
            ->add('rucher', 'entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:rucher',
                                'empty_value' => 'Où se trouve la ruche',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('statut','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:statut',
                                'empty_value' => 'Quel est son statut',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('reine','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:reine',
                                'empty_value' => 'Ajoutez une reine',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('sourceColonie','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:sourceColonie',
                                'empty_value' => 'Source de la colonie',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('typeRuche','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:typeRuche',
                                'empty_value' => 'Type de ruche',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('fabrication','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:fabrication',
                                'empty_value' => 'Choisir une fabrication',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('typePlancher','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:typePlancher',
                                'empty_value' => 'Type de plancher',
                                'attr' => array(
                                'class' => 'form-control')))
                
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\AjouterRuche'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_ajouterruche';
    }
}
