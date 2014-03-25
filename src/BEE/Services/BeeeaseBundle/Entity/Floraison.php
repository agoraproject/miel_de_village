<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Floraison
 *
 * @ORM\Table(name="floraison")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\FloraisonRepository")
 */
class Floraison
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
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Fleur")
     * @var type 
     */
    protected $fleur;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Rucher",inversedBy="floraison")
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Floraison
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
     * @return Floraison
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
    public function __toString() {
        
    }


    /**
     * Set fleur
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Fleur $fleur
     * @return Floraison
     */
    public function setFleur(\BEE\Services\BeeeaseBundle\Entity\Fleur $fleur = null)
    {
        $this->fleur = $fleur;
    
        return $this;
    }

    /**
     * Get fleur
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Fleur 
     */
    public function getFleur()
    {
        return $this->fleur;
    }

    /**
     * Set rucher
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Rucher $rucher
     * @return Floraison
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