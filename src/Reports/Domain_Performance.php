<?php

namespace Mailchimp_API\Reports;

use Mailchimp_API\Reports;

class Domain_Performance extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/domain-performance/' . $class_input;
        } else {
            $this->url .= '/domain-performance/';
        }

    }
}