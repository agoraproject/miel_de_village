<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\TypeRecolte;
use BEE\Services\BeeeaseBundle\Entity\NatureRecolte;
use BEE\BackOffice\BeeeaseBundle\Form\TypeRecolteType;

/**
 * TypeRecolte controller.
 *
 * @Route("/typerecolte")
 */
class TypeRecolteController extends Controller
{

    /**
     * Lists all TypeRecolte entities.
     *
     * @Route("/", name="typerecolte")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         $entities = $this->get('TypeRecolteManager')->getAllEntity();
         return array('entities' => $entities);
    }
     /**
     * Displays a form to create a new TypeRecolte entity.
     *
     * @Route("/new", name="typerecolte_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
      
        $entity = new TypeRecolte();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new TypeRecolte entity.
     *
     * @Route("/", name="typerecolte_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:TypeRecolte:new.html.twig")
     */
    public function createAction(Request $request)
    {
        
        $entity = new TypeRecolte();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('TypeRecolteManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('typerecolte'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TypeRecolte entity.
    *
    * @param TypeRecolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypeRecolte $entity)
    {
        $form = $this->createForm(new TypeRecolteType(), $entity, array(
            'action' => $this->generateUrl('typerecolte_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

   

    /**
     * Finds and displays a TypeRecolte entity.
     *
     * @Route("/{id}", name="typerecolte_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        
        $entity = $this->get('TypeRecolteManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRecolte entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing TypeRecolte entity.
     *
     * @Route("/{id}/edit", name="typerecolte_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('TypeRecolteManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRecolte entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TypeRecolte entity.
    *
    * @param TypeRecolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new TypeRecolteType(), $entity, array(
            'action' => $this->generateUrl('typerecolte_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing TypeRecolte entity.
     *
     * @Route("/{id}", name="typerecolte_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:TypeRecolte:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
         $em = $this->getDoctrine()->getManager();
         $entity = $this->get('TypeRecolteManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRecolte entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typerecolte'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a TypeRecolte entity.
     *
     * @Route("/delete/{id}", name="typerecolte_delete")
     * 
     */
    public function deleteAction($id)
    {
          $entity = $this->get('TypeRecolteManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeRecolte entity.');
            }
            $this->get('TypeRecolteManager')->DeleteOneEntity($entity);
            return $this->redirect($this->generateUrl('typerecolte'));
    }

}
