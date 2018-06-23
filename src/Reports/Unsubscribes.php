<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

/**
 * Class Unsubscribes
 * @package MailchimpAPI\Reports
 */
class Unsubscribes extends Reports
{
    /**
     * Unsubscribes constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/unsubscribed/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/unsubscribed/');
        }
    }
}