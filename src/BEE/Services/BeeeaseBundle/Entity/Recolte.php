<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recolte
 *
 * @ORM\Table(name="recolte")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\RecolteRepository")
 */
class Recolte
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
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;
    
    /**
     * @var string
     *
     */
    private $uniteQuantite;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche", inversedBy="recoltes")
     * @var type 
     */
    protected $ruche;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\TypeRecolte")
     * @var type 
     * @ORM\JoinColumn(nullable=false,name="type_recolte_id")
     */
    protected $typeRecolte;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\NatureRecolte")
     * @var integer 
     * @ORM\JoinColumn(nullable=true,name="nature_recolte_id")
     */
    protected $natureRecolte;
 
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
     * Set qte
     *
     * @param integer $qte
     * @return Recolte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
    
        return $this;
    }

    /**
     * Get qte
     *
     * @return integer 
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Get uniteQuantite
     *
     * @return string 
     */
    public function getuniteQuantite()
    {
        if($this->qte > 1)
            return "hausses";
        else
            return "hausse";
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Recolte
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
    public function __toString() {
    }


    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Recolte
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
     * Set typeRecolte
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\TypeRecolte $typeRecolte
     * @return Recolte
     */
    public function setTypeRecolte(\BEE\Services\BeeeaseBundle\Entity\TypeRecolte $typeRecolte)
    {
        $this->typeRecolte = $typeRecolte;
    
        return $this;
    }

    /**
     * Get typeRecolte
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\TypeRecolte 
     */
    public function getTypeRecolte()
    {
        return $this->typeRecolte;
    }

    /**
     * Set natureRecolte
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\NatureRecolte $natureRecolte
     * @return Recolte
     */
    public function setNatureRecolte(\BEE\Services\BeeeaseBundle\Entity\NatureRecolte $natureRecolte = null)
    {
        $this->natureRecolte = $natureRecolte;
    
        return $this;
    }

    /**
     * Get natureRecolte
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\NatureRecolte 
     */
    public function getNatureRecolte()
    {
        return $this->natureRecolte;
    }
}