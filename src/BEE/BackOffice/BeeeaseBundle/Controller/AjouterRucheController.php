<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\AjouterRuche;
use BEE\BackOffice\BeeeaseBundle\Form\AjouterRucheType;

/**
 * AjouterRuche controller.
 *
 * @Route("/ajouterruche")
 */
class AjouterRucheController extends Controller
{

    /**
     * Lists all AjouterRuche entities.
     *
     * @Route("/", name="ajouterruche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:AjouterRuche')->findAll();

        return array(
            'entities' => $entities,
            'headerTitle' => 'Ruches' 
        );
    }
        /**
     * Displays a form to create a new AjouterRuche entity.
     *
     * @Route("/new", name="ajouterruche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AjouterRuche();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Ajouter une ruche'
        );
    }

    /**
     * Creates a new AjouterRuche entity.
     *
     * @Route("/", name="ajouterruche_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:AjouterRuche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AjouterRuche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ajouterruche'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
             
        );
    }

    /**
    * Creates a form to create a AjouterRuche entity.
    *
    * @param AjouterRuche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AjouterRuche $entity)
    {
        $form = $this->createForm(new AjouterRucheType(), $entity, array(
            'action' => $this->generateUrl('ajouterruche_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    
    }


    /**
     * Finds and displays a AjouterRuche entity.
     *
     * @Route("/{id}", name="ajouterruche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:AjouterRuche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjouterRuche entity.');
        }

        return array(
            'entity'      => $entity,
            'headerTitle' => 'Ruche'
        );
    }

    /**
     * Displays a form to edit an existing AjouterRuche entity.
     *
     * @Route("/{id}/edit", name="ajouterruche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:AjouterRuche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjouterRuche entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'headerTitle' => 'Ruche'
          
        );
    }

    /**
    * Creates a form to edit a AjouterRuche entity.
    *
    * @param AjouterRuche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AjouterRuche $entity)
    {
        $form = $this->createForm(new AjouterRucheType(), $entity, array(
            'action' => $this->generateUrl('ajouterruche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
        
    }
    /**
     * Edits an existing AjouterRuche entity.
     *
     * @Route("/{id}", name="ajouterruche_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:AjouterRuche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:AjouterRuche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjouterRuche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ajouterruche'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            
        );
    }
    /**
     * Deletes a AjouterRuche entity.
     *
     * @Route("/delete/{id}", name="ajouterruche_delete")
     * 
     */
    public function deleteAction($id)
    {
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:AjouterRuche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AjouterRuche entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('ajouterruche'));
    }

}
