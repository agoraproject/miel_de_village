<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocalisationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ruche', 'entity', array(
                  'class'=>'BEEServicesBeeeaseBundle:Ruche',
                  'empty_value' => 'Choisir ...'))
            ->add('rucher', 'entity', array(
                  'class'=>'BEEServicesBeeeaseBundle:Rucher',
                  'empty_value' => 'Choisir ...'))
            ->add('dateDeplacement','date',array(
                    'label'=>'Date de déplacement'))
            ->add('transhumance','checkbox',array(
                    'required' => false))
            ->add('motifDeplacement','entity',array(
                    'class'=>'BEEServicesBeeeaseBundle:motifDeplacement',
                    'label'=>'Motif de déplacement',
                    'empty_value' => 'Choisir ...',
                    'required' => false))
            ->add('noEmplacement','text',array(
                    'label'=>'Numéro d\'emplacement',
                    'required' => false))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Localisation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_localisation';
    }
}
