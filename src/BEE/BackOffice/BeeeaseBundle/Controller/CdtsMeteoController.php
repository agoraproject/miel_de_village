<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\CdtsMeteo;
use BEE\BackOffice\BeeeaseBundle\Form\CdtsMeteoType;

/**
 * CdtsMeteo controller.
 *
 * @Route("/cdtsmeteo")
 */
class CdtsMeteoController extends Controller
{

    /**
     * Lists all CdtsMeteo entities.
     *
     * @Route("/", name="cdtsmeteo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:CdtsMeteo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new CdtsMeteo entity.
     *
     * @Route("/new", name="cdtsmeteo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CdtsMeteo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CdtsMeteo entity.
     *
     * @Route("/", name="cdtsmeteo_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new CdtsMeteo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cdtsmeteo'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CdtsMeteo entity.
    *
    * @param CdtsMeteo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CdtsMeteo $entity)
    {
        $form = $this->createForm(new CdtsMeteoType(), $entity, array(
            'action' => $this->generateUrl('cdtsmeteo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a CdtsMeteo entity.
     *
     * @Route("/{id}", name="cdtsmeteo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:CdtsMeteo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CdtsMeteo entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing CdtsMeteo entity.
     *
     * @Route("/{id}/edit", name="cdtsmeteo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:CdtsMeteo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CdtsMeteo entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a CdtsMeteo entity.
    *
    * @param CdtsMeteo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CdtsMeteo $entity)
    {
        $form = $this->createForm(new CdtsMeteoType(), $entity, array(
            'action' => $this->generateUrl('cdtsmeteo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing CdtsMeteo entity.
     *
     * @Route("/{id}", name="cdtsmeteo_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:CdtsMeteo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:CdtsMeteo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CdtsMeteo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cdtsmeteo'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a CdtsMeteo entity.
     *
     * @Route("/delete/{id}", name="cdtsmeteo_delete")
     * 
     */
    public function deleteAction($id)
    {
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:CdtsMeteo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CdtsMeteo entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('cdtsmeteo'));
    }

}
