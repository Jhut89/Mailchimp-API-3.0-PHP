<?php


namespace MailchimpAPI\Reports;


use MailchimpAPI\Reports;

class OpenDetails extends Reports
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/open-details/';

    /**
     * OpenDetails constructor.
     * @param $apikey
     * @param $parent_resource
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource)
    {
        parent::__construct($apikey, $parent_resource);
        $this->request->appendToEndpoint(self::URL_COMPONENT);
    }
}
