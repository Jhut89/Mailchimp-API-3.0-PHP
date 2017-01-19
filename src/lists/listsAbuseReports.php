<?php

class Lists_Abuse_Reports extends Lists
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/abuse-reports/' . $class_input;
        } else {
            $this->url .= '/abuse-reports/';
        }

    }
}