<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BEE\Services\BeeeaseBundle\Entity\Statut;
use BEE\BackOffice\BeeeaseBundle\Form\StatutType;

/**
 * Statut controller.
 *
 * @Route("/statut")
 */
class StatutController extends Controller
{

    /**
     * Lists all Statut entities.
     *
     * @Route("/", name="statut")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->get('StatutManager')->getAllEntity();
        return array('entities' => $entities);
    }
        /**
     * Displays a form to create a new Statut entity.
     *
     * @Route("/new", name="statut_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Statut();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Statut entity.
     *
     * @Route("/", name="statut_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Statut:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Statut();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('StatutManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('statut'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Statut entity.
    *
    * @param Statut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Statut $entity)
    {
        $form = $this->createForm(new StatutType(), $entity, array(
            'action' => $this->generateUrl('statut_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a Statut entity.
     *
     * @Route("/{id}", name="statut_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
      
         $entity = $this->get('StatutManager')->getEntityById($id);
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Statut entity.
     *
     * @Route("/{id}/edit", name="statut_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('StatutManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Statut entity.
    *
    * @param Statut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new StatutType(), $entity, array(
            'action' => $this->generateUrl('statut_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Statut entity.
     *
     * @Route("/{id}", name="statut_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Statut:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('StatutManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('statut'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Statut entity.
     *
     * @Route("/delete/{id}", name="statut_delete")
     * 
     */
    public function deleteAction($id)
    {
          $entity = $this->get('StatutManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Statut entity.');
            }
        $this->get('StatutManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('statut'));
           
    }

}
