<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

class Clients extends Lists
{
    /**
     * Clients constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/clients/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/clients/');
        }
    }
}