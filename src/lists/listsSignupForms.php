<?php

class Lists_Signup_Forms extends Lists
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/signup-forms/' . $class_input;
        } else {
            $this->url .= '/signup-forms/';
        }

    }
} 