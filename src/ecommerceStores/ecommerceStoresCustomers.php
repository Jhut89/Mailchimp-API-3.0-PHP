<?php

class Ecommerce_Customers extends Ecommerce_Stores
{

    public $class_input;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'email_address',
        'opt_in_status'
    ];
    public $req_put_prarams = [
        'id',
        'email_address',
        'opt_in_status'
    ];

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/customers/' . $class_input;
        } else {
            $this->url .= '/customers/';
        }

        $this->class_input = $class_input;
    }

}