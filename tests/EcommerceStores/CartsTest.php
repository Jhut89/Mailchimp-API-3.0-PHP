<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 4:36 PM
 */

namespace MailchimpTests\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Carts;
use MailchimpTests\MailChimpTestCase;

class CartsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Carts::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->carts(),
            "The Carts collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Carts::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->carts(1),
            "The Carts instance endpoint should be constructed correctly"
        );
    }
}
