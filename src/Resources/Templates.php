<?php

namespace MailchimpAPI\Resources;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\Templates\DefaultContent;
use MailchimpAPI\Settings\MailchimpSettings;


class Templates extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/templates/';
    
    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $template_id)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $template_id);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function defaultContent()
    {
        return new DefaultContent(
            $this->getRequest(),
            $this->getSettings()
        );
    }
}
