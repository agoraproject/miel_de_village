<?php

/**
 * BaseManager
 *
 * Base Manager for all
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 25/02/2014
 * @package BEEBackOfficeBeeeaseBundle\Manager
 */


namespace BEE\BackOffice\BeeeaseBundle\Manager;

/**
 * Abstract class BaseManager
 */
abstract class BaseManager {
    
   protected function persistAndFlush($entity)
{
    $this->em->persist($entity);
    $this->em->flush();
}
//    protected function delete($entity){
//    $this->em->remove($entity); 
//    $this->em->flush();
//    }
        protected function flush()
    {
      $this->em->flush();   
    } 

     /**
     *  select by ID
     *
     * @return Array List of one Data by Id
     */
    public function getEntityById($id) {
        // Fetchs one Data by Id
        return $this->getRepository()->findOneBy(array('id' => $id));
    }
    
     /**
     * Exemple select all Entity
     *
     * @return Array List of all Data
     */
    public function getAllEntity() {
        // Fetchs all Data
        return $this->getRepository()->findAll();
    }
    
    /*
     * Delete One Entity by Id
     */
    public function DeleteOneEntity($entity){
        // delete entity
        $this->em->remove($entity);
        // return and flush entity
        return $this->em->flush();
    }
    
     /*
     * Delete AllEntity
     */
    public function DeleteAllEntity($id){
        $entity= $this->getRepository()->findBy(array('id' => $id));
        foreach ($entity as $value) {
            $this->delete($value);
        }
        return $this;
    }
  
}
