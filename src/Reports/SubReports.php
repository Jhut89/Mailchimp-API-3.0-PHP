<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class SubReports
 * @package MailchimpAPI\Reports
 */
class SubReports extends Reports
{
    /**
     * SubReports constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/sub-reports/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/sub-reports/');
        }
    }
}
