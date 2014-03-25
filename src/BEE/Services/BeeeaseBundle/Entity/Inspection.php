<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inspection
 *
 * @ORM\Table(name="inspection")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\InspectionRepository")
 * 
 */
class Inspection
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
     * @ORM\Column(name="activite_trou_envol", type="integer")
     */
    private $activiteTrouEnvol;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oeufs_vus", type="boolean")
     */
    private $oeufsVus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reine_vue", type="boolean", nullable = true)
     */
    private $reineVue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="moisissure", type="boolean", nullable = true)
     */
    private $moisissure;

    /**
     * @var boolean
     *
     * @ORM\Column(name="abeilles_sol_visite", type="boolean", nullable = true)
     */
    private $abeillesSolVisite;

    /**
     * @var integer
     *
     * @ORM\Column(name="t_meteo", type="integer")
     */
    private $tMeteo;

    /**
     * @var integer
     *
     * @ORM\Column(name="vent", type="integer")
     */
    private $vent;

    /**
     * @var integer
     *
     * @ORM\Column(name="tenue_cadre", type="integer")
     */
    private $tenueCadre;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_couvain_ferme", type="integer", nullable = true)
     */
    private $cadreCouvainFerme;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_couvain_ouvert", type="integer", nullable = true)
     */
    private $cadreCouvainOuvert;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_couvain_male", type="integer", nullable = true)
     */
    private $cadreCouvainMale;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_miel", type="integer", nullable = true)
     */
    private $cadreMiel;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_pollen", type="integer", nullable = true)
     */
    private $cadrePollen;

    /**
     * @var integer
     *
     * @ORM\Column(name="peuplement", type="integer")
     */
    private $peuplement;

    /**
     * @var integer
     *
     * @ORM\Column(name="repartition_couvain", type="integer")
     */
    private $repartitionCouvain;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte_cellule_royale", type="integer", nullable = true)
     */
    private $qteCelluleRoyale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cellule_royale_essaimage", type="boolean", nullable = true)
     */
    private $celluleRoyaleEssaimage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cellule_royale_supersedure", type="boolean", nullable = true)
     */
    private $celluleRoyaleSupersedure;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cellule_royale_sauvete", type="boolean", nullable = true)
     */
    private $celluleRoyaleSauvete;

    /**
     * @var integer
     *
     * @ORM\Column(name="poids_inspection", type="integer")
     */
    private $poidsInspection;

    /**
     * @var boolean
     *
     * @ORM\Column(name="abeilles_trainantes", type="boolean", nullable = true)
     */
    private $abeillesTrainantes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="abeilles_ailes_deformees", type="boolean", nullable = true)
     */
    private $abeillesAilesDeformees;

    /**
     * @var boolean
     *
     * @ORM\Column(name="varroa_abeilles", type="boolean", nullable = true)
     */
    private $varroaAbeilles;

    /**
     * @var integer
     *
     * @ORM\Column(name="fecondite_eval", type="integer")
     */
    private $feconditeEval;

    /**
     * @var integer
     *
     * @ORM\Column(name="ardeur_travail_eval", type="integer")
     */
    private $ardeurTravailEval;

    /**
     * @var integer
     *
     * @ORM\Column(name="resistance_maladie_eval", type="integer")
     */
    private $resistanceMaladieEval;


    /**
     * @var integer
     *
     * @ORM\Column(name="douceur_eval", type="integer")
     */
    private $douceurEval;

    /**
     * @var integer
     *
     * @ORM\Column(name="hivernage_eval", type="integer", nullable = true)
     */
    private $hivernageEval;

    /**
     * @var integer
     *
     * @ORM\Column(name="propolis_eval", type="integer")
     */
    private $propolisEval;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable = true)
     */
    private $notes;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche", inversedBy="inspections") //@ORM\JoinColumn(name="ruche_id", referencedColumnName="id", nullable=false)
     * @var type 
     */
    protected $ruche;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\CdtsMeteo")
     * @var type 
     */
    protected $meteo;
    /**
     * @ORM\ManyToMany(targetEntity="BEE\Services\BeeeaseBundle\Entity\Affection", cascade={"persist"})
     * @var type 
     */
    protected $affections;
    
    function __construct() {
        $this->affections = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Inspection
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
     * Set activiteTrouEnvol
     *
     * @param integer $activiteTrouEnvol
     * @return Inspection
     */
    public function setActiviteTrouEnvol($activiteTrouEnvol)
    {
        $this->activiteTrouEnvol = $activiteTrouEnvol;
    
        return $this;
    }

    /**
     * Get activiteTrouEnvol
     *
     * @return integer 
     */
    public function getActiviteTrouEnvol()
    {
        return $this->activiteTrouEnvol;
    }

    /**
     * Set oeufsVus
     *
     * @param boolean $oeufsVus
     * @return Inspection
     */
    public function setOeufsVus($oeufsVus)
    {
        $this->oeufsVus = $oeufsVus;
    
        return $this;
    }

    /**
     * Get oeufsVus
     *
     * @return boolean 
     */
    public function getOeufsVus()
    {
        return $this->oeufsVus;
    }

 
    /**
     * Set moisissure
     *
     * @param boolean $moisissure
     * @return Inspection
     */
    public function setMoisissure($moisissure)
    {
        $this->moisissure = $moisissure;
    
        return $this;
    }

    /**
     * Get moisissure
     *
     * @return boolean 
     */
    public function getMoisissure()
    {
        return $this->moisissure;
    }

    /**
     * Set abeillesSolVisite
     *
     * @param boolean $abeillesSolVisite
     * @return Inspection
     */
    public function setAbeillesSolVisite($abeillesSolVisite)
    {
        $this->abeillesSolVisite = $abeillesSolVisite;
    
        return $this;
    }

    /**
     * Get abeillesSolVisite
     *
     * @return boolean 
     */
    public function getAbeillesSolVisite()
    {
        return $this->abeillesSolVisite;
    }

    /**
     * Set tMeteo
     *
     * @param integer $tMeteo
     * @return Inspection
     */
    public function setTMeteo($tMeteo)
    {
        $this->tMeteo = $tMeteo;
    
        return $this;
    }

    /**
     * Get tMeteo
     *
     * @return integer 
     */
    public function getTMeteo()
    {
        return $this->tMeteo;
    }

    /**
     * Set vent
     *
     * @param integer $vent
     * @return Inspection
     */
    public function setVent($vent)
    {
        $this->vent = $vent;
    
        return $this;
    }

    /**
     * Get vent
     *
     * @return integer 
     */
    public function getVent()
    {
        return $this->vent;
    }

    /**
     * Set tenueCadre
     *
     * @param integer $tenueCadre
     * @return Inspection
     */
    public function setTenueCadre($tenueCadre)
    {
        $this->tenueCadre = $tenueCadre;
    
        return $this;
    }

    /**
     * Get tenueCadre
     *
     * @return integer 
     */
    public function getTenueCadre()
    {
        return $this->tenueCadre;
    }

    /**
     * Set cadreCouvainFerme
     *
     * @param integer $cadreCouvainFerme
     * @return Inspection
     */
    public function setCadreCouvainFerme($cadreCouvainFerme)
    {
        $this->cadreCouvainFerme = $cadreCouvainFerme;
    
        return $this;
    }

    /**
     * Get cadreCouvainFerme
     *
     * @return integer 
     */
    public function getCadreCouvainFerme()
    {
        return $this->cadreCouvainFerme;
    }

    /**
     * Set cadreCouvainOuvert
     *
     * @param integer $cadreCouvainOuvert
     * @return Inspection
     */
    public function setCadreCouvainOuvert($cadreCouvainOuvert)
    {
        $this->cadreCouvainOuvert = $cadreCouvainOuvert;
    
        return $this;
    }

    /**
     * Get cadreCouvainOuvert
     *
     * @return integer 
     */
    public function getCadreCouvainOuvert()
    {
        return $this->cadreCouvainOuvert;
    }

    /**
     * Set cadreCouvainMale
     *
     * @param integer $cadreCouvainMale
     * @return Inspection
     */
    public function setCadreCouvainMale($cadreCouvainMale)
    {
        $this->cadreCouvainMale = $cadreCouvainMale;
    
        return $this;
    }

    /**
     * Get cadreCouvainMale
     *
     * @return integer 
     */
    public function getCadreCouvainMale()
    {
        return $this->cadreCouvainMale;
    }

    /**
     * Set cadreMiel
     *
     * @param integer $cadreMiel
     * @return Inspection
     */
    public function setCadreMiel($cadreMiel)
    {
        $this->cadreMiel = $cadreMiel;
    
        return $this;
    }

    /**
     * Get cadreMiel
     *
     * @return integer 
     */
    public function getCadreMiel()
    {
        return $this->cadreMiel;
    }

    /**
     * Set cadrePollen
     *
     * @param integer $cadrePollen
     * @return Inspection
     */
    public function setCadrePollen($cadrePollen)
    {
        $this->cadrePollen = $cadrePollen;
    
        return $this;
    }

    /**
     * Get cadrePollen
     *
     * @return integer 
     */
    public function getCadrePollen()
    {
        return $this->cadrePollen;
    }

    /**
     * Set peuplement
     *
     * @param integer $peuplement
     * @return Inspection
     */
    public function setPeuplement($peuplement)
    {
        $this->peuplement = $peuplement;
    
        return $this;
    }

    /**
     * Get peuplement
     *
     * @return integer 
     */
    public function getPeuplement()
    {
        return $this->peuplement;
    }

    /**
     * Set repartitionCouvain
     *
     * @param integer $repartitionCouvain
     * @return Inspection
     */
    public function setRepartitionCouvain($repartitionCouvain)
    {
        $this->repartitionCouvain = $repartitionCouvain;
    
        return $this;
    }

    /**
     * Get repartitionCouvain
     *
     * @return integer 
     */
    public function getRepartitionCouvain()
    {
        return $this->repartitionCouvain;
    }

    /**
     * Set qteCelluleRoyale
     *
     * @param integer $qteCelluleRoyale
     * @return Inspection
     */
    public function setQteCelluleRoyale($qteCelluleRoyale)
    {
        $this->qteCelluleRoyale = $qteCelluleRoyale;
    
        return $this;
    }

    /**
     * Get qteCelluleRoyale
     *
     * @return integer 
     */
    public function getQteCelluleRoyale()
    {
        return $this->qteCelluleRoyale;
    }

    /**
     * Set celluleRoyaleEssaimage
     *
     * @param boolean $celluleRoyaleEssaimage
     * @return Inspection
     */
    public function setCelluleRoyaleEssaimage($celluleRoyaleEssaimage)
    {
        $this->celluleRoyaleEssaimage = $celluleRoyaleEssaimage;
    
        return $this;
    }

    /**
     * Get celluleRoyaleEssaimage
     *
     * @return boolean 
     */
    public function getCelluleRoyaleEssaimage()
    {
        return $this->celluleRoyaleEssaimage;
    }

    /**
     * Set celluleRoyaleSupersedure
     *
     * @param boolean $celluleRoyaleSupersedure
     * @return Inspection
     */
    public function setCelluleRoyaleSupersedure($celluleRoyaleSupersedure)
    {
        $this->celluleRoyaleSupersedure = $celluleRoyaleSupersedure;
    
        return $this;
    }

    /**
     * Get celluleRoyaleSupersedure
     *
     * @return boolean 
     */
    public function getCelluleRoyaleSupersedure()
    {
        return $this->celluleRoyaleSupersedure;
    }

    /**
     * Set celluleRoyaleSauvete
     *
     * @param boolean $celluleRoyaleSauvete
     * @return Inspection
     */
    public function setCelluleRoyaleSauvete($celluleRoyaleSauvete)
    {
        $this->celluleRoyaleSauvete = $celluleRoyaleSauvete;
    
        return $this;
    }

    /**
     * Get celluleRoyaleSauvete
     *
     * @return boolean 
     */
    public function getCelluleRoyaleSauvete()
    {
        return $this->celluleRoyaleSauvete;
    }

    /**
     * Set poidsInspection
     *
     * @param integer $poidsInspection
     * @return Inspection
     */
    public function setPoidsInspection($poidsInspection)
    {
        $this->poidsInspection = $poidsInspection;
    
        return $this;
    }

    /**
     * Get poidsInspection
     *
     * @return integer 
     */
    public function getPoidsInspection()
    {
        return $this->poidsInspection;
    }

    /**
     * Set abeillesTrainantes
     *
     * @param boolean $abeillesTrainantes
     * @return Inspection
     */
    public function setAbeillesTrainantes($abeillesTrainantes)
    {
        $this->abeillesTrainantes = $abeillesTrainantes;
    
        return $this;
    }

    /**
     * Get abeillesTrainantes
     *
     * @return boolean 
     */
    public function getAbeillesTrainantes()
    {
        return $this->abeillesTrainantes;
    }

    /**
     * Set abeillesAilesDeformees
     *
     * @param boolean $abeillesAilesDeformees
     * @return Inspection
     */
    public function setAbeillesAilesDeformees($abeillesAilesDeformees)
    {
        $this->abeillesAilesDeformees = $abeillesAilesDeformees;
    
        return $this;
    }

    /**
     * Get abeillesAilesDeformees
     *
     * @return boolean 
     */
    public function getAbeillesAilesDeformees()
    {
        return $this->abeillesAilesDeformees;
    }

    /**
     * Set varroaAbeilles
     *
     * @param boolean $varroaAbeilles
     * @return Inspection
     */
    public function setVarroaAbeilles($varroaAbeilles)
    {
        $this->varroaAbeilles = $varroaAbeilles;
    
        return $this;
    }

    /**
     * Get varroaAbeilles
     *
     * @return boolean 
     */
    public function getVarroaAbeilles()
    {
        return $this->varroaAbeilles;
    }

    /**
     * Set feconditeEval
     *
     * @param integer $feconditeEval
     * @return Inspection
     */
    public function setFeconditeEval($feconditeEval)
    {
        $this->feconditeEval = $feconditeEval;
    
        return $this;
    }

    /**
     * Get feconditeEval
     *
     * @return integer 
     */
    public function getFeconditeEval()
    {
        return $this->feconditeEval;
    }

    /**
     * Set ardeurTravailEval
     *
     * @param integer $ardeurTravailEval
     * @return Inspection
     */
    public function setArdeurTravailEval($ardeurTravailEval)
    {
        $this->ardeurTravailEval = $ardeurTravailEval;
    
        return $this;
    }

    /**
     * Get ardeurTravailEval
     *
     * @return integer 
     */
    public function getArdeurTravailEval()
    {
        return $this->ardeurTravailEval;
    }

    /**
     * Set resistanceMaladieEval
     *
     * @param integer $resistanceMaladieEval
     * @return Inspection
     */
    public function setResistanceMaladieEval($resistanceMaladieEval)
    {
        $this->resistanceMaladieEval = $resistanceMaladieEval;
    
        return $this;
    }

    /**
     * Get resistanceMaladieEval
     *
     * @return integer 
     */
    public function getResistanceMaladieEval()
    {
        return $this->resistanceMaladieEval;
    }

    /**
     * Set douceurEval
     *
     * @param integer $douceurEval
     * @return Inspection
     */
    public function setDouceurEval($douceurEval)
    {
        $this->douceurEval = $douceurEval;
    
        return $this;
    }

    /**
     * Get douceurEval
     *
     * @return integer 
     */
    public function getDouceurEval()
    {
        return $this->douceurEval;
    }

    /**
     * Set hivernageEval
     *
     * @param integer $hivernageEval
     * @return Inspection
     */
    public function setHivernageEval($hivernageEval)
    {
        $this->hivernageEval = $hivernageEval;
    
        return $this;
    }

    /**
     * Get hivernageEval
     *
     * @return integer 
     */
    public function getHivernageEval()
    {
        return $this->hivernageEval;
    }

    /**
     * Set propolisEval
     *
     * @param integer $propolisEval
     * @return Inspection
     */
    public function setPropolisEval($propolisEval)
    {
        $this->propolisEval = $propolisEval;
    
        return $this;
    }

    /**
     * Get propolisEval
     *
     * @return integer 
     */
    public function getPropolisEval()
    {
        return $this->propolisEval;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Inspection
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



   /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Inspection
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
     * Set meteo
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\CdtsMeteo $meteo
     * @return Inspection
     */
    public function setMeteo(\BEE\Services\BeeeaseBundle\Entity\CdtsMeteo $meteo = null)
    {
        $this->meteo = $meteo;
    
        return $this;
    }

    /**
     * Get meteo
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\CdtsMeteo 
     */
    public function getMeteo()
    {
        return $this->meteo;
    }

    /**
     * Add affections
     *
     * @param \Sdz\BlogBundle\Entity\Affection $affections
     * @return Inspection
     */
    public function addAffection(\Sdz\BlogBundle\Entity\Affection $affections)
    {
        $this->affections[] = $affections;
    
        return $this;
    }

    /**
     * Remove affections
     *
     * @param \Sdz\BlogBundle\Entity\Affection $affections
     */
    public function removeAffection(\Sdz\BlogBundle\Entity\Affection $affections)
    {
        $this->affections->removeElement($affections);
    }

    /**
     * Get affections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAffections()
    {
        return $this->affections;
    }

    /**
     * Set reineVue
     *
     * @param boolean $reineVue
     * @return Inspection
     */
    public function setReineVue($reineVue)
    {
        $this->reineVue = $reineVue;
    
        return $this;
    }

    /**
     * Get reineVue
     *
     * @return boolean 
     */
    public function getReineVue()
    {
        return $this->reineVue;
    }
        public function __toString() {
        //return $this->
    }
    
}