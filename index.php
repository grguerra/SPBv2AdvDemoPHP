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
        <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
        <script src="SPB-v2/script.js"></script>
        <link rel="stylesheet" type="text/css" href="SPB-v2/style.css">
        </head>

<body>
    
    <div class="container">
    
  <h1><img id="header-logo" src="media/PPPlogo2.png"></h1>
  <h2>PayPal Pizza! The fastest, cleanest and most secure Pizza place in town!</h2> 
    </div>
   
    <!-- Cart -->
    <div id="cartinfo" class="container">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Number</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="item">
                        <td class="name">Xoom Shrooms</td>
                        <td class="sku">02532</td>
                        <td>USD <span class="price">12.95</span></td>
                        <td><input class="amount" type="number" value="1" min="1" max="10" step="1"/></td>
                        <td><button class="remove">Remove</button></td>
                      </tr>
                      <tr class="item">
                        <td class="name">Paydiant Pepperonis</td>
                        <td class="sku">02533</td>
                        <td>USD <span class="price">14.80</span></td>
                        <td><input class="amount" type="number" value="1" min="1" max="10" step="1"/></td>
                        <td><button class="remove">Remove</button></td>
                      </tr>
                      <tr class="item">
                        <td class="name">Venmo Vegan</td>
                        <td class="sku">02534</td>
                        <td>USD <span class="price">17.50</span></td>
                        <td><input class="amount" type="number" value="1" min="1" max="10" step="1"/></td>
                        <td><button class="remove">Remove</button></td>
                      </tr>
                      <tr class="item">
                        <td class="name">Braintree Broccoli</td>
                        <td class="sku">02535</td>
                        <td>USD <span class="price">9.99</span></td>
                        <td><input class="amount" type="number" value="1" min="1" max="10" step="1"/></td>
                        <td><button class="remove">Remove</button></td>
                      </tr>
                      <tr class="item">
                        <td>Total</td>
                        <td></td>
                        <td>USD <span class="total"></span></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
            <button class="reset">Reset</button>
        </div>
        
    </div>
    
    <!-- Shipping info form -->
    <div class="container">
        
        <h2>Buyer Information</h2>
        
            <form action="javascript:void(0);">
                  
          <div class="form-group">
            <div class="form-group col-md-6">
            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" value="Mary">
            </div>
             <div class="form-group col-md-6">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value="Sue">
            </div>
            
            <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="marysue@gmail.com">
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputPhone">Phone</label>
            <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="931-267-7690">
            </div>
            
            
          <h2>Shipping Address</h2>  
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Street" value="53  Farm Meadow Drive">
          </div>
          
          <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="Apt 31">
          </div>
               
               
            <div class="form-group col-md-4">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity" placeholder="City" value="FREDERICK">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">State</label>
              <input type="text" class="form-control" id="inputState" placeholder="CA" value="CO">
              </select>
            </div>
            
            
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip" placeholder="00000" value="80530">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputCountry">Country</label>
               <select class="form-control" name="countrySelect" id="countrySelect">
                        <option value="US" selected>United States</option>
                    </select>
            </div>
            
          </div>
          
          <!-- Button to enable checkout -->
         <div class="container"> 
        <button id="checkout">Checkout</button></p>
        </div>
        </form>
        
    </div>
    

   
           <div class="container">
             <div class="row">
                 <div class="col">
                     
                     <!-- PayPal button -->
                     <h1 class="text-center" id="ppcont">
                       <p>Total: USD <span id="totalamt" class="total"></span></p>
                       <div id="paypal-button-container"></div></h1>
                 </div>
             </div>
            </div>
        
    
</body>

        <script>

        
        // PayPal Checkout Script //
        
        
          paypal.Buttons({
            
            // Button Configuration
            style: {
            layout: 'horizontal',   // horizontal | vertical
            size:   'responsive',    // medium | large | responsive
            shape:  'pill',      // pill | rect
            color:  'blue'       // gold | blue | silver | black
            },
            
            // Execute payment on authorize
            commit: true,
            
            // Create Order Function  
            createOrder: function() {
              
            //Get the cart details            
              var prices = document.getElementsByClassName("price");
              var names = document.getElementsByClassName("name");
              var sku = document.getElementsByClassName("sku");
              var amounts = document.getElementsByClassName("amount");
              var num = 0;
              
              // Populate the postData with the transaction details
              let
                
                countrySelect = document.getElementById("countrySelect"),
                total_amt = document.getElementById("totalamt").innerHTML,
                postData = new FormData();
                postData.append('total_amt',total_amt);
                postData.append('currency','USD');
                postData.append('shipping_recipient_name',(document.getElementById("inputFirstName").value + " " + document.getElementById("inputLastName").value));
                postData.append('shipping_line1',document.getElementById("inputAddress").value);
                postData.append('shipping_line2',document.getElementById("inputAddress2").value);
                postData.append('shipping_city',document.getElementById("inputCity").value);
                postData.append('shipping_state',document.getElementById("inputState").value);
                postData.append('shipping_postal_code',document.getElementById("inputZip").value);
                postData.append('shipping_country_code',countrySelect.options[countrySelect.selectedIndex].value);

                // Add the valid item details
                for(var a = 0; a < prices.length; ++a){
                if(prices[a].parentElement.parentElement.style.display != 'none'){
                  postData.append(('itemname' + num), names[a].innerHTML);
                  postData.append(('itemsku' + num), sku[a].innerHTML);
                  postData.append(('itemprice' + num), prices[a].innerHTML);
                  postData.append(('itemamount' + num), amounts[a].value);
                  num++;
                  }
                }
				postData.append('itemnum', num);
                
              
              // Create the Order
              return fetch('SPB-v2/create-order.php', {
                    method: 'POST',
                    body: postData
                }
            ).then(function(res) {
                 
                  return res.json();
                
              
                }).then(function(data) {
                  return data.id;
                });
            },

                // Finalize the Transaction
            onApprove: function(data, actions) {
                return fetch('SPB-v2/capture-order.php/?orderId=' + data.orderID, {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(details) {
                    // Redirect the Buyer to the Success Page
                    console.log(details.purchase_units[0].payments.captures[0].id);
                    var form = $('<form action="/SPB-v2/success-page.php" method="post">' +
                      '<input type="text" name="order_id" value="' + data.orderID + '" />' +
                      '<input type="text" name="transaction_id" value="' + details.purchase_units[0].payments.captures[0].id + '" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();
                });
            }
          }).render('#paypal-button-container');
        </script>
</html>
