<?php

class Reports_Eepurl_Reports extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/eepurl/' . $class_input;
        } else {
            $this->url .= '/eepurl/';
        }

    }
}