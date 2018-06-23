<?php

namespace MailchimpAPI\Reports\ClickReports;

use MailchimpAPI\Reports\ClickReports;

/**
 * Class Members
 * @package MailchimpAPI\Reports\Click_Reports
 */
class Members extends ClickReports
{
    /**
     * Members constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $grandparent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/members/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/members/');
        }
    }
}
