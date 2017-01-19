<?php

class Batch_Operations extends Mailchimp
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'operations'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .= '/batches/' . $class_input;
        } else {
            $this->url .= '/batches/';
        }
    }

}
