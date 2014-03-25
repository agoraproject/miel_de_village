<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ActionRepository")
 */
class Action
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
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Ruche", inversedBy="actions")
     * @var type 
     */
    protected $ruche;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Rucher", inversedBy="actions")
     * @var type
     * 
     */
    protected $rucher;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\ActionListe")
     * @var type 
     * @ORM\JoinColumn(name="action_liste_id")
     */
    protected $actionListe;
    
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
     * @return Action
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
     * Set qte
     *
     * @param integer $qte
     * @return Action
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
    public function __toString() {
        
    }


    /**
     * Set ruche
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Ruche $ruche
     * @return Action
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
     * @return Action
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

    /**
     * Set actionListe
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\ActionListe $actionListe
     * @return Action
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
    
}