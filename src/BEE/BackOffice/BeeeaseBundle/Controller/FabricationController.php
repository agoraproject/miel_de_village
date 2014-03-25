<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Fabrication;
use BEE\BackOffice\BeeeaseBundle\Form\FabricationType;

/**
 * Fabrication controller.
 *
 * @Route("/fabrication")
 */
class FabricationController extends Controller
{
    
    /**
     * Lists all Fabrication entities.
     *
     * @Route("/", name="fabrication")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         $entities = $this->get('FabricationManager')->getAllEntity();
         return array('entities' => $entities);
    }
    
    
    /**
     * Displays a form to create a new Fabrication entity.
     *
     * @Route("/new", name="fabrication_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fabrication();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Fabrication entity.
     *
     * @Route("/", name="fabrication_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Fabrication:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fabrication();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
           $this->get('FabricationManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('fabrication'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Fabrication entity.
    *
    * @param Fabrication $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Fabrication $entity)
    {
        $form = $this->createForm(new FabricationType(), $entity, array(
            'action' => $this->generateUrl('fabrication_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a Fabrication entity.
     *
     * @Route("/{id}", name="fabrication_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('FabricationManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fabrication entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Fabrication entity.
     *
     * @Route("/{id}/edit", name="fabrication_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('FabricationManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fabrication entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Fabrication entity.
    *
    * @param Fabrication $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new FabricationType(), $entity, array(
            'action' => $this->generateUrl('fabrication_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Fabrication entity.
     *
     * @Route("/{id}", name="fabrication_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Fabrication:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('FabricationManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fabrication entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fabrication'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Fabrication entity.
     *
     * @Route("/delete/{id}", name="fabrication_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('FabricationManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fabrication entity.');
            }
        $this->get('FabricationManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('fabrication'));
        }
    }

