<?php

class Reports_Sub_Reports extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/sub-reports/' . $class_input;
        } else {
            $this->url .= '/sub-reports/';
        }

    }
}