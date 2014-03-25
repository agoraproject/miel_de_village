<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apiclass
 *
 * @ORM\Table(name="apiclass")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ApiclassRepository")
 */
class Apiclass
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
     * @var integer
     *
     * @ORM\Column(name="buckfast", type="integer")
     */
    private $buckfast;

    /**
     * @var integer
     *
     * @ORM\Column(name="linguistica", type="integer")
     */
    private $linguistica;

    /**
     * @var integer
     *
     * @ORM\Column(name="carnica", type="integer")
     */
    private $carnica;

    /**
     * @var integer
     *
     * @ORM\Column(name="cecropia", type="integer")
     */
    private $cecropia;

    /**
     * @var integer
     *
     * @ORM\Column(name="cypria", type="integer")
     */
    private $cypria;

    /**
     * @var integer
     *
     * @ORM\Column(name="anatolia", type="integer")
     */
    private $anatolia;

    /**
     * @var integer
     *
     * @ORM\Column(name="vaucasica", type="integer")
     */
    private $vaucasica;

    /**
     * @var integer
     *
     * @ORM\Column(name="mellifera", type="integer")
     */
    private $mellifera;

    /**
     * @var integer
     *
     * @ORM\Column(name="intermissa", type="integer")
     */
    private $intermissa;

    /**
     * @var integer
     *
     * @ORM\Column(name="lamarckii", type="integer")
     */
    private $lamarckii;

    /**
     * @var integer
     *
     * @ORM\Column(name="sahariensis", type="integer")
     */
    private $sahariensis;

    /**
     * @var integer
     *
     * @ORM\Column(name="adansonii", type="integer")
     */
    private $adansonii;

    /**
     * @var integer
     *
     * @ORM\Column(name="syriava", type="integer")
     */
    private $syriava;

    /**
     * @var integer
     *
     * @ORM\Column(name="meda", type="integer")
     */
    private $meda;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Reine",inversedBy="apiclass", cascade={"persist"})
     * @ORM\JoinColumn(name="reine_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * @var integer 
     */
    protected $reine;

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
     * Set buckfast
     *
     * @param integer $buckfast
     * @return Apiclass
     */
    public function setBuckfast($buckfast)
    {
        $this->buckfast = $buckfast;
    
        return $this;
    }

    /**
     * Get buckfast
     *
     * @return integer 
     */
    public function getBuckfast()
    {
        return $this->buckfast;
    }

    /**
     * Set linguistica
     *
     * @param integer $linguistica
     * @return Apiclass
     */
    public function setLinguistica($linguistica)
    {
        $this->linguistica = $linguistica;
    
        return $this;
    }

    /**
     * Get linguistica
     *
     * @return integer 
     */
    public function getLinguistica()
    {
        return $this->linguistica;
    }

    /**
     * Set carnica
     *
     * @param integer $carnica
     * @return Apiclass
     */
    public function setCarnica($carnica)
    {
        $this->carnica = $carnica;
    
        return $this;
    }

    /**
     * Get carnica
     *
     * @return integer 
     */
    public function getCarnica()
    {
        return $this->carnica;
    }

    /**
     * Set cecropia
     *
     * @param integer $cecropia
     * @return Apiclass
     */
    public function setCecropia($cecropia)
    {
        $this->cecropia = $cecropia;
    
        return $this;
    }

    /**
     * Get cecropia
     *
     * @return integer 
     */
    public function getCecropia()
    {
        return $this->cecropia;
    }

    /**
     * Set cypria
     *
     * @param integer $cypria
     * @return Apiclass
     */
    public function setCypria($cypria)
    {
        $this->cypria = $cypria;
    
        return $this;
    }

    /**
     * Get cypria
     *
     * @return integer 
     */
    public function getCypria()
    {
        return $this->cypria;
    }

    /**
     * Set anatolia
     *
     * @param integer $anatolia
     * @return Apiclass
     */
    public function setAnatolia($anatolia)
    {
        $this->anatolia = $anatolia;
    
        return $this;
    }

    /**
     * Get anatolia
     *
     * @return integer 
     */
    public function getAnatolia()
    {
        return $this->anatolia;
    }

    /**
     * Set vaucasica
     *
     * @param integer $vaucasica
     * @return Apiclass
     */
    public function setVaucasica($vaucasica)
    {
        $this->vaucasica = $vaucasica;
    
        return $this;
    }

    /**
     * Get vaucasica
     *
     * @return integer 
     */
    public function getVaucasica()
    {
        return $this->vaucasica;
    }

    /**
     * Set mellifera
     *
     * @param integer $mellifera
     * @return Apiclass
     */
    public function setMellifera($mellifera)
    {
        $this->mellifera = $mellifera;
    
        return $this;
    }

    /**
     * Get mellifera
     *
     * @return integer 
     */
    public function getMellifera()
    {
        return $this->mellifera;
    }

    /**
     * Set intermissa
     *
     * @param integer $intermissa
     * @return Apiclass
     */
    public function setIntermissa($intermissa)
    {
        $this->intermissa = $intermissa;
    
        return $this;
    }

    /**
     * Get intermissa
     *
     * @return integer 
     */
    public function getIntermissa()
    {
        return $this->intermissa;
    }

    /**
     * Set lamarckii
     *
     * @param integer $lamarckii
     * @return Apiclass
     */
    public function setLamarckii($lamarckii)
    {
        $this->lamarckii = $lamarckii;
    
        return $this;
    }

    /**
     * Get lamarckii
     *
     * @return integer 
     */
    public function getLamarckii()
    {
        return $this->lamarckii;
    }

    /**
     * Set sahariensis
     *
     * @param integer $sahariensis
     * @return Apiclass
     */
    public function setSahariensis($sahariensis)
    {
        $this->sahariensis = $sahariensis;
    
        return $this;
    }

    /**
     * Get sahariensis
     *
     * @return integer 
     */
    public function getSahariensis()
    {
        return $this->sahariensis;
    }

    /**
     * Set adansonii
     *
     * @param integer $adansonii
     * @return Apiclass
     */
    public function setAdansonii($adansonii)
    {
        $this->adansonii = $adansonii;
    
        return $this;
    }

    /**
     * Get adansonii
     *
     * @return integer 
     */
    public function getAdansonii()
    {
        return $this->adansonii;
    }

    /**
     * Set syriava
     *
     * @param integer $syriava
     * @return Apiclass
     */
    public function setSyriava($syriava)
    {
        $this->syriava = $syriava;
    
        return $this;
    }

    /**
     * Get syriava
     *
     * @return integer 
     */
    public function getSyriava()
    {
        return $this->syriava;
    }

    /**
     * Set meda
     *
     * @param integer $meda
     * @return Apiclass
     */
    public function setMeda($meda)
    {
        $this->meda = $meda;
    
        return $this;
    }

    /**
     * Get meda
     *
     * @return integer 
     */
    public function getMeda()
    {
        return $this->meda;
    }
    public function __toString() {
        
    }


    /**
     * Set reine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Reine $reine
     * @return Apiclass
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
}