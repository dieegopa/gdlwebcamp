<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/GDLWEBCAMP/' );


$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        '',''
    )
);


?>
