<?php

namespace MyCompany\NestingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/nesting2", name="nesting_index")
     */
    public function indexAction()
    {
        return $this->render('NestingBundle:Default:index.html.twig');
    }
}
