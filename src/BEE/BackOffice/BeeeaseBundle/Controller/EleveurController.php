<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Eleveur;
use BEE\BackOffice\BeeeaseBundle\Form\EleveurType;

/**
 * Eleveur controller.
 *
 * @Route("/eleveur")
 */
class EleveurController extends Controller
{

    /**
     * Lists all Eleveur entities.
     *
     * @Route("/", name="eleveur")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Eleveur')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Eleveur entity.
     *
     * @Route("/", name="eleveur_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Eleveur:new.html.twig")
     */
    public function createEleveurAction(Request $request)
    {
        $entity = new Eleveur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eleveur', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Eleveur entity.
    *
    * @param Eleveur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Eleveur $entity)
    {
        $form = $this->createForm(new EleveurType(), $entity, array(
            'action' => $this->generateUrl('eleveur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Eleveur entity.
     *
     * @Route("/new", name="eleveur_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Eleveur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Eleveur entity.
     *
     * @Route("/{id}", name="eleveur_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Eleveur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleveur entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Eleveur entity.
     *
     * @Route("/{id}/edit", name="eleveur_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Eleveur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleveur entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Eleveur entity.
    *
    * @param Eleveur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Eleveur $entity)
    {
        $form = $this->createForm(new EleveurType(), $entity, array(
            'action' => $this->generateUrl('eleveur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Eleveur entity.
     *
     * @Route("/{id}", name="eleveur_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Eleveur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Eleveur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleveur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eleveur'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Eleveur entity.
     *
     * @Route("/delete/{id}", name="eleveur_delete")
     * 
     */
    public function deleteAction($id)
    {
          /*$form = $this->createDeleteForm($id);
          $form->handleRequest($request);

            if ($form->isValid()) {*/
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Eleveur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Eleveur entity.');
            }

            $em->remove($entity);
            $em->flush();
        //}

        return $this->redirect($this->generateUrl('eleveur'));
    }

}
