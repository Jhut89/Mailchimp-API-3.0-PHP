<?php

namespace MailchimpAPI;

class AuthorizedApps extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'client_id',
        'client_secret'
    ];


    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/authorized-apps/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/authorized-apps/');
        }
    }
}
