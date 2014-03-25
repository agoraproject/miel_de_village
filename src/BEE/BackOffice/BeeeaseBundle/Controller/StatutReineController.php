<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\StatutReine;
use BEE\BackOffice\BeeeaseBundle\Form\StatutReineType;

/**
 * StatutReine controller.
 *
 * @Route("/statutreine")
 */
class StatutReineController extends Controller
{

    /**
     * Lists all StatutReine entities.
     *
     * @Route("/", name="statutreine")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:StatutReine')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new StatutReine entity.
     *
     * @Route("/new", name="statutreine_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new StatutReine();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new StatutReine entity.
     *
     * @Route("/", name="statutreine_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new StatutReine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('statutreine'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a StatutReine entity.
    *
    * @param StatutReine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(StatutReine $entity)
    {
        $form = $this->createForm(new StatutReineType(), $entity, array(
            'action' => $this->generateUrl('statutreine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }


    /**
     * Finds and displays a StatutReine entity.
     *
     * @Route("/{id}", name="statutreine_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:StatutReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StatutReine entity.');
        }

        return array(
            'entity'      => $entity,
            
        );
    }

    /**
     * Displays a form to edit an existing StatutReine entity.
     *
     * @Route("/{id}/edit", name="statutreine_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:StatutReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StatutReine entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a StatutReine entity.
    *
    * @param StatutReine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StatutReine $entity)
    {
        $form = $this->createForm(new StatutReineType(), $entity, array(
            'action' => $this->generateUrl('statutreine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing StatutReine entity.
     *
     * @Route("/{id}", name="statutreine_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:StatutReine:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:StatutReine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StatutReine entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('statutreine'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a StatutReine entity.
     *
     * @Route("/delete/{id}", name="statutreine_delete")
     * 
     */
    public function deleteAction($id)
    {
     
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:StatutReine')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StatutReine entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('statutreine'));
    }

}
