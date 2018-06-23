<?php

namespace MailchimpAPI\Lists\Members;

use MailchimpAPI\Lists\Members;

class Activity extends Members
{
    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->url .= '/activity/' . $class_input;
        } else {
            $this->url .= '/activity/';
        }

    }
}