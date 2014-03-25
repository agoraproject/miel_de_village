<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\DisparitionReine;
use BEE\BackOffice\BeeeaseBundle\Form\DisparitionReineType;

/**
 * DisparitionReine controller.
 *
 * @Route("/disparitionreine")
 */
class DisparitionReineController extends Controller
{

    /**
     * Lists all DisparitionReine entities.
     *
     * @Route("/", name="disparitionreine")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:DisparitionReine')->findAll();

        return array(
            'entities' => $entities,
        );
    }
        /**
     * Displays a form to create a new DisparitionReine entity.
     *
     * @Route("/new", name="disparitionreine_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DisparitionReine();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new DisparitionReine entity.
     *
     * @Route("/", name="disparitionreine_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:DisparitionReine:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DisparitionReine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disparitionreine', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a DisparitionReine entity.
    *
    * @param DisparitionReine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(DisparitionReine $entity)
    {
        $form = $this->createForm(new DisparitionReineType(), $entity, array(
            'action' => $this->generateUrl('disparitionreine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }



    /**
     * Finds and displays a DisparitionReine entity.
     *
     * @Route("/{id}", name="disparitionreine_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:DisparitionReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisparitionReine entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing DisparitionReine entity.
     *
     * @Route("/{id}/edit", name="disparitionreine_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:DisparitionReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisparitionReine entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a DisparitionReine entity.
    *
    * @param DisparitionReine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DisparitionReine $entity)
    {
        $form = $this->createForm(new DisparitionReineType(), $entity, array(
            'action' => $this->generateUrl('disparitionreine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing DisparitionReine entity.
     *
     * @Route("/{id}", name="disparitionreine_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:DisparitionReine:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:DisparitionReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisparitionReine entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('disparitionreine'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a DisparitionReine entity.
     *
     * @Route("/delete/{id}", name="disparitionreine_delete")
     * 
     */
    public function deleteAction($id)
    {
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:DisparitionReine')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DisparitionReine entity.');
            }

            $em->remove($entity);
            $em->flush();
       // }

        return $this->redirect($this->generateUrl('disparitionreine'));
    }

  
}
