<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photos
 *
 * @ORM\Table(name="photos")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\PhotosRepository")
 */
class Photos
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
     * @ORM\Column(name="chemin", type="string", length=255)
     */
    private $chemin;
    /**
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Inspection")
     * @var type 
     */
    protected $inspection;

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
     * Set chemin
     *
     * @param string $chemin
     * @return Photos
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    
        return $this;
    }

    /**
     * Get chemin
     *
     * @return string 
     */
    public function getChemin()
    {
        return $this->chemin;
    }
    public function __toString() {
        
    }


    /**
     * Set inspection
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Inspection $inspection
     * @return Photos
     */
    public function setInspection(\BEE\Services\BeeeaseBundle\Entity\Inspection $inspection = null)
    {
        $this->inspection = $inspection;
    
        return $this;
    }

    /**
     * Get inspection
     *
     * @return \BEE\Services\BeeeaseBundle\Entity\Inspection 
     */
    public function getInspection()
    {
        return $this->inspection;
    }
}