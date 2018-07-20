<?php

namespace MailchimpAPI;

/**
 * Class Account
 * is a representation of the root of the mailchimp api
 * @package Mailchimp_API
 */
class Account extends Mailchimp
{
    public function something()
    {
        print "this shouldnt be here!";
    }
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/';

    /**
     * Account constructor.
     * @param $apikey
     * @throws MailchimpException
     */
    public function __construct($apikey)
    {
        parent::__construct($apikey);
            $this->request->appendToEndpoint(self::URL_COMPONENT);
    }
}
