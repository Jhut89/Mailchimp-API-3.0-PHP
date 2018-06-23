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
     * SendChecklist constructor.
     * @param $apikey
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->request->appendToEndpoint('/send-checklist/');
    }
}
