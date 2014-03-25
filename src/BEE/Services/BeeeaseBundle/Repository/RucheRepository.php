<?php

namespace BEE\Services\BeeeaseBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RucheRepository
 *
 * 
 */
class RucheRepository extends EntityRepository
{
    
    
    
    public function getrucher(){
        
//$repository = $this->getDoctrine()
//                   ->getManager()
//                   ->getRepository('BEEServicesBeeeaseBundle:Rucher');
//$rucher = $repository->findOneBy(array('libelle'));
        
//  return $this->createQueryBuilder('r')
//              ->getQuery()
//              ->getResult();   
        
    // On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
        
        
//  $qb = $this->_em->createQueryBuilder();
//  
//  $qb->select('l')
//     ->from('BEEServicesBeeeaseBundle', 'l')
//     ->where('l.id = :id')
//     ->setParameter('id', $id);
//    return $qb->getQuery()
//              ->getResult();
//    
//$query = $em->createQuery('SELECT l FROM BEE\Services\BeeeaseBundle\Localisation l');
//$rucher = $query->getResult();  
//    
  
//   function myFindAllDQL()
//{
//  $query = $this->_em->createQuery('SELECT a FROM SdzBlogBundle:Article a');
//  $resultats = $query->getResult();
//
//  return $resultats;
//}
  
   

	
$q = $this->createQueryBuilder('l')
->where('l.id = :localisation')
->setParameter('localisation', $idLocalisation); 
    
  $q->getQuery()->getOneOrNullResult();  
    
}}

