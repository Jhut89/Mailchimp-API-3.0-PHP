<?php

class Lists_Webhooks extends Lists
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/webhooks/' . $class_input;
        } else {
            $this->url .= '/webhooks/';
        }

    }
}