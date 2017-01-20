<?php

class Reports_Unsubscribes extends Reports
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/unsubscribed/' . $class_input;
        } else {
            $this->url .= '/unsubscribed/';
        }

    }
}