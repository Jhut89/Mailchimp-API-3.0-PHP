<?php

class Lists_Members_Member_Goals extends Lists_Members
{
    function __construct($apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/goals/' . $class_input;
        } else {
            $this->url .= '/goals/';
        }

    }
}