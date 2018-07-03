<?php

namespace MailchimpAPI;

/**
 * Class SearchMembers
 * @package MailchimpAPI
 */
class SearchMembers extends Mailchimp
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/search-members/';

    /**
     * SearchMembers constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
