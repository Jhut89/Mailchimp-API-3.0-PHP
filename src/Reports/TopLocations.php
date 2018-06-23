<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class TopLocations
 * @package MailchimpAPI\Reports
 */
class TopLocations extends Reports
{
    /**
     * TopLocations constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/locations/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/locations/');
        }
    }
}
