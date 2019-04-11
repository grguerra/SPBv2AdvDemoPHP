<?php
/* GetToken */
require_once(__DIR__.'/get-token.php');
$token = new Token();
$accessToken = $token->getToken();
/* GetToken */

$paypalCheckout = new PaypalCheckout();
$paypalCheckout->captureOrder($accessToken);

/* Get Order Id */
$orderId = $_POST['orderId'];

/* Class to Capture the Order */
class PaypalCheckout{

   public function captureOrder($accessToken){
 
   $id = $orderId;
   $url = "https://api.sandbox.paypal.com/v2/checkout/orders/".$id."/capture";

   $paymentHeaders = array("Content-Type: application/json", "Authorization: Bearer ".$accessToken,"PayPal-Request-Id: 7b92603e-77ed-4896-8e78-5dea2050476a");

/* Call capture API */
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $paymentHeaders);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_POST, true);
   $run = curl_exec($ch);
   curl_close($ch);
/* Call capture API */

   echo $run;

 }
}
?>