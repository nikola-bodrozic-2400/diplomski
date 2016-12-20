<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends Controller
{
    /**
     * @Route("/rakovica", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $p = realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'AppBundle'.DIRECTORY_SEPARATOR.'Controller' ;
        $value = Yaml::parse(file_get_contents($p.'/s5.yml', true));
        // echo $p;
        dump($value);
        array_push($value['security']['access_control'],['path'=>"^/post/publish",'roles'=>"ROLE_NOVINAR"]);
        dump($value['security']['access_control'][10]);
        file_put_contents($p.'/file.yml', Yaml::dump($value));
        die;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}