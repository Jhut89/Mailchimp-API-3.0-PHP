<?php

namespace MailchimpAPI\Templates;

use MailchimpAPI\Templates;

class Default_Content extends Templates
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/default-content/' . $class_input;
        } else {
            $this->url .= '/default-content/';
        }

    }
}