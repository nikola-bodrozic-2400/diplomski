<?php

namespace MyCompany\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;  
use MyCompany\UserBundle\Entity\User;
use MyCompany\UserBundle\Form\RegisterFormType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('MyCompany\UserBundle\Form\RegisterFormType', $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Registracija uspela, kliknite na login u meniju')
            ;

            $data = $form->getData();

            $user->setPassword($this->encodePassword($user, $user->getPlainPassword() ));
            $tmpuser =  $form->get('roles')->getData();
            $approles = array("ROLE_MANAGER", "ROLE_NOVINAR", "ROLE_WM", "ROLE_LEKTOR", "ROLE_KNJIG");
            if (!in_array($tmpuser[0], $approles)) {
                die ("hack attack in progress your IP WILL BE logged");
            }
            $user->setRoles([$tmpuser[0]]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush(); 
            
            $url = $this->generateUrl('news_index');
            return $this->redirect($url);                        
        }
        return array('form' => $form->createView());
    }

    /**
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
                ->add('success', 'Registracija uspela, kliknite na login u meniju')
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