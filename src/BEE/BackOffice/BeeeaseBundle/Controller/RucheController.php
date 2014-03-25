<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Ruche;
use BEE\Services\BeeeaseBundle\Entity\Localisation;
use BEE\BackOffice\BeeeaseBundle\Form\RucheType;

use Doctrine\ORM\EntityRepository;

/**
 * Ruche controller.
 *
 * @Route("/ruche")
 */
class RucheController extends Controller
{

    /**
     * Lists all Ruche entities.
     *
     * @Route("/", name="ruche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->get('RucheManager')->getAllEntity();
        return array(
                    'entities' => $entities,
                    'headerTitle' => 'Ruches'   );
    }
    

    public function getrucherAction()
{
  $rucher = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('BEEServicesBeeeaseBundle:ruche')
                         ->FindAll();
} 
    
    /**
     * Displays a form to create a new Ruche entity.
     *
     * @Route("/new", name="ruche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ruche();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Ruche entity.
     *
     * @Route("/", name="ruche_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Ruche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Ruche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
           
        $this->get('RucheManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('ruche'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Ruche entity.
    *
    * @param Ruche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Ruche $entity)
    {
        $form = $this->createForm(new RucheType(), $entity, array(
            'action' => $this->generateUrl('ruche_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }


    /**
     * Finds and displays a Ruche entity.
     *
     * @Route("/{id}", name="ruche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('RucheManager')->getEntityById($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ruche entity.');
        }
        
        $currentLocalisation = $this ->getDoctrine()
                                    ->getManager()
                                    ->getRepository('BEEServicesBeeeaseBundle:Localisation')
                                    ->findOneBy(  array('ruche' => $id),
                                               array('dateDeplacement' => 'desc')
                                    ); 
        
        $listeLocalisations = $this ->getDoctrine()
                                    ->getManager()
                                    ->getRepository('BEEServicesBeeeaseBundle:Localisation')
                                    ->findBy(  array('ruche' => $id),
                                               array('dateDeplacement' => 'desc')
                                    );       
        
        return array(
            'entity'                => $entity,
            'localisations'         => $listeLocalisations,
            'currentLocalisation'   => $currentLocalisation,
        );
    }

    /**
     * Displays a form to edit an existing Ruche entity.
     *
     * @Route("/{id}/edit", name="ruche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('RucheManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ruche entity.');
        }

        $editForm = $this->createEditForm($entity);
        
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Ruche entity.
    *
    * @param Ruche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ruche $entity)
    {
        $form = $this->createForm(new RucheType(), $entity, array(
            'action' => $this->generateUrl('ruche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Ruche entity.
     *
     * @Route("/{id}", name="ruche_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Ruche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('RucheManager')->getEntityById($id);
       
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ruche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
           $em->flush();

            return $this->redirect($this->generateUrl('ruche'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Ruche entity.
     *
     * @Route("/delete/{id}", name="ruche_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('rucheManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ruche entity.');
            } 
        
        $this->get('RucheManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('ruche'));
    }

}
