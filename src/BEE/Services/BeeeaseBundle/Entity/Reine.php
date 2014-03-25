<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reine
 *
 * @ORM\Table(name="reine")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ReineRepository")
 */
class Reine
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
     * @ORM\Column(name="nom", type="string", length=30)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mere", type="string", length=30)
     */
    private $mere;

    /**
     * @var string
     *
     * @ORM\Column(name="code_eleveur", type="string", length=30)
     */
    private $codeEleveur;

    /**
     * @var string
     *
     * @ORM\Column(name="fecondation", type="string", length=20)
     */
    private $fecondation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_acquisition", type="date")
     */
    private $dateAcquisition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="clippage", type="boolean")
     */
    private $clippage;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="text",nullable = true)
     */
    private $remarques;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Eleveur")
     * @var type 
     */
    protected $eleveur;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Provenance")
     * @var type 
     */
    protected $provenance;
   
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Couleur")
     * @var type 
     */
    protected $couleur;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Race")
     * @var type 
     */
    protected $race;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\DisparitionReine")
     * @var type 
     * @ORM\JoinColumn(name="disparition_reine_id")
     */
    protected $disparitionReine;
    /**
     * @ORM\OneToMany(targetEntity="BEE\Services\BeeeaseBundle\Entity\Apiclass", mappedBy="reine", orphanRemoval=true, cascade={"remove"})
     * @var type 
     */
    private $apiclass;
    /**
     * @ORM\OneToMany(targetEntity="BEE\Services\BeeeaseBundle\Entity\Introduction", mappedBy="reine")
     * @var integer 
     */
    private $introductions;
    
    
    function __construct() {
      $this->apiclass =  new \Doctrine\Common\Collections\ArrayCollection(); 
      $this->introductions = new \Doctrine\Common\Collections\ArrayCollection();
      
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
     * Set nom
     *
     * @param string $nom
     * @return Reine
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mere
     *
     * @param string $mere
     * @return Reine
     */
    public function setMere($mere)
    {
        $this->mere = $mere;
    
        return $this;
    }

    /**
     * Get mere
     *
     * @return string 
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * Set codeEleveur
     *
     * @param string $codeEleveur
     * @return Reine
     */
    public function setCodeEleveur($codeEleveur)
    {
        $this->codeEleveur = $codeEleveur;
    
        return $this;
    }

    /**
     * Get codeEleveur
     *
     * @return string 
     */
    public function getCodeEleveur()
    {
        return $this->codeEleveur;
    }

    /**
     * Set fecondation
     *
     * @param string $fecondation
     * @return Reine
     */
    public function setFecondation($fecondation)
    {
        $this->fecondation = $fecondation;
    
        return $this;
    }

    /**
     * Get fecondation
     *
     * @return string 
     */
    public function getFecondation()
    {
         return $this->fecondation;
    }

    /**
     * Get fecondation
     *
     * @return string 
     */
    public function getintituleFecondation()
    {
      $this->fecondation == false ? $intituleFecondation = 'Naturelle' : $intituleFecondation = 'Artificielle';
      return $intituleFecondation;
    }
    
      public function getintituleClippage()
    {
      $this->clippage == false ? $intituleClippage = 'non' : $intituleClippage = 'oui';
      return $intituleClippage;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Reine
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set dateAcquisition
     *
     * @param \DateTime $dateAcquisition
     * @return Reine
     */
    public function setDateAcquisition($dateAcquisition)
    {
        $this->dateAcquisition = $dateAcquisition;
    
        return $this;
    }

    /**
     * Get dateAcquisition
     *
     * @return \DateTime 
     */
    public function getDateAcquisition()
    {
        return $this->dateAcquisition;
    }

    /**
     * Set clippage
     *
     * @param boolean $clippage
     * @return Reine
     */
    public function setClippage($clippage)
    {
        $this->clippage = $clippage;
    
        return $this;
    }

    /**
     * Get clippage
     *
     * @return boolean 
     */
    public function getClippage()
    {
        return $this->clippage;
//        if($this->clippage == true)
//            return "oui";
//        else
//            return "non";
    }

    /**
     * Set remarques
     *
     * @param string $remarques
     * @return Reine
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    
        return $this;
    }

    /**
     * Get remarques
     *
     * @return string 
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Reine
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    /**
     * Set eleveur
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Eleveur $eleveur
     * @return Reine
     */
    public function setEleveur(\BEE\Services\BeeeaseBundle\Entity\Eleveur $eleveur = null)
    {
        $this->eleveur = $eleveur;
    
        return $this;
    }

    /**
     * Get eleveur
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Eleveur 
     */
    public function getEleveur()
    {
        return $this->eleveur;
    }

    /**
     * Set provenance
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Provenance $provenance
     * @return Reine
     */
    public function setProvenance(\BEE\Services\BeeeaseBundle\Entity\Provenance $provenance = null)
    {
        $this->provenance = $provenance;
    
        return $this;
    }

    /**
     * Get provenance
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Provenance 
     */
    public function getProvenance()
    {
        return $this->provenance;
    }

  
    /**
     * Set couleur
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Couleur $couleur
     * @return Reine
     */
    public function setCouleur(\BEE\Services\BeeeaseBundle\Entity\Couleur $couleur = null)
    {
        $this->couleur = $couleur;
    
        return $this;
    }

    /**
     * Get couleur
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Couleur 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set race
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Race $race
     * @return Reine
     */
    public function setRace(\BEE\Services\BeeeaseBundle\Entity\Race $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Race 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set disparitionReine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\DisparitionReine $disparitionReine
     * @return Reine
     */
    public function setDisparitionReine(\BEE\Services\BeeeaseBundle\Entity\DisparitionReine $disparitionReine = null)
    {
        $this->disparitionReine = $disparitionReine;
    
        return $this;
    }

    /**
     * Get disparitionReine
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\DisparitionReine 
     */
    public function getDisparitionReine()
    {
        return $this->disparitionReine;
    }

    /**
     * Add apiclass
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Apiclass $apiclass
     * @return Reine
     */
    public function addApiclas(\BEE\Services\BeeeaseBundle\Entity\Apiclass $apiclass)
    {
        $this->apiclass[] = $apiclass;
    
        return $this;
    }

    /**
     * Remove apiclass
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Apiclass $apiclass
     */
    public function removeApiclas(\BEE\Services\BeeeaseBundle\Entity\Apiclass $apiclass)
    {
        $this->apiclass->removeElement($apiclass);
    }

    /**
     * Get apiclass
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApiclass()
    {
        return $this->apiclass;
    }

    /**
     * Add introductions
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Introduction $introductions
     * @return Reine
     */
    public function addIntroduction(\BEE\Services\BeeeaseBundle\Entity\Introduction $introductions)
    {
        $this->introductions[] = $introductions;
    
        return $this;
    }

    /**
     * Remove introductions
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Introduction $introductions
     */
    public function removeIntroduction(\BEE\Services\BeeeaseBundle\Entity\Introduction $introductions)
    {
        $this->introductions->removeElement($introductions);
    }

    /**
     * Get introductions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntroductions()
    {
        return $this->introductions;
    }
    
    public function __toString() {
        return $this->getNom();
    }
}