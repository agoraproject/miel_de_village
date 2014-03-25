<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Floraison;
use BEE\BackOffice\BeeeaseBundle\Form\FloraisonType;

/**
 * Floraison controller.
 *
 * @Route("/floraison")
 */
class FloraisonController extends Controller
{

    /**
     * Lists all Floraison entities.
     *
     * @Route("/", name="floraison")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Floraison')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Floraison entity.
     *
     * @Route("/", name="floraison_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Floraison:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Floraison();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('floraison'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Floraison entity.
    *
    * @param Floraison $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Floraison $entity)
    {
        $form = $this->createForm(new FloraisonType(), $entity, array(
            'action' => $this->generateUrl('floraison_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Floraison entity.
     *
     * @Route("/new", name="floraison_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Floraison();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Floraison entity.
     *
     * @Route("/{id}", name="floraison_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Floraison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Floraison entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Floraison entity.
     *
     * @Route("/{id}/edit", name="floraison_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Floraison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Floraison entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Floraison entity.
    *
    * @param Floraison $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Floraison $entity)
    {
        $form = $this->createForm(new FloraisonType(), $entity, array(
            'action' => $this->generateUrl('floraison_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Floraison entity.
     *
     * @Route("/{id}", name="floraison_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Floraison:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Floraison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Floraison entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('floraison'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Floraison entity.
     *
     * @Route("/delete/{id}", name="floraison_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Floraison')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Floraison entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('floraison'));
    }

}
