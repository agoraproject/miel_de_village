<?php

/**
 * Reine Manager
 *
 * File that manage repository request for Reine Entity
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 25/02/2014
 * @package BEEServicesBeeeaseBundle\Manager
 */
namespace BEE\Services\BeeeaseBundle\Manager;

use BEE\BackOffice\BeeeaseBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;


/**
 *ReineManager
 *
 */
class ReineManager extends BaseManager {
      
    protected $em;
    /**
     * 
     *
     * @param \Doctrine\ORM\EntityManager $em
     */
    function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
     /**
     * Select the repository
     *
     * @return class ExempleManager for construct acces to repository
     */
    public function getRepository() {
        return $this->em->getRepository('BEEServicesBeeeaseBundle:Reine');
    }

     /**
     * Create and Save
     */
    public function persistAndFlush($Entity) {
        return parent::persistAndFlush($Entity);
    }

    
    public function getEntityById($id) {
        return parent::getEntityById($id);
    }

    /**
     * Exemple select all
     *
     * @return Array List of all Data
     */
    public function getAllEntity() {
        return parent::getAllEntity();
    }
    
    public function DeleteOneEntity($entity) {
        return parent::DeleteOneEntity($entity);
    }

  
    public function DeleteAllEntity($id) {
        return parent::DeleteAllEntity($id);
    }
     
    public function flush() {
        parent::flush();
    }
}
