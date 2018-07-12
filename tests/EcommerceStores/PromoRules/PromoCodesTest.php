<?php

namespace MailchimpTests\EcommerceStores\PromoRules;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\PromoRules;
use MailchimpAPI\EcommerceStores\PromoRules\PromoCodes;
use MailchimpTests\MailChimpTestCase;

class PromoCodesTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . PromoRules::URL_COMPONENT . 1 . PromoCodes::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->promoRules(1)->promoCodes(),
            "The Promo Codes collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . PromoRules::URL_COMPONENT . 1 . PromoCodes::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->promoRules(1)->promoCodes(1),
            "The Promo Codes instance endpoint should be constructed correctly"
        );
    }
}
