
<?php

require_once "lib/Braintree.php";

$gateway = new Braintree_Gateway(array(
	'accessToken' => 'access_token$sandbox$pr9hbtm5by8rvkj2$614b57c5ef8888e4bacf9632171e8b48',
));

	$result = $gateway->transaction()->sale([
		"amount" => $_POST['amount'],
		"paymentMethodNonce" => $_POST['nonce'],
		"orderId" => 'Invoice' . '__' . $_POST['nonce'],
		"shipping" => [
		  "firstName" => "Jen",
		  "lastName" => "Smith",
		  "company" => "Braintree",
		  "streetAddress" => $_POST['streetAddress'],
		  "extendedAddress" => $_POST['extendedAddress'],
		  "locality" => $_POST['locality'],
		  "region" => $_POST['region'],
		  "postalCode" => $_POST['postalCode'],
		  "countryCodeAlpha2" => $_POST['countryCodeAlpha2']
		],      
		"options" => [
		  "paypal" => [
			"customField" => 'Custom' . '__' . $_POST['nonce'],
			"description" => 'Description' . '__' . $_POST['nonce']
		  ],
		  'submitForSettlement' => true,
		  //'storeInVaultOnSuccess' => true
		]
	]);
	
	// echo "<script type='text/javascript'>window.location.href = '/';</script>";

echo "<h2>Result: This is the entire result object, you should parse and store the important details such as transaction id, buyers email etc.</h2><br> <pre>";
    var_dump($result);
echo "</pre>";


/*if ($result->success) {
   echo'Valid Transaction!';
    echo "<h2>Result:</h2><br> <pre>";
    var_dump($result);
    echo "</pre>";
} else {
    foreach($result->errors->deepAll() AS $error) {
        echo($error->code . ": " . $error->message . "\n");
        echo "<h2>Result:</h2><br> <pre>";
        var_dump($result);
        echo "</pre>";
    }
}*/
