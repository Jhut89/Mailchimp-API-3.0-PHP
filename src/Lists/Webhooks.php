<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

/**
 * Class Webhooks
 * @package MailchimpAPI\Lists
 */
class Webhooks extends Lists
{
    /**
     * Webhooks constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/webhooks/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/webhooks/');
        }
    }
}
