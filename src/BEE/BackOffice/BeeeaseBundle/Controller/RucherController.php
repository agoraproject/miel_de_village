<?php
/**
 * Rucher Controller
 *
 * Controller for gestion of entity Rucher - create, delete, display
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 07/02/2014
 * @package BEEBackOfficeBeeeaseBundle\Controller
 */

namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Rucher;
use BEE\BackOffice\BeeeaseBundle\Form\RucherType;




/**
 * Rucher controller.
 *
 * @Route("/rucher")
 */
class RucherController extends Controller
{

    /**
     * Lists all Rucher entities.
     *
     * @Route("/", name="rucher")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
     $entities = $this->get('RucherManager')->getAllEntity();
         return array(
             'entities' => $entities,
             'headerTitle' => 'Ruchers'
                 
                 
                 );
    }
    
     /**
     * Displays a form to create a new Rucher entity.
     *
     * @Route("/new", name="rucher_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Rucher();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Ajouter un rucher',
        );
    }

    /**
     * Creates a new Rucher entity.
     *
     * @Route("/new", name="rucher_create")
     * @Method("POST")
     * @Template("BEEBackOfficeBeeeaseBundle:Rucher:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Rucher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('RucherManager')->persistAndFlush($entity);
            return $this->redirect($this->generateUrl('rucher'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Rucher entity.
    *
    * @param Rucher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Rucher $entity)
    {
        $form = $this->createForm(new RucherType(), $entity, array(
            'action' => $this->generateUrl('rucher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }

 
    /**
     * Finds and displays a Rucher entity.
     *
     * @Route("/{id}", name="rucher_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('RucherManager')->getEntityById($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rucher entity.');
        }

        return array(
            'entity'      => $entity,
            'headerTitle' => 'Rucher',
        );
    }

    /**
     * Displays a form to edit an existing Rucher entity.
     *
     * @Route("/edit/{id}", name="rucher_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('RucherManager')->getEntityById($id);
       
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rucher entity.');
        }

        $editForm = $this->createEditForm($entity);
        

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'headerTitle' => 'Rucher',
        );
    }

    /**
    * Creates a form to edit a Rucher entity.
    *
    * @param Rucher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new RucherType(), $entity, array(
            'action' => $this->generateUrl('rucher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Rucher entity.
     *
     * @Route("{id}", name="rucher_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Rucher:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('RucherManager')->getEntityById($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rucher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
           $em->flush();

            return $this->redirect($this->generateUrl('rucher'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Rucher entity.
     *
     * @Route("/delete/{id}", name="rucher_delete")
     * 
     */
    public function deleteAction($id)
    {
       $entity = $this->get('RucherManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rucher entity.');
            }
        $this->get('RucherManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('rucher'));
           
        }
    
}
