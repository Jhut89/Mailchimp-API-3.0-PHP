<?php

require_once "vendor/autoload.php";

use Mailchimp_API\Mailchimp;

$mc = new Mailchimp("7a119e6089a1b03c341feff04870526d-us8");

/* @var \Mailchimp_API\Utilities\MailchimpResponse $response */
$response = $mc
    ->account()
    ->GET();


var_dump($response->getHttpCode());