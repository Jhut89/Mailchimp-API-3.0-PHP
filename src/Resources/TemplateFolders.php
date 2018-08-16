<?php

namespace MailchimpAPI\Resources;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Settings\MailchimpSettings;

class TemplateFolders extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/template-folders/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $folder_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $folder_id);
    }
}
