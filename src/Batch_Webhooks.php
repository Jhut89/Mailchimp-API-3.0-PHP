<?php

namespace Mailchimp_API;

class Batch_Webhooks extends Mailchimp
{
    public $req_post_params = [
        'url'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .= '/batch-webhooks/' . $class_input;
        } else {
            $this->url .= '/batch-webhooks/';
        }
    }
}