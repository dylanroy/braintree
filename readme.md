## Braintree Bundle

Braintree Laravel bundle is simple API wrapper for Braintree's PHP API.

Install using Artisan CLI:

	php artisan bundle:install braintree


Either auto-load the bundle in application/bundles.php:

	return array(
		'braintree' => array('auto'=>true)
	);

Or manually start:

	Bundle::start('braintree');

You can than use the Braintree API like normal (see Braintree API https://www.braintreepayments.com/docs/php)

	Braintree_Configuration::environment('sandbox');
	Braintree_Configuration::merchantId('your_merchant_id');
	Braintree_Configuration::publicKey('your_public_key');
	Braintree_Configuration::privateKey('your_private_key');

	$result = Braintree_Transaction::sale(array(
		'amount' => '1000.00',
		'creditCard' => array(
			'number' => '5105105105105100',
			'expirationDate' => '05/12'
		)
	));

	if ($result->success) {
		print_r("success!: " . $result->transaction->id);
	} else if ($result->transaction) {
		print_r("Error processing transaction:");
		print_r("\n  message: " . $result->message);
		print_r("\n  code: " . $result->transaction->processorResponseCode);
		print_r("\n  text: " . $result->transaction->processorResponseText);
	} else {
		print_r("Message: " . $result->message);
		print_r("\nValidation errors: \n");
		print_r($result->errors->deepAll());
	}


If you don't want to call the Braintree_Configuration's all the time you can create a braintree.php config file with the following entry:

	return array(
		'environment' => 'sandbox',// or production
		'public_key' => 'your_public_key',
		'private_key' => 'your_private_key',
		'merchant_id' => 'your_merchant_id'
	);

Stripe has introduced a version number to avoid breaking changes.  

Braintree is an payment company with a simple API and a reasonable fee structure.

- Homepage:		   https://www.braintreepayments.com/
- PHP API: 	  	   https://www.braintreepayments.com/docs/php
- Documentation:   https://www.braintreepayments.com/docs/
