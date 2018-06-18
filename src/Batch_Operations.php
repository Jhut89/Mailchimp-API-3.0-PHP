<?php

namespace Mailchimp_API;

class Batch_Operations extends Mailchimp
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'operations'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->url .= '/batches/' . $class_input;
        } else {
            $this->url .= '/batches/';
        }
    }

}
