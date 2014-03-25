<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Fleur;
use BEE\BackOffice\BeeeaseBundle\Form\FleurType;

/**
 * Fleur controller.
 *
 * @Route("/fleur")
 */
class FleurController extends Controller
{

    /**
     * Lists all Fleur entities.
     *
     * @Route("/", name="fleur")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Fleur')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Fleur entity.
     *
     * @Route("/new", name="fleur_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fleur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Fleur entity.
     *
     * @Route("/", name="fleur_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Fleur:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fleur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fleur'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Fleur entity.
    *
    * @param Fleur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Fleur $entity)
    {
        $form = $this->createForm(new FleurType(), $entity, array(
            'action' => $this->generateUrl('fleur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a Fleur entity.
     *
     * @Route("/{id}", name="fleur_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Fleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fleur entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Fleur entity.
     *
     * @Route("/{id}/edit", name="fleur_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Fleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fleur entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Fleur entity.
    *
    * @param Fleur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fleur $entity)
    {
        $form = $this->createForm(new FleurType(), $entity, array(
            'action' => $this->generateUrl('fleur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Fleur entity.
     *
     * @Route("/{id}", name="fleur_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Fleur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Fleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fleur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fleur'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Fleur entity.
     *
     * @Route("/delete/{id}", name="fleur_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Fleur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fleur entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('fleur'));
    }
}
