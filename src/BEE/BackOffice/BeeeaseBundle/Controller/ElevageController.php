<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Elevage;
use BEE\BackOffice\BeeeaseBundle\Form\ElevageType;

/**
 * Elevage controller.
 *
 * @Route("/elevage")
 */
class ElevageController extends Controller
{

    /**
     * Lists all Elevage entities.
     *
     * @Route("/", name="elevage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Elevage')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Elevage entity.
     *
     * @Route("/", name="elevage_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Elevage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Elevage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('elevage'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Elevage entity.
    *
    * @param Elevage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Elevage $entity)
    {
        $form = $this->createForm(new ElevageType(), $entity, array(
            'action' => $this->generateUrl('elevage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Elevage entity.
     *
     * @Route("/new", name="elevage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Elevage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Elevage entity.
     *
     * @Route("/{id}", name="elevage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Elevage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Elevage entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Elevage entity.
     *
     * @Route("/{id}/edit", name="elevage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Elevage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Elevage entity.');
        }
        $editForm = $this->createEditForm($entity);
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
             
        );
    }

    /**
    * Creates a form to edit a Elevage entity.
    *
    * @param Elevage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Elevage $entity)
    {
        $form = $this->createForm(new ElevageType(), $entity, array(
            'action' => $this->generateUrl('elevage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Elevage entity.
     *
     * @Route("/{id}", name="elevage_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Elevage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Elevage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Elevage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('elevage'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Elevage entity.
     *
     * @Route("/delete/{id}", name="elevage_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Elevage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Elevage entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('elevage'));
    }

}
