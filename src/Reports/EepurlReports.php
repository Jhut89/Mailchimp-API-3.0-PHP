<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class EepurlReports
 * @package MailchimpAPI\Reports
 */
class EepurlReports extends Reports
{
    /**
     * EepurlReports constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/eepurl/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/eepurl/');
        }
    }
}
