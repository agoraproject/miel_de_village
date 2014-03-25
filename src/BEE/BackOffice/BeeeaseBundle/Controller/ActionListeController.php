<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;


// Plus besoin de rajouter le use de l'exception dans ce cas
// Mais par contre il faut le use pour les annotations du bundle :
use JMS\SecurityExtraBundle\Annotation\Secure;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\ActionListe;
use BEE\BackOffice\BeeeaseBundle\Form\ActionListeType;

/**
 *
 * @Route("/actionliste")
 * 
 */
class ActionListeController extends Controller
{

    /**
     * Lists all ActionListe entities.
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/", name="actionliste")
     * @Method("GET")
     * @Template()
     * 
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:ActionListe')->findAll();

        return array(
            'entities' => $entities,
        );
    }
     /**
     * Displays a form to create a new ActionListe entity.
     *
     * @Route("/new", name="actionliste_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ActionListe();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new ActionListe entity.
     *
     * @Route("/", name="actionliste_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:ActionListe:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ActionListe();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actionliste'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ActionListe entity.
    *
    * @param ActionListe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ActionListe $entity)
    {
        $form = $this->createForm(new ActionListeType(), $entity, array(
            'action' => $this->generateUrl('actionliste_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter'));

        return $form;
    }

   

    /**
     * Finds and displays a ActionListe entity.
     *
     * @Route("/{id}", name="actionliste_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ActionListe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionListe entity.');
        }
        return array(
            'entity' => $entity,
        );
    }

    /**
     * Displays a form to edit an existing ActionListe entity.
     *
     * @Route("/{id}/edit", name="actionliste_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ActionListe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionListe entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ActionListe entity.
    *
    * @param ActionListe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ActionListe $entity)
    {
        $form = $this->createForm(new ActionListeType(), $entity, array(
            'action' => $this->generateUrl('actionliste_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing ActionListe entity.
     *
     * @Route("/{id}", name="actionliste_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:ActionListe:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:ActionListe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionListe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('actionliste'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a ActionListe entity.
     *
     * @Route("/delete/{id}", name="actionliste_delete")
     * 
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:ActionListe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActionListe entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('actionliste'));
    }
}
