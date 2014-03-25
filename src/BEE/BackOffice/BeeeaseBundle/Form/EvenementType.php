<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvenementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('rucher') 
            ->add('ruche')
            ->add('dateMin')
            ->add('dateMax')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('actionListe')              
            ->add('effectuer','choice',array(
                 'choices' => array(
                        '0' => '', '1' => 'oui', '2' => 'non'),
                    'label' => "Effectué"))
            ->add('notes','textarea',array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Evenement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_evenement';
    }
}
