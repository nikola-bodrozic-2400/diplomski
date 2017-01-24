<?php

$p = '../../src/MojeKlase';
// die($p);
include $p.'/cred.inc';

$api_method =  "DoExpressCheckoutPayment";

$tok = $_GET["token"];
$pid = $_GET["PayerID"];

include $p.'/array.inc';

$request_params['TOKEN'] = $tok;
$request_params['PAYERID'] = $pid;

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
// var_dump($q[9]);
$t = explode ('=',$q[9]);
echo "Post je placen sa transaction id ".$t[1];
?>