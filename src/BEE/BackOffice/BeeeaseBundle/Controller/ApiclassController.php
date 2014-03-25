<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Apiclass;
use BEE\BackOffice\BeeeaseBundle\Form\ApiclassType;

/**
 * Apiclass controller.
 *
 * @Route("/apiclass")
 */
class ApiclassController extends Controller
{

    /**
     * Lists all Apiclass entities.
     *
     * @Route("/", name="apiclass")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Apiclass')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Apiclass entity.
     *
     * @Route("/new", name="apiclass_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Apiclass();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Apiclass entity.
     *
     * @Route("/", name="apiclass_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Apiclass:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Apiclass();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('apiclass'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Apiclass entity.
    *
    * @param Apiclass $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Apiclass $entity)
    {
        $form = $this->createForm(new ApiclassType(), $entity, array(
            'action' => $this->generateUrl('apiclass_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }


    /**
     * Finds and displays a Apiclass entity.
     *
     * @Route("/{id}", name="apiclass_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Apiclass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apiclass entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Apiclass entity.
     *
     * @Route("/{id}/edit", name="apiclass_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Apiclass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apiclass entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Apiclass entity.
    *
    * @param Apiclass $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Apiclass $entity)
    {
        $form = $this->createForm(new ApiclassType(), $entity, array(
            'action' => $this->generateUrl('apiclass_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Apiclass entity.
     *
     * @Route("/{id}", name="apiclass_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Apiclass:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Apiclass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apiclass entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('apiclass'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Apiclass entity.
     *
     * @Route("/delete/{id}", name="apiclass_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Apiclass')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Apiclass entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('apiclass'));
    }
}
