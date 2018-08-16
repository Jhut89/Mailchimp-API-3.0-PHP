<?php

namespace MailchimpAPI\Resources\Lists;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class AbuseReports extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/abuse-reports/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $report_id)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $report_id);
    }
}
