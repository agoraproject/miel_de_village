<?php

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\SourceColonie;
use BEE\BackOffice\BeeeaseBundle\Form\SourceColonieType;

/**
 * SourceColonie controller.
 *
 * @Route("/sourcecolonie")
 */
class SourceColonieController extends Controller
{

    /**
     * Lists all SourceColonie entities.
     *
     * @Route("/", name="sourcecolonie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         $entities = $this->get('SourceColonieManager')->getAllEntity();
         return array('entities' => $entities);
    }
    
    
    /**
     * Displays a form to create a new SourceColonie entity.
     *
     * @Route("/new", name="sourcecolonie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SourceColonie();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new SourceColonie entity.
     *
     * @Route("/", name="sourcecolonie_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:SourceColonie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SourceColonie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('SourceColonieManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('sourcecolonie'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a SourceColonie entity.
    *
    * @param SourceColonie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SourceColonie $entity)
    {
        $form = $this->createForm(new SourceColonieType(), $entity, array(
            'action' => $this->generateUrl('sourcecolonie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Finds and displays a SourceColonie entity.
     *
     * @Route("/{id}", name="sourcecolonie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        
        $entity = $this->get('SourceColonie')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SourceColonie entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing SourceColonie entity.
     *
     * @Route("/{id}/edit", name="sourcecolonie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('SourceColonieManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SourceColonie entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a SourceColonie entity.
    *
    * @param SourceColonie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SourceColonie $entity)
    {
        $form = $this->createForm(new SourceColonieType(), $entity, array(
            'action' => $this->generateUrl('sourcecolonie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing SourceColonie entity.
     *
     * @Route("/{id}", name="sourcecolonie_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:SourceColonie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
         $em = $this->getDoctrine()->getManager();
         $entity = $this->get('SourceColonieManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SourceColonie entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sourcecolonie'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a SourceColonie entity.
     *
     * @Route("/delete/{id}", name="sourcecolonie_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('SourcecolonieManager')->getEntityById($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SourceColonie entity.');
            }

        $this->get('SourceColonieManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('sourcecolonie'));
    }

}
