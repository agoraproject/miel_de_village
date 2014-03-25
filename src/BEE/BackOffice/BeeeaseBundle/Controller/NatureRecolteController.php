<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\NatureRecolte;
use BEE\BackOffice\BeeeaseBundle\Form\NatureRecolteType;

/**
 * NatureRecolte controller.
 *
 * @Route("/naturerecolte")
 */
class NatureRecolteController extends Controller
{

    /**
     * Lists all NatureRecolte entities.
     *
     * @Route("/", name="naturerecolte")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:NatureRecolte')->findAll();

        return array(
            'entities' => $entities,
        );
    }
       /**
     * Displays a form to create a new NatureRecolte entity.
     *
     * @Route("/new", name="naturerecolte_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new NatureRecolte();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new NatureRecolte entity.
     *
     * @Route("/", name="naturerecolte_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:NatureRecolte:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new NatureRecolte();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('naturerecolte'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a NatureRecolte entity.
    *
    * @param NatureRecolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(NatureRecolte $entity)
    {
        $form = $this->createForm(new NatureRecolteType(), $entity, array(
            'action' => $this->generateUrl('naturerecolte_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

 

    /**
     * Finds and displays a NatureRecolte entity.
     *
     * @Route("/{id}", name="naturerecolte_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:NatureRecolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NatureRecolte entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing NatureRecolte entity.
     *
     * @Route("/{id}/edit", name="naturerecolte_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:NatureRecolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NatureRecolte entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a NatureRecolte entity.
    *
    * @param NatureRecolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NatureRecolte $entity)
    {
        $form = $this->createForm(new NatureRecolteType(), $entity, array(
            'action' => $this->generateUrl('naturerecolte_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing NatureRecolte entity.
     *
     * @Route("/{id}", name="naturerecolte_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:NatureRecolte:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:NatureRecolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NatureRecolte entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('naturerecolte'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a NatureRecolte entity.
     *
     * @Route("/delete/{id}", name="naturerecolte_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:NatureRecolte')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NatureRecolte entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('naturerecolte'));
    }
}
