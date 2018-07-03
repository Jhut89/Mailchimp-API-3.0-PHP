<?php

namespace MailchimpAPI;

/**
 * Class BatchOperations
 * @package MailchimpAPI
 */
class BatchOperations extends Mailchimp
{

    /**
     * @var array
     */
    public $req_post_params = [
        'operations'
    ];

    const URL_COMPONENT = '/batches/';

    /**
     * BatchOperations constructor.
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
