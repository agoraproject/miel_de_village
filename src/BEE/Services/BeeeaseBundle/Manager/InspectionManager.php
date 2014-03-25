<?php

/**
 * Inspection Manager
 *
 * File that manage repository request for Inspection Entity
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 25/02/2014
 * @package BEEServicesBeeeaseBundle\Manager
 */

namespace BEE\Services\BeeeaseBundle\Manager;

use BEE\BackOffice\BeeeaseBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;


class InspectionManager extends BaseManager {
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
        return $this->em->getRepository('BEEServicesBeeeaseBundle:Inspection');
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
     * 
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
