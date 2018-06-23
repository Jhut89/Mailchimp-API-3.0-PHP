<?php

require_once "vendor/autoload.php";

use MailchimpAPI\Mailchimp;

$mc = new Mailchimp("7a119e6089a1b03c341feff04870526d-us8");

/* @var \MailchimpAPI\Utilities\MailchimpResponse $response */
$response = $mc
    ->ecommStores()
    ->get();


var_dump($response->deserialize());