<?php
/**
 * Ruche Manager
 *
 * File that manage repository request for Ruche Entity
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 25/02/2014
 * @package BEEServicesBeeeaseBundle\Manager
 */
namespace BEE\Services\BeeeaseBundle\Manager;

use BEE\BackOffice\BeeeaseBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;


/**
 * Rucher Class
 */
class RucheManager extends BaseManager {
      /**
     * @var RucheManager 
     */
    protected $em;

    /**
     * Contructor of ruche
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Select the repository
     * 
     * @return class RucheManager for construct acces to repository
     */
    public function getRepository() {
        return $this->em->getRepository('BEEServicesBeeeaseBundle:Ruche');
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
