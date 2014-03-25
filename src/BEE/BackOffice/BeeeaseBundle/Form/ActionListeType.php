<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionListeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('typeAction')
            ->add('codeAction')
            ->add('qteAffichage','choice', array(
                 'choices' => array(
                        '0' => '', '1' => '1', '2' => '2', '3' => '3'),
                'label' => "quantité affichage"))
            ->add('uniteQte','choice', array(
                  'choices' => array(
                        '0' => '', '1' => 'litre', '2' => 'kilo'),
                'label' => "unité quantité"));
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\ActionListe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_actionliste';
    }
}
