<?php

namespace MyCompany\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Security;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_form")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        usleep(250000);
        $session = $request->getSession();

        if( $session->get('bp2') == null ) $session->set('bp2', 2) ;

        $temp = $session->get('bp2') ;
        $temp++;
        $session->set('bp2', $temp);

        $helper = $this->get('security.authentication_utils');
        return array(
            'last_username' => $helper->getLastUsername(),
            'error'         => $helper->getLastAuthenticationError(),
            'bg'            => $session->get('bp2')-3,
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }
}