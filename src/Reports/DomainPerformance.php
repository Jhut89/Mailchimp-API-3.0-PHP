<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class DomainPerformance
 * @package MailchimpAPI\Reports
 */
class DomainPerformance extends Reports
{
    const URL_COMPONENT = '/domain-performance/';

    /**
     * DomainPerformance constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
