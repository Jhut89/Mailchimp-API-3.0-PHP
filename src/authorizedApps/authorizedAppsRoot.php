<?php

class Authorized_Apps extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'client_id',
        'client_secret'
    ];


    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);  
        if (isset($class_input)) {
            $this->url .=  '/authorized-apps/' . $class_input;
        } else {
            $this->url .=  '/authorized-apps/';
        }

    }
    
}