<?php

namespace Mailchimp_API\Lists\Members;

class Activity extends Members
{
    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/activity/' . $class_input;
        } else {
            $this->url .= '/activity/';
        }

    }
}