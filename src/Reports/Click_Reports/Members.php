<?php

namespace Mailchimp_API\Reports\Click_Reports;

use Mailchimp_API\Reports\Click_Reports;

class Members extends Click_Reports
{
    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->url .= '/members/' . $class_input;
        } else {
            $this->url .= '/members/';
        }

    }
}