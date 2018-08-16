<?php

namespace MailchimpAPI\Resources;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Settings\MailchimpSettings;

class SearchCampaigns extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/search-campaigns/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT);
    }
}
