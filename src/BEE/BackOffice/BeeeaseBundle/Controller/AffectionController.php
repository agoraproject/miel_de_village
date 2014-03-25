<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Affection;
use BEE\BackOffice\BeeeaseBundle\Form\AffectionType;

/**
 * Affection controller.
 *
 * @Route("/affection")
 */
class AffectionController extends Controller
{

    /**
     * Lists all Affection entities.
     *
     * @Route("/", name="affection")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Affection')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Affection entity.
     *
     * @Route("/new", name="affection_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Affection();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Affection entity.
     *
     * @Route("/", name="affection_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new Affection();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('affection'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Affection entity.
    *
    * @param Affection $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Affection $entity)
    {
        $form = $this->createForm(new AffectionType(), $entity, array(
            'action' => $this->generateUrl('affection_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }


    /**
     * Finds and displays a Affection entity.
     *
     * @Route("/{id}", name="affection_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Affection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affection entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Affection entity.
     *
     * @Route("/{id}/edit", name="affection_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Affection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affection entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Affection entity.
    *
    * @param Affection $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Affection $entity)
    {
        $form = $this->createForm(new AffectionType(), $entity, array(
            'action' => $this->generateUrl('affection_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Affection entity.
     *
     * @Route("/{id}", name="affection_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Affection:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Affection')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affection entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('affection'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Affection entity.
     *
     * @Route("/delete/{id}", name="affection_delete")
     * 
     */
    public function deleteAction($id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Affection')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Affection entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('affection'));
    }

}
