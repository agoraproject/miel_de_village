<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Essaimage;
use BEE\BackOffice\BeeeaseBundle\Form\EssaimageType;

/**
 * Essaimage controller.
 *
 * @Route("/essaimage")
 */
class EssaimageController extends Controller
{

    /**
     * Lists all Essaimage entities.
     *
     * @Route("/", name="essaimage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BEEServicesBeeeaseBundle:Essaimage')->findAll();
        
        return array(
            'entities' => $entities,
        );
    }
        /**
     * Displays a form to create a new Essaimage entity.
     *
     * @Route("/new", name="essaimage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Essaimage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Essaimage entity.
     *
     * @Route("/", name="essaimage_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Essaimage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Essaimage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('essaimage'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Essaimage entity.
    *
    * @param Essaimage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Essaimage $entity)
    {
        $form = $this->createForm(new EssaimageType(), $entity, array(
            'action' => $this->generateUrl('essaimage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }


    /**
     * Finds and displays a Essaimage entity.
     *
     * @Route("/{id}", name="essaimage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Essaimage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Essaimage entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Essaimage entity.
     *
     * @Route("/{id}/edit", name="essaimage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Essaimage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Essaimage entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Essaimage entity.
    *
    * @param Essaimage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Essaimage $entity)
    {
        $form = $this->createForm(new EssaimageType(), $entity, array(
            'action' => $this->generateUrl('essaimage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Essaimage entity.
     *
     * @Route("/{id}", name="essaimage_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Essaimage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BEEServicesBeeeaseBundle:Essaimage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Essaimage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('essaimage'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Essaimage entity.
     *
     * @Route("/delete/{id}", name="essaimage_delete")
     * 
     */
    public function deleteAction(Request $request, $id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BEEServicesBeeeaseBundle:Essaimage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Essaimage entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('essaimage'));
    }

}
