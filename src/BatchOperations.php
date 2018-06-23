<?php

namespace MailchimpAPI;

class BatchOperations extends Mailchimp
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'operations'
    ];

    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/batches/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/batches/');
        }
    }
}
