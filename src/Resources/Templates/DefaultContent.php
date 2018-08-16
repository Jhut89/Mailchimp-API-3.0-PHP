<?php

namespace MailchimpAPI\Resources\Templates;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class DefaultContent extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/default-content/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT);
    }
}
