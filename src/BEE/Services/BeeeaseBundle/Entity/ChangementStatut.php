<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChangementStatut
 *
 * @ORM\Table(name="changement_statut")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ChangementStatutRepository")
 */
class ChangementStatut
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche", inversedBy="changementStatut")
     * @var type 
     * @ORM\JoinColumn(nullable=false) 
     */
    protected $ruche;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Statut")
     * @var type
     * @ORM\JoinColumn(nullable=false) 
     */
    protected $statut;

    /**
     * Get id
     *
     * @return integer 
     */
    
    function __construct() {
        
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ChangementStatut
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    
  

    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return ChangementStatut
     */
    public function setRuche(\BEE\Services\BeeeaseBundle\Entity\Ruche $ruche)
    {
        $this->ruche = $ruche;
    
        return $this;
    }

    /**
     * Get ruche
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Ruche 
     */
    public function getRuche()
    {
        return $this->ruche;
    }

    /**
     * Set statut
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Statut $statut
     * @return ChangementStatut
     */
    public function setStatut(\BEE\Services\BeeeaseBundle\Entity\Statut $statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Statut 
     */
    public function getStatut()
    {
        return $this->statut;
    }
      public function __toString() {
        
         
    }

}