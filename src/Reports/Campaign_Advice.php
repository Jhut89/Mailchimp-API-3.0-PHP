<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

class Campaign_Advice extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/advice/' . $class_input;
        } else {
            $this->url .= '/advice/';
        }

    }
}