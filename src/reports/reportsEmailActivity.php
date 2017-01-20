<?php

class Reports_Email_Activity extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/email-activity/' . $class_input;
        } else {
            $this->url .= '/email-activity/';
        }

    }
}