<?php

namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;

class Customers extends EcommerceStores
{

    public $class_input;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'id',
        'email_address',
        'opt_in_status'
    ];
    public $req_put_params = [
        'id',
        'email_address',
        'opt_in_status'
    ];

    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/customers/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/customers/');
        }
        $this->class_input = $class_input;
    }

}
