<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\MotifDeplacement;
use BEE\BackOffice\BeeeaseBundle\Form\MotifDeplacementType;

/**
 * MotifDeplacement controller.
 *
 * @Route("/motifdeplacement")
 */
class MotifDeplacementController extends Controller
{

    /**
     * Lists all MotifDeplacement entities.
     *
     * @Route("/", name="motifdeplacement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:MotifDeplacement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
      /**
     * Displays a form to create a new MotifDeplacement entity.
     *
     * @Route("/new", name="motifdeplacement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MotifDeplacement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new MotifDeplacement entity.
     *
     * @Route("/", name="motifdeplacement_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:MotifDeplacement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MotifDeplacement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('motifdeplacement'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a MotifDeplacement entity.
    *
    * @param MotifDeplacement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MotifDeplacement $entity)
    {
        $form = $this->createForm(new MotifDeplacementType(), $entity, array(
            'action' => $this->generateUrl('motifdeplacement'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

  

    /**
     * Finds and displays a MotifDeplacement entity.
     *
     * @Route("/{id}", name="motifdeplacement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:MotifDeplacement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotifDeplacement entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing MotifDeplacement entity.
     *
     * @Route("/{id}/edit", name="motifdeplacement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:MotifDeplacement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotifDeplacement entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a MotifDeplacement entity.
    *
    * @param MotifDeplacement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MotifDeplacement $entity)
    {
        $form = $this->createForm(new MotifDeplacementType(), $entity, array(
            'action' => $this->generateUrl('motifdeplacement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing MotifDeplacement entity.
     *
     * @Route("/{id}", name="motifdeplacement_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:MotifDeplacement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:MotifDeplacement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotifDeplacement entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('motifdeplacement'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a MotifDeplacement entity.
     *
     * @Route("/delete/{id}", name="motifdeplacement_delete")
     * 
     */
    public function deleteAction($id)
    {
      
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:MotifDeplacement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MotifDeplacement entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('motifdeplacement'));
    }
}
