<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

class Webhooks extends Lists
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/webhooks/' . $class_input;
        } else {
            $this->url .= '/webhooks/';
        }

    }
}