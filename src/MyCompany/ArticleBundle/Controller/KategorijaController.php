<?php

namespace MyCompany\ArticleBundle\Controller;

use MyCompany\ArticleBundle\Entity\Kategorija;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Kategorija controller.
 *
 * @Security("has_role('ROLE_ADMIN')")
 * @Route("kategorija")
 */
class KategorijaController extends Controller
{
    /**
     * Lists all kategorija entities.
     *
     * @Route("/", name="kategorija_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kategorijas = $em->getRepository('MyCompanyArticleBundle:Kategorija')->findAll();

        return $this->render('kategorija/index.html.twig', array(
            'kategorijas' => $kategorijas,
        ));
    }

    /**
     * Creates a new kategorija entity.
     *
     * @Route("/new", name="kategorija_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kategorija = new Kategorija();
        $form = $this->createForm('MyCompany\ArticleBundle\Form\KategorijaType', $kategorija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kategorija);
            $em->flush();

            return $this->redirectToRoute('kategorija_show', array('id' => $kategorija->getId()));
        }

        return $this->render('kategorija/new.html.twig', array(
            'kategorija' => $kategorija,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kategorija entity.
     *
     * @Route("/{id}", name="kategorija_show")
     * @Method("GET")
     */
    public function showAction(Kategorija $kategorija)
    {
        $deleteForm = $this->createDeleteForm($kategorija);

        return $this->render('kategorija/show.html.twig', array(
            'kategorija' => $kategorija,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kategorija entity.
     *
     * @Route("/{id}/edit", name="kategorija_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Kategorija $kategorija)
    {
        $deleteForm = $this->createDeleteForm($kategorija);
        $editForm = $this->createForm('MyCompany\ArticleBundle\Form\KategorijaType', $kategorija);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kategorija_edit', array('id' => $kategorija->getId()));
        }

        return $this->render('kategorija/edit.html.twig', array(
            'kategorija' => $kategorija,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kategorija entity.
     *
     * @Route("/{id}", name="kategorija_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Kategorija $kategorija)
    {
        $form = $this->createDeleteForm($kategorija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kategorija);
            $em->flush();
        }

        return $this->redirectToRoute('kategorija_index');
    }

    /**
     * Creates a form to delete a kategorija entity.
     *
     * @param Kategorija $kategorija The kategorija entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kategorija $kategorija)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kategorija_delete', array('id' => $kategorija->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
