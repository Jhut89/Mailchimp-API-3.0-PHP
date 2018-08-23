<?php


namespace MailchimpAPI\Resources;


use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Settings\MailchimpSettings;

class FacebookAds extends ApiResource
{
    const URL_COMPONENT = "/facebook-ads/";
    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $outreach_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $outreach_id);
    }
}