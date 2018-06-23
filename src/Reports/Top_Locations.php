<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

class Top_Locations extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/locations/' . $class_input;
        } else {
            $this->url .= '/locations/';
        }

    }
}