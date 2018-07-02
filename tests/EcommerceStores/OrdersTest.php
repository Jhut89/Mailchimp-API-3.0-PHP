<?php

namespace MailchimpTests\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Orders;
use MailchimpTests\MailChimpTestCase;

class OrdersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Orders::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->orders(),
            "The Orders collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Orders::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->orders(1),
            "The Orders instance endpoint should be constructed correctly"
        );
    }
}
