<?php

namespace BEE\BackOffice\BeeeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InspectionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
            ->add('ruche', 'entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:ruche',
                                'empty_value' => 'Où se trouve la ruche',
                                'attr' => array(
                                'class' => 'form-control')))

            
                 
            ->add('date','date',array(
                    'widget' => 'single_text',
                    'format' =>'dd/MM/yyyy'))
            ->add('activiteTrouEnvol','choice', array(
                         'choices' => array(
                         '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                         'label' => "Activité au trou d'envol",
                         'attr' => array(
                         'class' => 'form-control')))
                
            
            ->add('oeufsVus','checkbox',array('required' => false))
            ->add('reineVue','checkbox',array('required' => false))
            ->add('moisissure','checkbox',array('required' => false))
            ->add('abeillesSolVisite','checkbox',array('required' => false,
               'label'=>'abeilles au sol visite' ))
               
                
            ->add('tMeteo','integer',array(
                  'attr' => array(
                  'label'=>'Température',
                  'class' => 'form-control')))
               
            ->add('vent','choice', array(
                    'choices' => array(
                    '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                    'label' => "Vent",
                    'attr' => array(
                    'class' => 'form-control')))
            ->add('tenueCadre', 'choice', array(
                    'choices' => array(
                    '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                    'label' => "Tenue au cadre",
                    'attr' => array(
                    'class' => 'form-control')))
             ->add('cadreCouvainFerme','choice',array(
                   'choices' => array(
                        '0' => 'aucun', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
                        'label' => "Cadre de couvain fermé",
                        'attr' => array(
                        'class' => 'form-control')))
                 
            ->add('cadreCouvainOuvert','choice',array(
                  'choices' => array(
                        '0' => 'aucun', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
                        'label' => "Cadre de couvain ouvert",
                        'attr' => array(
                        'class' => 'form-control')))
                
            ->add('cadreCouvainMale','choice',array(
                        'choices' => array(
                        '0' => 'aucun', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
                        'label' => "Cadre de couvain mâle",
                        'attr' => array(
                        'class' => 'form-control')))
                
            ->add('cadreMiel','choice',array(
                        'choices' => array(
                        '0' => 'aucun', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
                        'label' => "Cadre de miel",
                        'attr' => array(
                        'class' => 'form-control')))
                
                
            ->add('cadrePollen','choice',array(
                 'choices' => array(
                        '0' => 'aucun', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
                        'label' => "Cadre de pollen",
                        'attr' => array(
                        'class' => 'form-control')))
              
                
            ->add('peuplement','choice', array(
                  'choices' => array(
                       '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                       'label' => "Peuplement",
                       'attr' => array(
                       'class' => 'form-control')))   
                
            ->add('repartitionCouvain', 'choice', array(
                        'choices' => array(
                        '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                        'label' => "Répartition du couvain",
                        'attr' => array(
                        'class' => 'form-control')))
                
            ->add('qteCelluleRoyale','integer',array(
                  'attr' => array(
                  'label'=>'Température',
                  'class' => 'form-control')))
                
            ->add('celluleRoyaleEssaimage','checkbox',array('required' => false))
            ->add('celluleRoyaleSupersedure','checkbox',array('required' => false))
            ->add('celluleRoyaleSauvete','checkbox',array('required' => false))
            ->add('poidsInspection','choice', array(
                       'choices' => array(
                       '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                       'attr' => array(
                       'class' => 'form-control')))
                
            ->add('abeillesTrainantes','checkbox',array('required' => false))
            ->add('abeillesAilesDeformees','checkbox',array('required' => false))
            ->add('varroaAbeilles','checkbox',array('required' => false))
                
            ->add('feconditeEval','choice', array(
                   'choices' => array(
                   '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                   'label' => "Fécondité",
                   'attr' => array(
                   'class' => 'form-control')))
                
            ->add('ardeurTravailEval','choice', array(
                 'choices' => array(
                 '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                 'label' => "Ardeur au travail",
                 'attr' => array(
                 'class' => 'form-control')))
                
            ->add('resistanceMaladieEval','choice', array(
                   'choices' => array(
                   '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                   'label' => "Résistance à la maladie",
                   'attr' => array(
                   'class' => 'form-control')))
                
                
            ->add('douceurEval','choice', array(
                   'choices' => array(
                   '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                   'label' => "Douceur",
                   'attr' => array(
                   'class' => 'form-control')))
                
            ->add('hivernageEval','choice', array(
                   'choices' => array(
                   '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                   'label' => "Hivernage",
                   'attr' => array(
                   'class' => 'form-control')))
                
            ->add('propolisEval','choice', array(
                  'choices' => array(
                  '0' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                  'label' => "Propolis",
                  'attr' => array(
                  'class' => 'form-control')))
           
            ->add('meteo','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:cdtsmeteo',
                                'label'=>'Conditions météo',
                                'attr' => array(
                                'class' => 'form-control',
                                'placeholder' => 'Choisir...',)))
            ->add('affections','entity', array(
                                'class'=> 'BEEServicesBeeeaseBundle:affection',
                                'empty_value' => 'Choisir...',
                                'attr' => array(
                                'class' => 'form-control')))
            ->add('notes','textarea',array('required' => false,
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
            'data_class' => 'BEE\Services\BeeeaseBundle\Entity\Inspection'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bee_services_beeeasebundle_inspection';
    }
}
