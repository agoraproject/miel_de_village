<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionListe
 *
 * @ORM\Table(name="action_liste")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\ActionListeRepository")
 */
class ActionListe
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
     * @ORM\Column(name="libelle", type="string", length=100)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="code_action", type="string", length=15)
     */
    private $codeAction;

    /**
     * @var boolean
     *
     * @ORM\Column(name="qte_affichage", type="string")
     */
    private $qteAffichage;

    /**
     * @var integer
     *
     * @ORM\Column(name="unite_qte", type="integer",nullable=true)
     */
    private $uniteQte;
    
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\TypeAction")
     * @var type 
     * @ORM\JoinColumn(name="type_action_id")
     */
    protected $typeAction;
    
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
     * Set libelle
     *
     * @param string $libelle
     * @return ActionListe
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set codeAction
     *
     * @param string $codeAction
     * @return ActionListe
     */
    public function setCodeAction($codeAction)
    {
        $this->codeAction = $codeAction;
    
        return $this;
    }

    /**
     * Get codeAction
     *
     * @return string 
     */
    public function getCodeAction()
    {
        return $this->codeAction;
    }

    /**
     * Set qteAffichage
     *
     * @param boolean $qteAffichage
     * @return ActionListe
     */
    public function setQteAffichage($qteAffichage)
    {
        $this->qteAffichage = $qteAffichage;
    
        return $this;
    }

    /**
     * Get qteAffichage
     *
     * @return boolean 
     */
    public function getQteAffichage()
    {
        return $this->qteAffichage;
    }

    /**
     * Set uniteQte
     *
     * @param integer $uniteQte
     * @return ActionListe
     */
    public function setUniteQte($uniteQte)
    {
        $this->uniteQte = $uniteQte;
    
        return $this;
    }

    /**
     * Get uniteQte
     *
     * @return integer 
     */
    public function getUniteQte()
    {
        return $this->uniteQte;
    }
    public function __toString() {
        return $this->getLibelle();
    }


    /**
     * Set typeAction
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\TypeAction $typeAction
     * @return ActionListe
     */
    public function setTypeAction(\BEE\Services\BeeeaseBundle\Entity\TypeAction $typeAction = null)
    {
        $this->typeAction = $typeAction;
    
        return $this;
    }

    /**
     * Get typeAction
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\TypeAction 
     */
    public function getTypeAction()
    {
        return $this->typeAction;
    }
}