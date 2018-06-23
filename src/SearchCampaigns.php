<?php

namespace MailchimpAPI;

/**
 * Class SearchCampaigns
 * @package MailchimpAPI
 */
class SearchCampaigns extends Mailchimp
{
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
            $this->request->appendToEndpoint('/search-campaigns/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/search-campaigns/');
        }
    }
}
