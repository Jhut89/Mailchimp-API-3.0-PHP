<?php

namespace MailchimpAPI\Resources\Lists;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class GrowthHistory extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/growth-history/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $month = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $month);
    }
}
