<?php

namespace MyCompany\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/placanje")
     */
    public function indexAction()
    {
        $host =  $this->getRequest()->getHttpHost();
        $p = realpath($this->container->getParameter('kernel.root_dir').'/../src/MojeKlase/');
        include $p.'/cred.inc';
        $api_method = "SetExpressCheckout";
        include $p.'/array.inc';
        $nvp_string = '';
        foreach($request_params as $var=>$val)
        {
            $nvp_string .= '&'.$var.'='.urlencode($val);
        }
        // Send NVP string to PayPal and store response
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_URL, $api_endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

        $result = curl_exec($curl);
        curl_close($curl);

        $q = urldecode($result);
        $q = explode('&', $q);
        if($sandbox == TRUE) {
            echo "<pre>";
            var_dump($q);
            echo "</pre>";
        }
        $w = $q[0];
        $w = explode('=', $w);
        if($sandbox == TRUE){
            echo "<a href='https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&useraction=commit&token={$w[1]}'>Plati post id:60</a>";
        } else {
            echo "<a href='https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&useraction=commit&token={$w[1]}'>Plati post id:60</a>";
        }
        return $this->render('PaymentBundle:Default:index.html.twig');
    }
}
