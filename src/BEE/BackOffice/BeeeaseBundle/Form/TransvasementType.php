<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TransvasementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date','date',array(
                  'label'=>'Date du transvasement'))
            ->add('ruche','entity',array(
                  'class'=>'BEEServicesBeeeaseBundle:Ruche',
                  'label'=>'Ruche de destination',
                  'empty_value' => 'Choisir ...'))
            ->add('origineRuche','entity',array(
                  'class'=>'BEEServicesBeeeaseBundle:Ruche',
                  'label'=>'Ruche d\'origine',
                  'empty_value' => 'Choisir ...'))
            ->add('sourceColonie','entity',array(
                 'class'=>'BEEServicesBeeeaseBundle:sourceColonie',
                'label'=>'Source de la colonie',
                  'empty_value' => 'Choisir ...'))
            ->add('typeRuche','entity',array(
                'class'=>'BEEServicesBeeeaseBundle:typeRuche',
                'label'=>'Type de ruche',
                'empty_value' => 'Choisir ...'))
            ->add('nbreCadres','choice',array(
                     'choices' => array(
                     '0' => 'Choisir...', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6' => '6','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12'),
                     'label'=>'Nbre de cadres',
                  ))
            ->add('fabrication','entity',array(
                    'class'=>'BEEServicesBeeeaseBundle:Fabrication',))
            ->add('typePlancher','entity',array(
                    'class'=>'BEEServicesBeeeaseBundle:typePlancher',
                'label'=>'Type de plancher'))
            ->add('notes','textarea',array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Transvasement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_transvasement';
    }
}
