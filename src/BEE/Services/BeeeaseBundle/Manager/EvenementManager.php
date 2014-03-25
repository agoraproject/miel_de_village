<?php

/**
 * Evenement Manager
 *
 * File that manage repository request for Evenement Entity
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 25/02/2014
 * @package BEEServicesBeeeaseBundle\Manager
 */

namespace BEE\Services\BeeeaseBundle\Manager;

use BEE\BackOffice\BeeeaseBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;


class EvenementManager extends BaseManager{
     /**
     * @var EvenementManager 
     */
    protected $em;

    /**
     * Contructor of Evenement
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Select the repository
     * 
     * @return class EvenementManager for construct acces to repository
     */
    public function getRepository() {
        return $this->em->getRepository('BEEServicesBeeeaseBundle:Evenement');
    } 
    
 
    public function getEntityById($id) {
	return parent::getEntityById($id);
    }
    
    public function getAllEntity() {
	return parent::getAllEntity();
    }
    
    public function persistAndFlush($entity) {
	parent::persistAndFlush($entity);
    }
    
    public function deleteAndFlush($entity) {
	return parent::deleteAndFlush($entity);
    }

    public function flush() {
	return parent::flush();
    } 
}
