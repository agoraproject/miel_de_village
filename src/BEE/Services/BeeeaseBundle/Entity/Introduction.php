<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Introduction
 *
 * @ORM\Table(name="introduction")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\IntroductionRepository")
 */
class Introduction
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
     * @var integer
     *
     * @ORM\Column(name="qte_reine", type="integer")
     */
    private $qteReine;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche")
     * @var type 
     * 
     */
     protected $ruche;
     /**
      * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Reine", inversedBy="introductions")
      * @var type 
      */
     protected $reine;
     /**
      * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Elevage")
      * @var type 
      */
     protected $elevage;
     /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\StatutReine")
     * @var integer 
     * @ORM\JoinColumn(name="statut_reine_id") 
     * @ORM\JoinColumn(nullable=false)
     * 
     */
     protected $statutReine;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Introduction
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
     * Set qteReine
     *
     * @param integer $qteReine
     * @return Introduction
     */
    public function setQteReine($qteReine)
    {
        $this->qteReine = $qteReine;
    
        return $this;
    }

    /**
     * Get qteReine
     *
     * @return integer 
     */
    public function getQteReine()
    {
        return $this->qteReine;
    }
    public function __toString() {
        
    }


    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Introduction
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
     * Set reine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Reine $reine
     * @return Introduction
     */
    public function setReine(\BEE\Services\BeeeaseBundle\Entity\Reine $reine = null)
    {
        $this->reine = $reine;
    
        return $this;
    }

    /**
     * Get reine
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Reine 
     */
    public function getReine()
    {
        return $this->reine;
    }

    /**
     * Set elevage
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Elevage $elevage
     * @return Introduction
     */
    public function setElevage(\BEE\Services\BeeeaseBundle\Entity\Elevage $elevage = null)
    {
        $this->elevage = $elevage;
    
        return $this;
    }

    /**
     * Get elevage
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Elevage 
     */
    public function getElevage()
    {
        return $this->elevage;
    }

    /**
     * Set statutReine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\StatutReine $statutReine
     * @return Introduction
     */
    public function setStatutReine(\BEE\Services\BeeeaseBundle\Entity\StatutReine $statutReine = null)
    {
        $this->statutReine = $statutReine;
    
        return $this;
    }

    /**
     * Get statutReine
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\StatutReine 
     */
    public function getStatutReine()
    {
        return $this->statutReine;
    }
}