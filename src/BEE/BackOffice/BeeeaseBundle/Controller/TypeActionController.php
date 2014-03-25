<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\TypeAction;
use BEE\BackOffice\BeeeaseBundle\Form\TypeActionType;

/**
 * TypeAction controller.
 *
 * @Route("/typeaction")
 */
class TypeActionController extends Controller
{

    /**
     * Lists all TypeAction entities.
     *
     * @Route("/", name="typeaction")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:TypeAction')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new TypeAction entity.
     *
     * @Route("/new", name="typeaction_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TypeAction();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new TypeAction entity.
     *
     * @Route("/", name="typeaction_create")
     * @Method("POST")
     * @Template("BEEBackOfficeBeeeaseBundle:TypeAction:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TypeAction();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeaction'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TypeAction entity.
    *
    * @param TypeAction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypeAction $entity)
    {
        $form = $this->createForm(new TypeActionType(), $entity, array(
            'action' => $this->generateUrl('typeaction_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'enregistrer'));

        return $form;
    }


    /**
     * Finds and displays a TypeAction entity.
     *
     * @Route("/{id}", name="typeaction_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:TypeAction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAction entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing TypeAction entity.
     *
     * @Route("/{id}/edit", name="typeaction_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:TypeAction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAction entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TypeAction entity.
    *
    * @param TypeAction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeAction $entity)
    {
        $form = $this->createForm(new TypeActionType(), $entity, array(
            'action' => $this->generateUrl('typeaction_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing TypeAction entity.
     *
     * @Route("/{id}", name="typeaction_update")
     * @Method("PUT")
     * @Template("BEEBackOfficeBeeeaseBundle:TypeAction:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:TypeAction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAction entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeaction'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a TypeAction entity.
     *
     * @Route("/delete/{id}", name="typeaction_delete")
     *
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:TypeAction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeAction entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('typeaction'));
    }
}
