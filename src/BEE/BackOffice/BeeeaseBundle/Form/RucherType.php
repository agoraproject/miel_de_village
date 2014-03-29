<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RucherType extends AbstractType
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
                                'class' => 'form-control')))
           
            ->add('adresse','text',array(
                                'attr' => array(
                                'class' => 'form-control' )))
            ->add('cp','text',array(
                                'attr' => array(
                                'class' => 'form-control' )))
            ->add('ville','text',array(
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('pays','text',array(
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('latitude', 'text', array(
                                'attr' => array(
                                'class' => 'form-control',
                                'required' => false)))
            ->add('longitude','text',array(
                                'attr' => array(
                                'class' => 'form-control',
                                'required' => false)))
            ->add('altitude','text',array(
                                'attr' => array(
                                'class' => 'form-control',
                                'required' => false)))
            ->add('description','textarea',array(
                                'attr' => array(
                                'class' => 'form-control',
                                'required' => false))) 
            ->add('submit','submit',array(
                                'label' => 'Enregistrer',
                                'attr' => array(
                                'class' => 'btn btn-default pull-right'
                                ))) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Rucher'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_rucher';
    }
}
