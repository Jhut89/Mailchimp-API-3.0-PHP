<?php

namespace MailchimpAPI;

/**
 * Class BatchWebhooks
 * @package MailchimpAPI
 */
class BatchWebhooks extends Mailchimp
{
    /**
     * @var array
     */
    public $req_post_params = [
        'url'
    ];

    /**
     * BatchWebhooks constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
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
