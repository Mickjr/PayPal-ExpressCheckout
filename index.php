<?php
require_once "lib/Braintree.php";


$gateway = new Braintree_Gateway(array(
	// replace the access token with yours from the developer portal
	// when you are ready to go live you will have to switch it out again with the production account credentials
	'accessToken' => 'access_token$sandbox$pr9hbtm5by8rvkj2$614b57c5ef8888e4bacf9632171e8b48',
));

$clientToken = $gateway->clientToken()->generate();

?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  
  	<script src="https://js.braintreegateway.com/js/braintree-2.28.0.min.js"></script>
   	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<form style="margin-left:30px;" id="checkout" enctype='multipart/form-data' action="transaction.php" method="post">
        <fieldset style="">
                  <legend>PayPal Express Checkout</legend>
                  <br />
                  Gift Amount   : <input style="margin-top:10px; width: 50%;" type="text" name="amount" value="25.00" required=true/>

                   <button id="continue" class="btn btn-primary" href="#">Continue</button>
                    <br><br>
                      <div style="">
                                <div style="display:none">
                                <h4>Values returned from CLIENT SDK </h4>
                                  <table style="width:30%">
                                      <tr>
                                          <td>Nonce:</td>
                                          <td><input type="text" id="nonce" name="nonce" size="99" value=""/></td>
                                      </tr>
                                      <tr>
                                          <td>Shipping Address:</td>
                                          <td><textarea  id="shipping" name="shipping" rows="10" cols="100" value=""></textarea></td>
                                      </tr>
                                      <tr><td>Billing Address:</td>
                                          <td><textarea  id="billing" name="billing" rows="10" cols="100" value=""></textarea></td>
                                      </tr>
                                      <tr><td>Email: </td>
                                          <td><input type="text" id="email" name="email" size="99" value=""/></td>
                                      </tr>
                                  </table>
                                <br/>
                          </div>

                           <!-- confirmation form -->
                           <fieldset id="pc_form">
                                <div>
                                    <p>Please confirm the following information and click Submit to process your gift</p>
                                </div>
                                <legend>BILLING INFORMATION</legend>
                                <div style="margin-left:30px;" class="row">
                                    <div class="large-6 columns" id="p_container_first_name">
                                        <label for="p_first_name">Name</label>
                                        <input type="text" id="p_name" name="p_name" value="" readonly="readonly"/>
                                    </div>
                                    <div class="large-6 columns" id="p_container_street_address1">
                                        <label for="p_street_address1">Street Address</label>
                                        <input type="text" id="p_address" name="p_address"  value="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div style="margin-left:30px;" class="row">
                                    <div class="large-6 columns" id="pe_container_street_address2">
                                        <label for="pe_street_address2">Street Address Line 2</label>
                                        <input type="text" id="pe_address" name="pe_address"  value="" readonly="readonly"/>
                                    </div>
                                    <div class="large-6 columns" id="p_container_city">
                                        <label for="p_city">City</label>
                                        <input type="text" id="p_city" name="p_city"  value="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div style="margin-left:30px;" class="row">
                                    <div class="large-6 columns" id="p_container_state">
                                        <label for="p_state">State</label>
                                        <input type="text" id="p_state" name="p_state"  value="" readonly="readonly"/>
                                    </div>                                   
                                    <div class="large-6 columns" id="p_container_zipcode">
                                        <label for="p_zipcode">Zip Code</label>
                                        <input type="text" id="p_zipcode" name="p_zipcode"  value="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div style="margin-left:30px;" class="row">
                                    <div class="large-6 columns" id="p_container_countrycode">
                                        <label for="p_countrycode">Country</label>
                                        <input type="text" id="p_country" name="p_country"  value="" readonly="readonly"/>
                                    </div>
                                    <div class="large-6 columns" id="p_container_email">
                                        <label for="p_email">Email Address</label>
                                        <input type="text" id="p_email" name="p_email"  value="" readonly="readonly"/>
                                    </div>
                                </div>
                                </fieldset>
                            <br/>
                         <br/>
                    </div>
                              <button id="continue_label" class="btn btn-success">Submit</button>
                        <br/>  <br/>
              </fieldset>

            </form>

