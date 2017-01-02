<?php

namespace MyCompany\ArticleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyCompany\ArticleBundle\Entity\Ideja;
use MyCompany\ArticleBundle\Form\IdejaType;

/**
 * Ideja controller.
 *
 * @Route("/ideja")
 */
class IdejaController extends Controller
{
    /**
     * Lists all Ideja entities.
     *
     * @Route("/", name="ideja_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idejas = $em->getRepository('MyCompanyArticleBundle:Ideja')->findAll();

        return $this->render('ideja/index.html.twig', array(
            'idejas' => $idejas,
        ));
    }

    /**
     * Creates a new Ideja entity.
     *
     * @Route("/new", name="ideja_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ideja = new Ideja();
        $form = $this->createForm('MyCompany\ArticleBundle\Form\IdejaType', $ideja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ideja);
            $em->flush();

            return $this->redirectToRoute('ideja_show', array('id' => $ideja->getId()));
        }

        return $this->render('ideja/new.html.twig', array(
            'ideja' => $ideja,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ideja entity.
     *
     * @Route("/{id}", name="ideja_show")
     * @Method("GET")
     */
    public function showAction(Ideja $ideja)
    {
        $deleteForm = $this->createDeleteForm($ideja);

        return $this->render('ideja/show.html.twig', array(
            'ideja' => $ideja,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ideja entity.
     *
     * @Route("/{id}/edit", name="ideja_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ideja $ideja)
    {
        $deleteForm = $this->createDeleteForm($ideja);
        $editForm = $this->createForm('MyCompany\ArticleBundle\Form\IdejaType', $ideja);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ideja);
            $em->flush();

            return $this->redirectToRoute('ideja_edit', array('id' => $ideja->getId()));
        }

        return $this->render('ideja/edit.html.twig', array(
            'ideja' => $ideja,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ideja entity.
     *
     * @Route("/{id}", name="ideja_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ideja $ideja)
    {
        $form = $this->createDeleteForm($ideja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ideja);
            $em->flush();
        }

        return $this->redirectToRoute('ideja_index');
    }

    /**
     * Creates a form to delete a Ideja entity.
     *
     * @param Ideja $ideja The Ideja entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ideja $ideja)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ideja_delete', array('id' => $ideja->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
