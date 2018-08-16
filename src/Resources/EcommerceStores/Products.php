<?php

namespace MailchimpAPI\Resources\EcommerceStores;

use MailchimpAPI\Resources\EcommerceStores\Products\Variants;
use MailchimpAPI\Resources\EcommerceStores\Products\Images;
use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class Products extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/products/';


    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $product_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $product_id);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------


    public function variants($variant_id = null)
    {
        return new Variants(
            $this->getRequest(),
            $this->getSettings(),
            $variant_id
        );
    }

    public function images($image_id = null)
    {
        return new Images(
            $this->getRequest(),
            $this->getSettings(),
            $image_id
        );
    }
}
