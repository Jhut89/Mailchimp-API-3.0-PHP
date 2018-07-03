<?php

namespace MailchimpAPI;

/**
 * Class SearchCampaigns
 * @package MailchimpAPI
 */
class SearchCampaigns extends Mailchimp
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/search-campaigns/';

    /**
     * SearchCampaigns constructor.
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
