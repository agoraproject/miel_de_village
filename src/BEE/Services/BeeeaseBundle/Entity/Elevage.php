<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;
/**
 * Elevage
 *
 * @ORM\Table(name="elevage")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ElevageRepository")
 */
class Elevage
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
     * @var \Date
     *
     * @ORM\Column(name="date_elevage", type="date")
     */
    private $dateElevage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_greffage", type="integer")
     */
    private $nbreGreffage;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Reine")
     * @var type 
     */
    protected $reine;
    /**
     * @ORM\OneToMany(targetEntity="BEE\Services\BeeeaseBundle\Entity\Introduction", mappedBy="elevage")
     * @var integer 
     */
    private $introductions;
    
    function __construct() {
        
     $this->dateElevage  = new \DateTime(); 
      $this->introductions = new \Doctrine\Common\Collections\ArrayCollection();  
      $this->name = $this->id;
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
     * Set dateElevage
     *
     * @param \DateTime $dateElevage
     * @return Elevage
     */
    public function setDateElevage($dateElevage)
    {
        $this->dateElevage = $dateElevage;
    
        return $this;
    }

    /**
     * Get dateElevage
     *
     * @return \DateTime 
     */
    public function getDateElevage()
    {
        return $this->dateElevage;
    }

    /**
     * Set nbreGreffage
     *
     * @param integer $nbreGreffage
     * @return Elevage
     */
    public function setNbreGreffage($nbreGreffage)
    {
        $this->nbreGreffage = $nbreGreffage;
    
        return $this;
    }

    /**
     * Get nbreGreffage
     *
     * @return integer 
     */
    public function getNbreGreffage()
    {
        return $this->nbreGreffage;
    }


    /**
     * Set reine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Reine $reine
     * @return Elevage
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
 
    public function __toString() {
        return "elevage ".$this->reine." ".$this->dateElevage->format('d/m/Y');
    }
}