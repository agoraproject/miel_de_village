<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Photos;
use BEE\BackOffice\BeeeaseBundle\Form\PhotosType;

/**
 * Photos controller.
 *
 * @Route("/photos")
 */
class PhotosController extends Controller
{

    /**
     * Lists all Photos entities.
     *
     * @Route("/", name="photos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Photos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Photos entity.
     *
     * @Route("/new", name="photos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Photos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Photos entity.
     *
     * @Route("/", name="photos_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new Photos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('photos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Photos entity.
    *
    * @param Photos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Photos $entity)
    {
        $form = $this->createForm(new PhotosType(), $entity, array(
            'action' => $this->generateUrl('photos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a Photos entity.
     *
     * @Route("/{id}", name="photos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Photos entity.
     *
     * @Route("/{id}/edit", name="photos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Photos entity.
    *
    * @param Photos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Photos $entity)
    {
        $form = $this->createForm(new PhotosType(), $entity, array(
            'action' => $this->generateUrl('photos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Photos entity.
     *
     * @Route("/{id}", name="photos_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Photos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('photos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Photos entity.
     *
     * @Route("/delete/{id}", name="photos_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Photos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Photos entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('photos'));
    }

}
