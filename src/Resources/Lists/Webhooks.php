<?php

namespace MailchimpAPI\Resources\Lists;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class Webhooks extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/webhooks/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $webhook_id)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $webhook_id);
    }
}
