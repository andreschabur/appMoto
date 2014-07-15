<?php

namespace miMoto\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use miMoto\EntidadesBundle\Entity\Administrators;
use miMoto\LoginBundle\Form\AdministratorsType;

/**
 * Administrators controller.
 *
 */
class AdministratorsController extends Controller
{

    /**
     * Lists all Administrators entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EntidadesBundle:Administrators')->findAll();

        return $this->render('LoginBundle:Administrators:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Administrators entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Administrators();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_administrador_show', array('id' => $entity->getId())));
        }

        return $this->render('LoginBundle:Administrators:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Administrators entity.
    *
    * @param Administrators $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Administrators $entity)
    {
        $form = $this->createForm(new AdministratorsType(), $entity, array(
            'action' => $this->generateUrl('backend_administrador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Administrators entity.
     *
     */
    public function newAction()
    {
        $entity = new Administrators();
        $form   = $this->createCreateForm($entity);

        return $this->render('LoginBundle:Administrators:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Administrators entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EntidadesBundle:Administrators')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrators entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LoginBundle:Administrators:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Administrators entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EntidadesBundle:Administrators')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrators entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LoginBundle:Administrators:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Administrators entity.
    *
    * @param Administrators $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Administrators $entity)
    {
        $form = $this->createForm(new AdministratorsType(), $entity, array(
            'action' => $this->generateUrl('backend_administrador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Administrators entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EntidadesBundle:Administrators')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrators entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('backend_administrador_edit', array('id' => $id)));
        }

        return $this->render('LoginBundle:Administrators:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Administrators entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EntidadesBundle:Administrators')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Administrators entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_administrador'));
    }

    /**
     * Creates a form to delete a Administrators entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_administrador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
