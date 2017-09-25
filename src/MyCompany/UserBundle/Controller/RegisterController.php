<?php

namespace MyCompany\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;  
use MyCompany\UserBundle\Entity\User;
use MyCompany\UserBundle\Form\RegisterFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class RegisterController extends Controller
{
    /**
     * registracija zaposlenog
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/register", name="user_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $user = new User();

        $em = $this->getDoctrine()->getManager();
        $ro = $em->getRepository('UserBundle:Roles')->findAll();

        $form = $this->createForm(new RegisterFormType($ro), $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Registracija uspela')
            ;

            $data = $form->getData();

            $user->setPassword($this->encodePassword($user, $user->getPlainPassword() ));
            $tmpuser =  $form->get('roles')->getData();

            $user->setRoles($tmpuser);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush(); 
            
            $url = $this->generateUrl('news_index');
            return $this->redirect($url);                        
        }
        return array('form' => $form->createView());
    }

    /**
     * registracija posetioca sajta
     *
     * @Route("/singup", name="user_signup")
     * @Template()
     */
    public function signupAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('MyCompany\UserBundle\Form\SignupFormType', $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Registracija uspela')
            ;

            $data = $form->getData();

            $user->setPassword($this->encodePassword($user, $user->getPlainPassword() ));
            $user->setRoles(['ROLE_REGUSER']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $url = $this->generateUrl('news_index');
            return $this->redirect($url);
        }
        return array('form' => $form->createView());
    }

    /**
     * @param User $user
     * @param $plainPassword
     * @return mixed
     */
    private function encodePassword(User $user, $plainPassword) {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user);

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }    
}