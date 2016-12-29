<?php

namespace MyCompany\UserBundle\Controller;

use Symfony\Component\Yaml\Yaml;
use MyCompany\UserBundle\Entity\Roles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use MyCompany\UserBundle\Form\RolesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Role controller.
 *
 * @Route("roles")
 * @Security("has_role('ROLE_ADMIN')")
 */
class RolesController extends Controller
{
    /**
     * Lists all role entities.
     *
     * @Route("/", name="roles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $roles = $em->getRepository('UserBundle:Roles')->findAll();

        return $this->render('roles/index.html.twig', array(
            'roles' => $roles,
        ));
    }

    /**
     * Creates a new role entity.
     *
     * @Route("/new", name="roles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $role = new Roles();
        $form = $this->createForm('MyCompany\UserBundle\Form\RolesType', $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $un = $role->getName();
            $un = "ROLE_".strtoupper($un);

            $em = $this->getDoctrine()->getManager();
            $role->setName($un);

            $em->persist($role);
            $em->flush($role);

            $p = realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR ;
            $value = Yaml::parse(file_get_contents($p.'/security.yml', true));
            $privr = $value['security']['access_control'][2]['roles'];
            array_push($privr, $un);

            //$value['security']['access_control'][2]['path'] = '^/new$';
            $value['security']['access_control'][2]['roles']  = $privr;

            file_put_contents($p.'/security.yml', Yaml::dump($value, 5));

            return $this->redirectToRoute('roles_show', array('id' => $role->getId()));
        }

        return $this->render('roles/new.html.twig', array(
            'role' => $role,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a role entity.
     *
     * @Route("/{id}", name="roles_show")
     * @Method("GET")
     */
    public function showAction(Roles $role)
    {
        $deleteForm = $this->createDeleteForm($role);

        return $this->render('roles/show.html.twig', array(
            'role' => $role,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing role entity.
     *
     * @Route("/{id}/edit", name="roles_edit")
     * @Method({"GET", "POST"})
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

        return $this->render('roles/edit.html.twig', array(
            'role' => $role,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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

    private function _updateSecCfg()
    {

    }
}
