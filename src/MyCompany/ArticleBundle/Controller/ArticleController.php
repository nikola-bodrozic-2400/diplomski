<?php

namespace MyCompany\ArticleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use MyCompany\ArticleBundle\Entity\Article;
use MyCompany\ArticleBundle\Form\ArticleType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities with pagination
     *
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MyCompanyArticleBundle:Article')->findAll();
        $paginator  = $this->get('knp_paginator');

        $blogPosts = $paginator->paginate(
            $articles, 
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 2)
        );
        return array('articles' => $blogPosts,);
    }



    public function newAction(Request $request)
    {

        $article = new Article();

        $form = $this->createForm('MyCompany\ArticleBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $article->setOwner($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('news_show', array('id' => $article->getId()));
        }

        return $this->render('MyCompanyArticleBundle:Article:new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Article entity.
     *
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('MyCompanyArticleBundle:Article:show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Article entity.
     *
     */
    public function editAction(Request $request, Article $article)
    {

        $this->enforceOwnerSecurity($article);

        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('MyCompany\ArticleBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('news_edit', array('id' => $article->getId()));
        }

        return $this->render('MyCompanyArticleBundle:Article:edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Article entity.
     *
     */
    public function deleteAction(Request $request, Article $article)
    {
        $this->enforceOwnerSecurity($article);

        $form = $this->createDeleteForm($article);



        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('news_index');
    }

    /**
     * Creates a form to delete a Article entity.
     *
     * @param Article $article The Article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {

        return $this->createFormBuilder()
            ->setAction($this->generateUrl('news_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Samo kreator posta moze da edituje svoj post
     *
     * @param Article $article
     */
    private function enforceOwnerSecurity(Article $article){
        $user = $this->getUser();

        if ($user != $article->getOwner()) {
            throw $this->createAccessDeniedException('you are not owner of this article and you cann`t change it');
        }
    }
}