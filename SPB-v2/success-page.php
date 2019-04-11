<?php

$ORID = $_POST['order_id'];
$TXNID = $_POST['transaction_id'];

?>
<html>

        <head>
        <title>PPP - PayPal Pizza</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="PayPal SPB Presentation">
        <meta name="author" content="Gabriel Guerra">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        </head>


    <div class="container">
    
  <h1><img id="header-logo" src="/media/PPPlogo2.png"></h1>
  <h2>PayPal Pizza! The fastest, cleanest and most secure Pizza place in town!</h2> 
    </div>
    
    <div class="container">
    <h1>Thank you for buying! Your pizza should be ready and sent in a few minutes!</h1>
    <h2>PayPal Order Id: <?php print_r($ORID)?></h2>
    <h2>PayPal Transaction Id: <?php print_r($TXNID)?></h2>
   
    <!--Button to return to cart-->
    <form action="/index.php">
        <button>I'm still hungry!</button>
    </form>

     </div>
</html>