<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Couleur;
use BEE\BackOffice\BeeeaseBundle\Form\CouleurType;

/**
 * Couleur controller.
 *
 * @Route("/couleur")
 */
class CouleurController extends Controller
{

    /**
     * Lists all Couleur entities.
     *
     * @Route("/", name="couleur")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Couleur')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Couleur entity.
     *
     * @Route("/new", name="couleur_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Couleur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Couleur entity.
     *
     * @Route("/", name="couleur_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Couleur:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Couleur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('couleur'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Couleur entity.
    *
    * @param Couleur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Couleur $entity)
    {
        $form = $this->createForm(new CouleurType(), $entity, array(
            'action' => $this->generateUrl('couleur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a Couleur entity.
     *
     * @Route("/{id}", name="couleur_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Couleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couleur entity.');
        }
        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Couleur entity.
     *
     * @Route("/{id}/edit", name="couleur_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Couleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couleur entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Couleur entity.
    *
    * @param Couleur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Couleur $entity)
    {
        $form = $this->createForm(new CouleurType(), $entity, array(
            'action' => $this->generateUrl('couleur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Couleur entity.
     *
     * @Route("/{id}", name="couleur_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Couleur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Couleur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couleur entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('couleur'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Couleur entity.
     *
     * @Route("/delete/{id}", name="couleur_delete")
     * 
     */
    public function deleteAction($id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Couleur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Couleur entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('couleur'));
    }
}
