<?php

namespace MailchimpAPI\Resources\Lists\Members;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class Notes extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/notes/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $note_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $note_id);
    }
}
