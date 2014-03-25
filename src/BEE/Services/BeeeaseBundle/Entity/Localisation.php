<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localisation
 *
 * @ORM\Table(name="localisation")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\LocalisationRepository")
 */
class Localisation
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
     * @ORM\Column(name="date_deplacement", type="date")
     */
    private $dateDeplacement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="transhumance", type="boolean")
     */
    private $transhumance;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_emplacement", type="integer")
     */
    private $noEmplacement;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\MotifDeplacement")
     * @var integer
     * @ORM\JoinColumn(name="motif_deplacement_id")
     */
    protected $motifDeplacement;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Rucher")
     * 
     * @var integer
     */
    protected $rucher;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche")
     * @var integer 
     * @ORM\JoinColumn(name="ruche_id") 
     * 
     */
    protected $ruche;
    
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
     * Set dateDeplacement
     *
     * @param \DateTime $dateDeplacement
     * @return Localisation
     */
    public function setDateDeplacement($dateDeplacement)
    {
        $this->dateDeplacement = $dateDeplacement;
    
        return $this;
    }

    /**
     * Get dateDeplacement
     *
     * @return \DateTime 
     */
    public function getDateDeplacement()
    {
        return $this->dateDeplacement;
    }

    /**
     * Set transhumance
     *
     * @param boolean $transhumance
     * @return Localisation
     */
    public function setTranshumance($transhumance)
    {
        $this->transhumance = $transhumance;
    
        return $this;
    }

    /**
     * Get transhumance
     *
     * @return boolean 
     */
    public function getTranshumance()
    {
        return $this->transhumance;
//        if ($this->transhumance < 1)
//            return "non";
//        else
//            return "oui";
    }
    
      public function getintituleTranshumance()
    {
      $this->transhumance == false ? $intituleTranshumance = 'non' : $intituleTranshumance = 'oui';
      return $intituleTranshumance;
    }

    /**
     * Set noEmplacement
     *
     * @param integer $noEmplacement
     * @return Localisation
     */
    public function setNoEmplacement($noEmplacement)
    {
        $this->noEmplacement = $noEmplacement;
    
        return $this;
    }

    /**
     * Get noEmplacement
     *
     * @return integer 
     */
    public function getNoEmplacement()
    {
        return $this->noEmplacement;
    }
    public function __toString() {
        return $this->getRuche();
    }


  
    public function setRucher(\BEE\Services\BeeeaseBundle\Entity\Rucher $rucher = null)
    {
        $this->rucher = $rucher;
    
        return $this;
    }

    /**
     * Get rucher
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Rucher 
     */
    public function getRucher()
    {
        return $this->rucher;
    }

    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Localisation
     */
    public function setRuche(\BEE\Services\BeeeaseBundle\Entity\Ruche $ruche = null)
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
     * Set motifDeplacement
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\MotifDeplacement $motifDeplacement
     * @return Localisation
     */
    public function setMotifDeplacement(\BEE\Services\BeeeaseBundle\Entity\MotifDeplacement $motifDeplacement = null)
    {
        $this->motifDeplacement = $motifDeplacement;
    
        return $this;
    }

    /**
     * Get motifDeplacement
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\MotifDeplacement 
     */
    public function getMotifDeplacement()
    {
        return $this->motifDeplacement;
    }
}