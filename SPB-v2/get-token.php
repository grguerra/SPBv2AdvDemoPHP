<?php
$token = new Token();
$token->getToken();

/* Class to generate Bearer Token */
class Token {

    public function getToken(){
        
        $clientId = "AYOuZo84jrGah5rJB82C1czEqufmCIulTj61TpJUJdxldlRoKQNhEB0ZRT79EIGT3np3bopZNxWBLMbF";
        $secret = "EH-jsUt7TOsTQyNTNXHJLxMSSBB658gl8c7DxkmMKJ8rYIiY7ltMVb5XVKj-RxgofluclDAmD5_L7dBH";

        $endpoint = "https://api.sandbox.paypal.com/v1/oauth2/token";

        $headers = array( "Accept"=>"application/json",
          "Accept-Language"=>"en_US",
          "Content-Type"=>"application/x-www-form-urlencoded",
        );
        $postfields = "grant_type=client_credentials";

        /* Call Oauth2.0 API */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_POST, true);
        $run = curl_exec($ch);
        curl_close($ch);
        /* Call Oauth2.0 API */
        
        $runObj = json_decode($run, 1);

        return $runObj['access_token'];
    }
}
?>