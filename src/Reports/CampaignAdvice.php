<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class CampaignAdvice
 * @package MailchimpAPI\Reports
 */
class CampaignAdvice extends Reports
{
    /**
     * CampaignAdvice constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/advice/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/advice/');
        }
    }
}
