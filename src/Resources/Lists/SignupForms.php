<?php

namespace MailchimpAPI\Resources\Lists;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class SignupForms extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/signup-forms/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $form_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $form_id);
    }
}
