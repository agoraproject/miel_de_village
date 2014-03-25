<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Localisation;
use BEE\BackOffice\BeeeaseBundle\Form\LocalisationType;

/**
 * Localisation controller.
 *
 * @Route("/localisation")
 */
class LocalisationController extends Controller
{

    /**
     * Lists all Localisation entities.
     *
     * @Route("/", name="localisation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Localisation')->findAll();

        return array(
            'entities' => $entities,
        );
    }
     /**
     * Displays a form to create a new Localisation entity.
     *
     * @Route("/new", name="localisation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Localisation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Localisation entity.
     *
     * @Route("/", name="localisation_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Localisation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Localisation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('localisation'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Localisation entity.
    *
    * @param Localisation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Localisation $entity)
    {
        $form = $this->createForm(new LocalisationType(), $entity, array(
            'action' => $this->generateUrl('localisation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

 

    /**
     * Finds and displays a Localisation entity.
     *
     * @Route("/{id}", name="localisation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Localisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Localisation entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Localisation entity.
     *
     * @Route("/{id}/edit", name="localisation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Localisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Localisation entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Localisation entity.
    *
    * @param Localisation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Localisation $entity)
    {
        $form = $this->createForm(new LocalisationType(), $entity, array(
            'action' => $this->generateUrl('localisation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Localisation entity.
     *
     * @Route("/delete/{id}", name="localisation_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Localisation:edit.html.twig")
     */
    public function updateAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Localisation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Localisation entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('localisation'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Localisation entity.
     *
     * @Route("/delete/{id}", name="localisation_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Localisation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Localisation entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('localisation'));
    }
}