<!-- <form id="checkout" action="transaction.php" method="post">

<fieldset style="width: 50%; margin-left:30px;">
			
			<legend>PayPal Express Checkout</legend>
			
			<br />
			
			Amount   : <input type="text" name="amount" value="2" required=true/> 
			
			<br><br>

			<a id="continue" class="btn btn-primary" href="#" role="button">PayPal</a>
			
			

			<div style="">

			<h4>Values returned from CLIENT SDK </h4>
			
			<table style="width:30%">
				<tr>
					<td>Nonce:</td>
					<td><input type="text" id="nonce" name="nonce" size="99" value=""/></td>
				</tr>
				<tr>
					<td>Shipping Address:</td>
					<td><textarea  id="shipping" name="shipping" rows="10" cols="100" value=""></textarea></td>
				</tr>
				<tr><td>Billing Address:</td>
					<td><textarea  id="billing" name="billing" rows="10" cols="100" value=""></textarea></td>
				</tr>
				<tr><td>Email: </td>
					<td><input type="text" id="email" name="email" size="99" value=""/></td>
				</tr>
			</table>
			
			<br/>

			</div>

			<legend></legend>

			<input class="btn btn-success" type="submit" value="Continue"/>
			
			<br/>  <br/>
			
		</fieldset>
		
		</form> -->
		
		<br/>

		
		</body>
</html>

<script type="text/javascript">

var checkout;

braintree.setup("<?php echo $clientToken?>", 'custom', {
  onReady: function (integration) {
    checkout = integration;

  },

  onPaymentMethodReceived: function (obj) {
    // retrieve nonce from obj.nonce

    // assgining the values returned from the SDK so that i can submit the form later.
    document.getElementById("nonce").value = obj.nonce;
    document.getElementById("shipping").value =  JSON.stringify(obj.details.shippingAddress);
    document.getElementById("billing").value = JSON.stringify(obj.details.billingAddress );
    document.getElementById("email").value = JSON.stringify(obj.details.email );

    // parse object for confirmation to customer
    document.getElementById("p_name").value = obj.details.shippingAddress.recipientName;
    document.getElementById("p_address").value = obj.details.billingAddress.streetAddress;
    document.getElementById("pe_address").value = obj.details.billingAddress.extendedAddress;
    document.getElementById("p_city").value = obj.details.billingAddress.locality;
    document.getElementById("p_state").value = obj.details.billingAddress.region;
    document.getElementById("p_zipcode").value = obj.details.billingAddress.postalCode;
    document.getElementById("p_country").value = obj.details.billingAddress.countryCodeAlpha2;
    document.getElementById("p_email").value = obj.details.email;
    
    

       console.log(JSON.stringify(obj));
    // console.log(obj.nonce); // nonce
    // console.log(obj.details.shippingAddress.recipientName); //Customer Name
    // console.log(obj.details.billingAddress.streetAddress); //Customer Billing Address
    // console.log(obj.details.billingAddress.extendedAddress); //Customer Extended Billing Address
    // console.log(obj.details.billingAddress.locality); //Customer City Location
    // console.log(obj.details.billingAddress.region); //Customer State Location 
    // console.log(obj.details.billingAddress.postalCode); //Customer Postal Code
    // console.log(obj.details.billingAddress.countryCodeAlpha2); //Customer Country Code
    // console.log(obj.details.email); //Customer Email Address
  },

  paypal: {
    singleUse: true,
    amount: 10.00,
    currency: 'USD',
    locale: 'en_us',
    enableShippingAddress: 'true',
    headless: true
 
  }

 });

 document.querySelector('#continue').addEventListener('click', function (event) {
  event.preventDefault();
  checkout.paypal.initAuthFlow();
 }, false);


 


</script>







