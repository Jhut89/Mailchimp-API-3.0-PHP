<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

/**
 * Class AbuseReports
 * @package MailchimpAPI\Lists
 */
class AbuseReports extends Lists
{
    /**
     * AbuseReports constructor.
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
