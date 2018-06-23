<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;

class Sent_To extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/sent-to/' . $class_input;
        } else {
            $this->url .= '/sent-to/';
        }

    }
}