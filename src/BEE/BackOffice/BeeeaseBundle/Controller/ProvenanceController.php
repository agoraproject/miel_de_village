<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Provenance;
use BEE\BackOffice\BeeeaseBundle\Form\ProvenanceType;

/**
 * Provenance controller.
 *
 * @Route("/provenance")
 */
class ProvenanceController extends Controller
{

    /**
     * Lists all Provenance entities.
     *
     * @Route("/", name="provenance")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Provenance')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Provenance entity.
     *
     * @Route("/new", name="provenance_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Provenance();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Provenance entity.
     *
     * @Route("/", name="provenance_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Provenance:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Provenance();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('provenance'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Provenance entity.
    *
    * @param Provenance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Provenance $entity)
    {
        $form = $this->createForm(new ProvenanceType(), $entity, array(
            'action' => $this->generateUrl('provenance_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter'));

        return $form;
    }


    /**
     * Finds and displays a Provenance entity.
     *
     * @Route("/{id}", name="provenance_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Provenance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provenance entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Provenance entity.
     *
     * @Route("/{id}/edit", name="provenance_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Provenance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provenance entity.');
        }

        $editForm = $this->createEditForm($entity);
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Provenance entity.
    *
    * @param Provenance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Provenance $entity)
    {
        $form = $this->createForm(new ProvenanceType(), $entity, array(
            'action' => $this->generateUrl('provenance_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Provenance entity.
     *
     * @Route("/{id}", name="provenance_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Provenance:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Provenance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provenance entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('provenance'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Provenance entity.
     *
     * @Route("/delete/{id}", name="provenance_delete")
     * 
     */
    public function deleteAction($id)
    {
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Provenance')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Provenance entity.');
            }

            $em->remove($entity);
            $em->flush();
       // }

        return $this->redirect($this->generateUrl('provenance'));
    }

}
