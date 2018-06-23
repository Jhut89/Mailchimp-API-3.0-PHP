<?php

namespace MailchimpAPI\Templates;

use MailchimpAPI\Templates;

/**
 * Class DefaultContent
 * @package MailchimpAPI\Templates
 */
class DefaultContent extends Templates
{
    /**
     * DefaultContent constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/default-content/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/default-content/');
        }
    }
}
