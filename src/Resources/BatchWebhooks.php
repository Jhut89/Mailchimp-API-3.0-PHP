<?php

namespace MailchimpAPI\Resources;
use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Settings\MailchimpSettings;

/**
 * Class BatchWebhooks
 * @package MailchimpAPI
 */
class BatchWebhooks extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/batch-webhooks/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $batch_webhook_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $batch_webhook_id);
    }
}
