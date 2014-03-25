<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReineType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text', array( 
                                'attr' => array(
                                'class' => 'form-control',
                                )))
            ->add('mere','text', array(
                                'required' => false,
                                'attr' => array(
                                'class' => 'form-control',
                                'label' => 'Mère')))
            ->add('race', 'entity', array(
                                'required' => false,
                                'class'=> 'BEEServicesBeeeaseBundle:race',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('provenance', 'entity', array(
                                'required' => false,
                                'class'=> 'BEEServicesBeeeaseBundle:provenance',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('codeEleveur','text', array(
                                'required' => false,
                                'attr' => array(
                                'class' => 'form-control',
                                'label' => 'Code éleveur')))
            ->add('eleveur','entity', array(
                                'required' => false,
                                'class'=> 'BEEServicesBeeeaseBundle:eleveur',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('fecondation','choice', array(
                                'required' => false,
                                'choices' => array(
                                '0' => 'Naturelle', '1' => 'Artificielle'),
                                'label' => 'Fécondation',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('dateNaissance','date', array(
                                'required' => false,
                                'widget'=>'single_text',
                                'format' =>'dd/MM/yyyy'))
            ->add('dateAcquisition','date', array(
                                'required' => false,
                                'widget'=>'single_text',
                                'format' =>'dd/MM/yyyy'))
            
             ->add('numero','text', array( 
                                'required' => false,
                                'attr' => array(
                                'class' => 'form-control',
                                )))
            ->add('couleur','entity', array(
                                'required' => false,
                                'class'=> 'BEEServicesBeeeaseBundle:couleur',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('clippage','checkbox',array('required' => false))
            ->add('disparitionReine','entity',array(
                                'required' => false,
                                'class'=>'BEEServicesBeeeaseBundle:DisparitionReine',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control',
                                'label'=>'Disparition de la reine')))
            ->add('remarques','textarea',array(
                                'required' => false,
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
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Reine'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_reine';
    }
}
