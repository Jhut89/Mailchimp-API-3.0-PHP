<?php

namespace MailchimpAPI\Resources\Reports;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class CampaignAbuse extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/abuse-reports/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $report_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $report_id);
    }
}
