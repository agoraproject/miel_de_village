<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Introduction;
use BEE\BackOffice\BeeeaseBundle\Form\IntroductionType;

/**
 * Introduction controller.
 *
 * @Route("/introduction")
 */
class IntroductionController extends Controller
{

    /**
     * Lists all Introduction entities.
     *
     * @Route("/", name="introduction")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Introduction')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Introduction entity.
     *
     * @Route("/new", name="introduction_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Introduction();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Introduction entity.
     *
     * @Route("/", name="introduction_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Introduction:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Introduction();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('introduction'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Introduction entity.
    *
    * @param Introduction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Introduction $entity)
    {
        $form = $this->createForm(new IntroductionType(), $entity, array(
            'action' => $this->generateUrl('introduction_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }

    /**
     * Finds and displays a Introduction entity.
     *
     * @Route("/{id}", name="introduction_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Introduction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Introduction entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Introduction entity.
     *
     * @Route("/{id}/edit", name="introduction_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Introduction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Introduction entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Introduction entity.
    *
    * @param Introduction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Introduction $entity)
    {
        $form = $this->createForm(new IntroductionType(), $entity, array(
            'action' => $this->generateUrl('introduction_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Introduction entity.
     *
     * @Route("/{id}", name="introduction_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Introduction:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Introduction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Introduction entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('introduction'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Introduction entity.
     *
     * @Route("/delete/{id}", name="introduction_delete")
     *
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Introduction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Introduction entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('introduction'));
    }
}
