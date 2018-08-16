<?php

namespace MailchimpAPI\Resources\Reports;


use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class TopLocations extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/locations/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT);
    }
}
