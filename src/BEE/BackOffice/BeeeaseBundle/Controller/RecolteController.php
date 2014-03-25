<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Recolte;
use BEE\BackOffice\BeeeaseBundle\Form\RecolteType;

/**
 * Recolte controller.
 *
 * @Route("/recolte")
 */
class RecolteController extends Controller
{

    /**
     * Lists all Recolte entities.
     *
     * @Route("/", name="recolte")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Recolte')->findAll();

        return array(
            'entities' => $entities,
            'headerTitle' => 'Récoltes',
        );
    }
    
    /**
     * Displays a form to create a new Recolte entity.
     *
     * @Route("/new", name="recolte_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Recolte();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Ajouter une récolte',
           
            
        );
    }
    /**
     * Creates a new Recolte entity.
     *
     * @Route("/", name="recolte_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Recolte:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Recolte();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recolte'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
           
        );
    }

    /**
    * Creates a form to create a Recolte entity.
    *
    * @param Recolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Recolte $entity)
    {
        $form = $this->createForm(new RecolteType(), $entity, array(
            'action' => $this->generateUrl('recolte_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }


    /**
     * Finds and displays a Recolte entity.
     *
     * @Route("/{id}", name="recolte_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Recolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recolte entity.');
        }
        return array(
            'entity'      => $entity,
            'headerTitle' => 'Récolte'
        );
    }

    /**
     * Displays a form to edit an existing Recolte entity.
     *
     * @Route("/{id}/edit", name="recolte_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Recolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recolte entity.');
        }

        $editForm = $this->createEditForm($entity);
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'headerTitle' => 'Récolte'
        );
    }

    /**
    * Creates a form to edit a Recolte entity.
    *
    * @param Recolte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Recolte $entity)
    {
        $form = $this->createForm(new RecolteType(), $entity, array(
            'action' => $this->generateUrl('recolte_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Recolte entity.
     *
     * @Route("/{id}", name="recolte_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Recolte:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Recolte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recolte entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recolte'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Recolte entity.
     *
     * @Route("/delete/{id}", name="recolte_delete")
     * 
     */
    public function deleteAction($id)
    {
    
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Recolte')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Recolte entity.');
            }

            $em->remove($entity);
            $em->flush();
        
        return $this->redirect($this->generateUrl('recolte'));
    }
}
