<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_min", type="date")
     */
    private $dateMin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_max", type="date")
     */
    private $dateMax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="effectuer", type="boolean")
     */
    private $effectuer;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text",nullable=true)
     */
    private $notes;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\ActionListe")
     * @var type 
     * @ORM\JoinColumn(name="action_liste_id")
     */
    protected $actionListe;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche", inversedBy="evenements")
     * @var type 
     */
    protected $ruche;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Rucher",inversedBy="evenements")
     * @var type 
     */
    protected $rucher;

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
     * Set titre
     *
     * @param string $titre
     * @return Evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateMin
     *
     * @param \DateTime $dateMin
     * @return Evenement
     */
    public function setDateMin($dateMin)
    {
        $this->dateMin = $dateMin;
    
        return $this;
    }

    /**
     * Get dateMin
     *
     * @return \DateTime 
     */
    public function getDateMin()
    {
        return $this->dateMin;
    }

    /**
     * Set dateMax
     *
     * @param \DateTime $dateMax
     * @return Evenement
     */
    public function setDateMax($dateMax)
    {
        $this->dateMax = $dateMax;
    
        return $this;
    }

    /**
     * Get dateMax
     *
     * @return \DateTime 
     */
    public function getDateMax()
    {
        return $this->dateMax;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Evenement
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Evenement
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set effectuer
     *
     * @param boolean $effectuer
     * @return Evenement
     */
    public function setEffectuer($effectuer)
    {
        $this->effectuer = $effectuer;
    
        return $this;
    }

    /**
     * Get effectuer
     *
     * @return boolean 
     */
    public function getEffectuer()
    {
        return $this->effectuer;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Evenement
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    
        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }
    public function __toString() {
        
    }


    /**
     * Set actionListe
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\ActionListe $actionListe
     * @return Evenement
     */
    public function setActionListe(\BEE\Services\BeeeaseBundle\Entity\ActionListe $actionListe = null)
    {
        $this->actionListe = $actionListe;
    
        return $this;
    }

    /**
     * Get actionListe
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\ActionListe 
     */
    public function getActionListe()
    {
        return $this->actionListe;
    }

    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Evenement
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
     * Set rucher
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Rucher $rucher
     * @return Evenement
     */
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
}