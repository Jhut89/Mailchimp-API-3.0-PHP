<?php

namespace MailchimpTests;


use MailchimpAPI\EcommerceStores;

class EcommerceStoresTest extends MailChimpTestCase
{
    public function testEcommerceStoresCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT,
            $this->mailchimp->ecommStores(),
            "The Ecommerce Stores collection endpoint should be constructed correctly"
        );
    }

    public function testEcommerceStoresInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1),
            "The Ecommerce Stores instance endpoint should be constructed correctly"
        );
    }
}
