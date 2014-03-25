<?php

namespace BEE\Services\BeeeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Essaimage
 *
 * @ORM\Table(name="essaimage")
 * @ORM\Entity(repositoryClass="BEE\Services\BeeeaseBundle\Repository\EssaimageRepository")
 */
class Essaimage
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
     * @ORM\ManyToOne(targetEntity="BEE\Services\BeeeaseBundle\Entity\Reine")
     * @var type 
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
     * Set date
     *
     * @param \DateTime $date
     * @return Essaimage
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
     * Set reine
     *
     * @param \BEE\Services\BeeeaseBundle\Entity\Reine $reine
     * @return Essaimage
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