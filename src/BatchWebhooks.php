<?php

namespace MailchimpAPI;

class BatchWebhooks extends Mailchimp
{
    public $req_post_params = [
        'url'
    ];

    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/batch-webhooks/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/batch-webhooks/');
        }
    }
}
