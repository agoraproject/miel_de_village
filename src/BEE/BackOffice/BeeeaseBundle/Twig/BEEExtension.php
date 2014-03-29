<?php
// src/BEE/BackOffice/BeeeaseBundle/Twig/BEEExtension.php
namespace BEE\BackOffice\BeeeaseBundle\Twig;

class BEEExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'booltoyesno' => new \Twig_Filter_Method($this, 'booltoyesnoFilter'),
        );
    }

    public function booltoyesnoFilter($bool)
    {
        if($bool==true)
            return "Oui";
        elseif($bool==false)
            return "Non";
    }

    public function getName()
    {
        return 'BEE_extension';
    }
}
