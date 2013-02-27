<?php

// map class name to file
Autoloader::map(array(
	'Braintree' => __DIR__.'/library/Braintree.php',
));

Braintree_Configuration::environment(Config::get('braintree.environment', ''));
Braintree_Configuration::merchantId(Config::get('braintree.merchant_id', ''));
Braintree_Configuration::publicKey(Config::get('braintree.public_key', ''));
Braintree_Configuration::privateKey(Config::get('braintree.private_key', ''));

?>