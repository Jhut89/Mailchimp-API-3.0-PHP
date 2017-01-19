<?php

class Automations_Removed_Subscribers extends Automations
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'email_address'
    ];

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);  
        $this->url .= '/removed-subscribers/';

    }


}