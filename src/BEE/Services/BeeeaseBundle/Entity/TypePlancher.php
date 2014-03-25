<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePlancher
 *
 * @ORM\Table(name="type_plancher")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\TypePlancherRepository")
 */
class TypePlancher
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    function __construct() {
        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return TypePlancher
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function __toString() {
      return $this->getLibelle();  
    }

}
