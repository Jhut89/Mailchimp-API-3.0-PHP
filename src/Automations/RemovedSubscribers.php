<?php

namespace MailchimpAPI\Automations;

use MailchimpAPI\Automations;

/**
 * Class RemovedSubscribers
 * @package MailchimpAPI\Automations
 */
class RemovedSubscribers extends Automations
{
    /**
     * @var array
     */
    public $req_post_params = [
        'email_address'
    ];

    /**
     * RemovedSubscribers constructor.
     * @param $apikey
     * @param null $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);
        $this->request->appendToEndpoint('/removed-subscribers/');
    }
}
