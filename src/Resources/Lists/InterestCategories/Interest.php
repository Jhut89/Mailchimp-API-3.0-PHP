<?php

namespace MailchimpAPI\Resources\Lists\InterestCategories;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

/**
 * Class Interest
 * @package MailchimpAPI\Lists\Interests_Categories
 */
class Interest extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/interests/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $interest_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $interest_id);
    }
}
