<?php

class Reports_Sent_To extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/sent-to/' . $class_input;
        } else {
            $this->url .= '/sent-to/';
        }

    }
}