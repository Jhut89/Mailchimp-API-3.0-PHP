<?php

require_once "vendor/autoload.php";

use Mailchimp_API\Mailchimp;

$mc = new Mailchimp("7a119e6089a1b03c341feff04870526d-us8");

$account = $mc
    ->account()
    ->GET();


//var_dump($account->request);