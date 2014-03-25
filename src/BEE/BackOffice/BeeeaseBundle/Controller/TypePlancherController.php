<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\TypePlancher;
use BEE\BackOffice\BeeeaseBundle\Form\TypePlancherType;

/**
 * TypePlancher controller.
 *
 * @Route("/typeplancher")
 */
class TypePlancherController extends Controller
{

    /**
     * Lists all TypePlancher entities.
     *
     * @Route("/", name="typeplancher")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    $entities = $this->get('typePlancherManager')->getAllEntity();
         return array('entities' => $entities);
    }

    
      /**
     * Displays a form to create a new TypePlancher entity.
     *
     * @Route("/new", name="typeplancher_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TypePlancher();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new TypePlancher entity.
     *
     * @Route("/", name="typeplancher_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:TypePlancher:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TypePlancher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
           $this->get('TypePlancherManager')->persistAndFlush($entity);
           return $this->redirect($this->generateUrl('typeplancher'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TypePlancher entity.
    *
    * @param TypePlancher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypePlancher $entity)
    {
        $form = $this->createForm(new TypePlancherType(), $entity, array(
            'action' => $this->generateUrl('typeplancher'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

  
    /**
     * Finds and displays a TypePlancher entity.
     *
     * @Route("/{id}", name="typeplancher_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('TypePlancherManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePlancher entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing TypePlancher entity.
     *
     * @Route("/{id}/edit", name="typeplancher_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('typePlancherManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePlancher entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TypePlancher entity.
    *
    * @param TypePlancher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new TypePlancherType(), $entity, array(
            'action' => $this->generateUrl('typeplancher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing TypePlancher entity.
     *
     * @Route("/{id}", name="typeplancher_update")
     * @Method("PUT")
     * @Template("BEEBackOfficeBeeeaseBundle:TypePlancher:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('TypePlancherManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePlancher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

             return $this->redirect($this->generateUrl('typeplancher'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a TypePlancher entity.
     *
     * @Route("/delete/{id}", name="typeplancher_delete")
     * 
     */
    public function deleteAction($id)
    {
       $entity = $this->get('TypePlancherManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypePlancher entity.');
            }

          $this->get('typePlancherManager')->DeleteOneEntity($entity);
          return $this->redirect($this->generateUrl('typeplancher'));

        
    }
}
