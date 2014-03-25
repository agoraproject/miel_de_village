<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Reine;
use BEE\BackOffice\BeeeaseBundle\Form\ReineType;

/**
 * Reine controller.
 *
 * @Route("/reine")
 */
class ReineController extends Controller
{

    /**
     * Lists all Reine entities.
     *
     * @Route("/", name="reine")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
       $entities = $this->get('ReineManager')->getAllEntity();
       return array(
           'entities' => $entities,
           'headerTitle' => 'Reines',   
               );
       
    }
    
    /**
     * Displays a form to create a new Reine entity.
     *
     * @Route("/new", name="reine_new")
     * @Method("GET")
     * @Template()
     */
     public function newAction()
    {
        $entity = new Reine();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Ajouter une reine',
        );
    }
    
    /**
     * Creates a new Reine entity.
     *
     * @Route("/", name="reine_create")
     * @Method("POST")
     * @Template("BEEBackOfficeBeeeaseBundle:Reine:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Reine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //var_dump($request);
        //die();

        if ($form->isValid()) {
        $this->get('ReineManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('reine'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Reines', 
        );
    }

    /**
    * Creates a form to create a Reine entity.
    *
    * @param Reine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Reine $entity)
    {
        $form = $this->createForm(new ReineType(), $entity, array(
            'action' => $this->generateUrl('reine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }


    /**
     * Finds and displays a Reine entity.
     *
     * @Route("/{id}", name="reine_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('ReineManager')->getEntityById($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reine entity.');
        }

        return array(
            'entity'      => $entity,
            'headerTitle' => 'Reine',
        );
    }

    /**
     * Displays a form to edit an existing Reine entity.
     *
     * @Route("/{id}/edit", name="reine_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('reineManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reine entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'headerTitle' => 'Reine',
        );
    }

    /**
    * Creates a form to edit a Reine entity.
    *
    * @param Reine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reine $entity)
    {
        $form = $this->createForm(new ReineType(), $entity, array(
            'action' => $this->generateUrl('reine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Reine entity.
     *
     * @Route("/{id}", name="reine_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Reine:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $entity = $this->get('ReineManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reine entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
           $this->get('ReineManager')->flush($entity);

            return $this->redirect($this->generateUrl('reine'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Reine entity.
     *
     * @Route("/delete/{id}", name="reine_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('ReineManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reine entity.');
            }

        
        $this->get('ReineManager')->DeleteOneEntity($entity);    
        return $this->redirect($this->generateUrl('reine'));
    }

}
