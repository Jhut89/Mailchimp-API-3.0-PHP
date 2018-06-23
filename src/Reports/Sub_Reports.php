<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

class Sub_Reports extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/sub-reports/' . $class_input;
        } else {
            $this->url .= '/sub-reports/';
        }

    }
}