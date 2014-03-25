<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Transvasement;
use BEE\BackOffice\BeeeaseBundle\Form\TransvasementType;

/**
 * Transvasement controller.
 *
 * @Route("/transvasement")
 */
class TransvasementController extends Controller
{

    /**
     * Lists all Transvasement entities.
     *
     * @Route("/", name="transvasement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Transvasement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Transvasement entity.
     *
     * @Route("/", name="transvasement_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Transvasement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Transvasement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('transvasement'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Transvasement entity.
    *
    * @param Transvasement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Transvasement $entity)
    {
        $form = $this->createForm(new TransvasementType(), $entity, array(
            'action' => $this->generateUrl('transvasement'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default')));

        return $form;
    }

    /**
     * Displays a form to create a new Transvasement entity.
     *
     * @Route("/new", name="transvasement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Transvasement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Transvasement entity.
     *
     * @Route("/{id}", name="transvasement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Transvasement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transvasement entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Transvasement entity.
     *
     * @Route("/{id}/edit", name="transvasement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Transvasement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transvasement entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Transvasement entity.
    *
    * @param Transvasement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Transvasement $entity)
    {
        $form = $this->createForm(new TransvasementType(), $entity, array(
            'action' => $this->generateUrl('transvasement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default')));

        return $form;
    }
    /**
     * Edits an existing Transvasement entity.
     *
     * @Route("/{id}", name="transvasement_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Transvasement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Transvasement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transvasement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('transvasement'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Transvasement entity.
     *
     * @Route("/delete/{id}", name="transvasement_delete")
     * 
     */
    public function deleteAction($id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Transvasement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Transvasement entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('transvasement'));
    }

}
