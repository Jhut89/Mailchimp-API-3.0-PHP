<?php

namespace MailchimpAPI\Resources\Lists;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class MergeFields extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/merge-fields/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $merge_field_id)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $merge_field_id);
    }
}
