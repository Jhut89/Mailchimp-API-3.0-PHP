<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class SentTo
 * @package MailchimpAPI\Reports
 */
class SentTo extends Reports
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/sent-to/';

    /**
     * SentTo constructor.
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
