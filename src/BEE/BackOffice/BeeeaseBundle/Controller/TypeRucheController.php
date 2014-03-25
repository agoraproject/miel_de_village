<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use BEE\Services\BeeeaseBundle\Entity\TypeRuche;
use BEE\BackOffice\BeeeaseBundle\Form\TypeRucheType;

/**
 * TypeRuche controller.
 *
 * @Route("/typeruche")
 */
class TypeRucheController extends Controller
{

    /**
     * Lists all TypeRuche entities.
     *
     * @Route("/", name="typeruche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->get('TypeRucheManager')->getAllEntity();
         return array('entities' => $entities);
    }
    
       /**
     * Displays a form to create a new TypeRuche entity.
     *
     * @Route("/new", name="typeruche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TypeRuche();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new TypeRuche entity.
     *
     * @Route("/", name="typeruche_create")
     * @Method("POST")
     * @Template("BEEBackOfficeBeeeaseBundle:TypeRuche:new.html.twig")
     */
    public function createAction(Request $request)
    {
      $entity = new TypeRuche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('TypeRucheManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('typeruche'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );   
    }

    /**
    * Creates a form to create a TypeRuche entity.
    *
    * @param TypeRuche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypeRuche $entity)
    {
        $form = $this->createForm(new TypeRucheType(), $entity, array(
            'action' => $this->generateUrl('typeruche'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

 
    /**
     * Finds and displays a TypeRuche entity.
     *
     * @Route("/{id}", name="typeruche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
         $entity = $this->get('TypeRucheManager')->getEntityById($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRuche entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing TypeRuche entity.
     *
     * @Route("/{id}/edit", name="typeruche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('TypeRucheManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRuche entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TypeRuche entity.
    *
    * @param TypeRuche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeRuche $entity)
    {
        $form = $this->createForm(new TypeRucheType(), $entity, array(
            'action' => $this->generateUrl('typeruche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing TypeRuche entity.
     *
     * @Route("/{id}", name="typeruche_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:TypeRuche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('TypeRucheManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeRuche entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeruche'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a TypeRuche entity.
     *
     * @Route("/delete/{id}", name="typeruche_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('TypeRucheManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeRuche entity.');
            }
            $this->get('TypeRucheManager')->DeleteOneEntity($entity);
            return $this->redirect($this->generateUrl('typeruche'));
    }
}
