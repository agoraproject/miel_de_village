<?php
/**
 * 
 *
 * Controller for gestion of entity Inspection - create, delete, display
 *
 * @author Anne <devoldere.anne@gmail.com>
 * @since 28/02/2014
 * @package EXOBeginnerGodBundle\Controller
 */
namespace BEE\BackOffice\BeeeaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BEE\Services\BeeeaseBundle\Entity\Inspection;
use BEE\BackOffice\BeeeaseBundle\Form\InspectionType;

/**
 * Inspection controller.
 *
 * @Route("/inspection")
 */
class InspectionController extends Controller
{

    /**
     * Lists all Inspection entities.
     *
     * @Route("/", name="inspection")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         $entities = $this->get('InspectionManager')->getAllEntity();
         return array(
             'entities' => $entities,
             'headerTitle' => 'Inspections');
    }
  
       /**
     * Displays a form to create a new Inspection entity.
     *
     * @Route("/new", name="inspection_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Inspection();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'headerTitle' => 'Inspections'
        );
    }
    
     /**
     * Creates a new Inspection entity.
     *
     * @Route("/", name="inspection_create")
     * @Method("POST")
     * @Template("BEEServicesBeeeaseBundle:Inspection:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Inspection();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('InspectionManager')->persistAndFlush($entity);   
            return $this->redirect($this->generateUrl('inspection', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Inspection entity.
    *
    * @param Inspection $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Inspection $entity)
    {
        $form = $this->createForm(new InspectionType(), $entity, array(
            'action' => $this->generateUrl('inspection_create'),
            'method' => 'POST'
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class'=>"btn btn-default"))); 
                                                                                      
        return $form;
    }

 
    /**
     * Finds and displays a Inspection entity.
     *
     * @Route("/{id}", name="inspection_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $entity = $this->get('InspectionManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inspection entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Inspection entity.
     *
     * @Route("/{id}/edit", name="inspection_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $entity = $this->get('InspectionManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inspection entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Inspection entity.
    *
    * @param Inspection $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Inspection $entity)
    {
        $form = $this->createForm(new InspectionType(), $entity, array(
            'action' => $this->generateUrl('inspection_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-default'))); 

        return $form;
    }
    /**
     * Edits an existing Inspection entity.
     *
     * @Route("/{id}", name="inspection_update")
     * @Method("PUT")
     * @Template("BEEServicesBeeeaseBundle:Inspection:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
       
        $entity = $this->get('InspectionManager')->getEntityById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inspection entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
        $this->get('InspectionManager')->flush($entity);

            return $this->redirect($this->generateUrl('inspection'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
          
        );
    }
    /**
     * Deletes a Inspection entity.
     *
     * @Route("/delete/{id}", name="inspection_delete")
     * 
     */
    public function deleteAction($id)
    {
        $entity = $this->get('InspectionManager')->getEntityById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Inspection entity.');
            }

        $this->get('InspectionManager')->DeleteOneEntity($entity);
        return $this->redirect($this->generateUrl('inspection'));
    }
}
