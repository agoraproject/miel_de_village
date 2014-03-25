<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApiclassType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('buckfast')
            ->add('linguistica')
            ->add('carnica')
            ->add('cecropia')
            ->add('cypria')
            ->add('anatolia')
            ->add('vaucasica')
            ->add('mellifera')
            ->add('intermissa')
            ->add('lamarckii')
            ->add('sahariensis')
            ->add('adansonii')
            ->add('syriava')
            ->add('meda')
            ->add('reine')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Apiclass'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_apiclass';
    }
}
