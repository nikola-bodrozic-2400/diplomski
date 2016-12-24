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
        $p = realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR ;
        $value = Yaml::parse(file_get_contents($p.'/security.yml', true));
        echo $p;
        // dump($value);
        array_push($value['security']['access_control'],['path'=>"^/post/new",'roles'=>"ROLE_BLOGER"]);
        // dump($value['security']['access_control'][10]);
        file_put_contents($p.'/security.yml', Yaml::dump($value, 5));
        die;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}