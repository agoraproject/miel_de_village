<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\ChangementStatut;
use BEE\BackOffice\BeeeaseBundle\Form\ChangementStatutType;

/**
 * ChangementStatut controller.
 *
 * @Route("/changementstatut")
 */
class ChangementStatutController extends Controller
{

    /**
     * Lists all ChangementStatut entities.
     *
     * @Route("/", name="changementstatut")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:ChangementStatut')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new ChangementStatut entity.
     *
     * @Route("/new", name="changementstatut_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ChangementStatut();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ChangementStatut entity.
     *
     * @Route("/", name="changementstatut_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new ChangementStatut();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('changementstatut'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ChangementStatut entity.
    *
    * @param ChangementStatut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ChangementStatut $entity)
    {
        $form = $this->createForm(new ChangementStatutType(), $entity, array(
            'action' => $this->generateUrl('changementstatut_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a ChangementStatut entity.
     *
     * @Route("/{id}", name="changementstatut_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ChangementStatut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChangementStatut entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing ChangementStatut entity.
     *
     * @Route("/{id}/edit", name="changementstatut_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ChangementStatut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChangementStatut entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ChangementStatut entity.
    *
    * @param ChangementStatut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ChangementStatut $entity)
    {
        $form = $this->createForm(new ChangementStatutType(), $entity, array(
            'action' => $this->generateUrl('changementstatut_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing ChangementStatut entity.
     *
     * @Route("/{id}", name="changementstatut_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:ChangementStatut:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ChangementStatut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChangementStatut entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('changementstatut'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a ChangementStatut entity.
     *
     * @Route("/delete/{id}", name="changementstatut_delete")
     * 
     */
    public function deleteAction($id)
    {
    
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:ChangementStatut')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ChangementStatut entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('changementstatut'));
    }

}
