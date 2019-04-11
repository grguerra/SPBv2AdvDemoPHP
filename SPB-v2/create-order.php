<?php



/* GetToken */
require_once(__DIR__.'/get-token.php');
$token = new Token();
$accessToken = $token->getToken();
/* GetToken */



$paypalCheckout = new PaypalCheckout();
$paypalCheckout->createOrder($accessToken);

/* Class to Create Order */
class PaypalCheckout{
    
    

  public function createOrder($accessToken){

   /* PayPal Sandbox Environment */
   $url = "https://api.sandbox.paypal.com/v2/checkout/orders";
   
   /* Call Headers */
   $paymentHeaders = array("Content-Type: application/json", "Authorization: Bearer ".$accessToken);
   
   
    /* Generates Random Invoice Number */
    $randNo= (string)rand(10000,20000);
    $postfields = '{}';

            /* Fill payload with transaction info */
            $postfieldsArr = json_decode($postfields, true);
            $postfieldsArr['intent'] = "CAPTURE";
        	$postfieldsArr['application_context']['shipping_preference'] = "SET_PROVIDED_ADDRESS";
        	$postfieldsArr['application_context']['user_action'] = "PAY_NOW";
        	
        	$postfieldsArr['purchase_units'][0]['description'] = "PayPalPizza";
        	$postfieldsArr['purchase_units'][0]['description'] = "INV-PayPalPizza-" . $randNo;
        	$postfieldsArr['purchase_units'][0]['amount']['currency_code'] = $_POST['currency'];
        	$postfieldsArr['purchase_units'][0]['amount']['value'] = $_POST['total_amt'];
        	$postfieldsArr['purchase_units'][0]['amount']['breakdown']['item_total']['currency_code'] = $_POST['currency'];
        	$postfieldsArr['purchase_units'][0]['amount']['breakdown']['item_total']['value'] = $_POST['total_amt'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['address_line_1']= $_POST['shipping_line1'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['address_line_2']= $_POST['shipping_line2'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['admin_area_2']= $_POST['shipping_city'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['admin_area_1']= $_POST['shipping_state'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['postal_code']= $_POST['shipping_postal_code'];
            $postfieldsArr['purchase_units'][0]['shipping']['address']['country_code']= $_POST['shipping_country_code'];
            
            for($a = 0; $a < $_POST['itemnum']; $a++){
                $postfieldsArr['purchase_units'][0]['items'][$a]['name'] = $_POST[('itemname'. $a )];
                $postfieldsArr['purchase_units'][0]['items'][$a]['description'] = $_POST[('itemname'. $a)]; 
                $postfieldsArr['purchase_units'][0]['items'][$a]['sku'] = $_POST[('itemsku'. $a)]; 
                $postfieldsArr['purchase_units'][0]['items'][$a]['unit_amount']['currency_code'] = $_POST['currency']; 
                $postfieldsArr['purchase_units'][0]['items'][$a]['unit_amount']['value'] = $_POST[('itemprice'. $a)];
                $postfieldsArr['purchase_units'][0]['items'][$a]['quantity'] = $_POST[('itemamount'. $a)];
                $postfieldsArr['purchase_units'][0]['items'][$a]['category'] = "PHYSICAL_GOODS";
            }
            
            $postfields = json_encode($postfieldsArr);


    
/* Call Orders API */
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $paymentHeaders);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_POST, true);
   $run = curl_exec($ch);
   curl_close($ch);
/* Call Orders API */

   echo $run;
 }
}
?>