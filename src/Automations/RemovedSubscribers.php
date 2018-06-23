<?php

namespace MailchimpAPI\Automations;

use MailchimpAPI\Automations;

class RemovedSubscribers extends Automations
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'email_address'
    ];

    public function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);
        $this->request->appendToEndpoint('/removed-subscribers/');
    }
}
