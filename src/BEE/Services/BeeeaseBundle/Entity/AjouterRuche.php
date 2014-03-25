<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AjouterRuche
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\AjouterRucheRepository")
 */
class AjouterRuche
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;
    
    /**
     * @var string
     *
     * @ORM\Column(name="reine", type="string", length=255)
     */
    private $reine;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fabrication", type="string", length=255)
     */
    private $fabrication;

    /**
     * @var string
     *
     * @ORM\Column(name="typeRuche", type="string", length=255)
     */
    private $typeRuche;

    /**
     * @var string
     *
     * @ORM\Column(name="typePlancher", type="string", length=255)
     */
    private $typePlancher;
    
      /**
     * @var string
     *
     * @ORM\Column(name="sourceColonie", type="string", length=255)
     */
    private $sourceColonie;

    /**
     * @var string
     *
     * @ORM\Column(name="rucher", type="string", length=255)
     */
    private $rucher;


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
     * @return AjouterRuche
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
     * Set statut
     *
     * @param string $statut
     * @return AjouterRuche
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set fabrication
     *
     * @param string $fabrication
     * @return AjouterRuche
     */
    public function setFabrication($fabrication)
    {
        $this->fabrication = $fabrication;
    
        return $this;
    }

    /**
     * Get fabrication
     *
     * @return string 
     */
    public function getFabrication()
    {
        return $this->fabrication;
    }

    /**
     * Set typeRuche
     *
     * @param string $typeRuche
     * @return AjouterRuche
     */
    public function setTypeRuche($typeRuche)
    {
        $this->typeRuche = $typeRuche;
    
        return $this;
    }

    /**
     * Get typeRuche
     *
     * @return string 
     */
    public function getTypeRuche()
    {
        return $this->typeRuche;
    }

    /**
     * Set typePlancher
     *
     * @param string $typePlancher
     * @return AjouterRuche
     */
    public function setTypePlancher($typePlancher)
    {
        $this->typePlancher = $typePlancher;
    
        return $this;
    }

    /**
     * Get typePlancher
     *
     * @return string 
     */
    public function getTypePlancher()
    {
        return $this->typePlancher;
    }

    /**
     * Set rucher
     *
     * @param string $rucher
     * @return AjouterRuche
     */
    public function setRucher($rucher)
    {
        $this->rucher = $rucher;
    
        return $this;
    }

    /**
     * Get rucher
     *
     * @return string 
     */
    public function getRucher()
    {
        return $this->rucher;
    }

    /**
     * Set reine
     *
     * @param string $reine
     * @return AjouterRuche
     */
    public function setReine($reine)
    {
        $this->reine = $reine;
    
        return $this;
    }

    /**
     * Get reine
     *
     * @return string 
     */
    public function getReine()
    {
        return $this->reine;
    }

    /**
     * Set sourceColonie
     *
     * @param string $sourceColonie
     * @return AjouterRuche
     */
    public function setSourceColonie($sourceColonie)
    {
        $this->sourceColonie = $sourceColonie;
    
        return $this;
    }

    /**
     * Get sourceColonie
     *
     * @return string 
     */
    public function getSourceColonie()
    {
        return $this->sourceColonie;
    }
}