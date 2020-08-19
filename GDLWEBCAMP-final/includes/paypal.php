<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/GDLWEBCAMP/' );


$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AW59ZHjVDyp6PxEYP9C9t50PMUNafM-xXmjPRTetoXx20UZ-7rP9Ibz1K8TJWkddS6_l_s4rZSeS3GAR',
        'EGbWhkeNSyHKqsOdduRpKRTU9fG7yXEYCd-4vOVDrvky9I88-uk1I5pGePn7L-aDbwM7Oo9P8XR3END2'
    )
);


?>