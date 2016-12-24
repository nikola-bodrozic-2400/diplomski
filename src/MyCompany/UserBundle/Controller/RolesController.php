<?php

namespace MyCompany\UserBundle\Controller;

use MyCompany\UserBundle\Entity\Roles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Role controller.
 *
 * @Route("roles")
 */
class RolesController extends Controller
{
    /**
     * Lists all role entities.
     *
     * @Template()
     * @Route("/", name="roles_index")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $roles = $em->getRepository('UserBundle:Roles')->findAll();

        return array('roles' => $roles);

    }

    /**
     * Creates a new role entity.
     *
     * @Template()
     * @Route("/new", name="roles_new")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $role = new Roles();
        $form = $this->createForm('MyCompany\UserBundle\Form\RolesType', $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            die($form->get('public')->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush($role);

            return $this->redirectToRoute('roles_show', array('id' => $role->getId()));
        }

        return  array(
            'role' => $role,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a role entity.
     *
     * @Template()
     * @Route("/{id}", name="roles_show")
     * @Method("GET")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Roles $role)
    {
        $deleteForm = $this->createDeleteForm($role);

        return array(
            'role' => $role,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing role entity.
     * @Template()
     * @Route("/{id}/edit", name="roles_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Roles $role)
    {
        $deleteForm = $this->createDeleteForm($role);
        $editForm = $this->createForm('MyCompany\UserBundle\Form\RolesType', $role);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('roles_edit', array('id' => $role->getId()));
        }

        return  array(
            'role' => $role,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a role entity.
     *
     * @Route("/{id}", name="roles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Roles $role)
    {
        $form = $this->createDeleteForm($role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($role);
            $em->flush($role);
        }

        return $this->redirectToRoute('roles_index');
    }

    /**
     * Creates a form to delete a role entity.
     *
     * @param Roles $role The role entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Roles $role)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roles_delete', array('id' => $role->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
