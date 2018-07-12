<?php


namespace MailchimpAPI;


class Ping extends Mailchimp
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/ping';

    /**
     * OpenDetails constructor.
     * @param $apikey
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey)
    {
        parent::__construct($apikey);
        $this->request->appendToEndpoint(self::URL_COMPONENT);
    }
}
