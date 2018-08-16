<?php

namespace MailchimpAPI\Resources\Reports;

use MailchimpAPI\Resources\Reports\ClickReports\Members;
use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class ClickReports extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/click-details/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $link_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $link_id);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function members($member = null)
    {
        return new Members(
            $this->getRequest(),
            $this->getSettings(),
            $member
        );
    }
}
