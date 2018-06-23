<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class CampaignAbuse
 * @package MailchimpAPI\Reports
 */
class CampaignAbuse extends Reports
{
    /**
     * CampaignAbuse constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/abuse-reports/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/abuse-reports/');
        }
    }
}
