<?php

namespace MailchimpAPI;

/**
 * Class SearchMembers
 * @package MailchimpAPI
 */
class SearchMembers extends Mailchimp
{
    /**
     * SearchMembers constructor.
     * @param $apikey
     * @param $class_input
     * @throws Library_Exception
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/search-members/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/search-members/');
        }
    }
}
