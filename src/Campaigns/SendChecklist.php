<?php

namespace MailchimpAPI\Campaigns;

use MailchimpAPI\Campaigns;

/**
 * Class SendChecklist
 * @package MailchimpAPI\Campaigns
 */
class SendChecklist extends Campaigns
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/send-checklist/';

    /**
     * SendChecklist constructor.
     * @param $apikey
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->request->appendToEndpoint(self::URL_COMPONENT);
    }
}
