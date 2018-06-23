<?php

namespace MailchimpAPI\Lists\Members;

use MailchimpAPI\Lists\Members;

/**
 * Class Goals
 * @package MailchimpAPI\Lists\Members
 */
class Goals extends Members
{
    /**
     * Goals constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $grandparent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/goals/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/goals/');
        }
    }
}