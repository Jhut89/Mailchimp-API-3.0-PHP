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
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/batch-webhooks/';

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
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
