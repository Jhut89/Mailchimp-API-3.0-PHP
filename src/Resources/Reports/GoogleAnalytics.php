<?php


namespace MailchimpAPI\Resources\Reports;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class GoogleAnalytics extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/google-analytics/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $profile_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $profile_id);
    }
}
