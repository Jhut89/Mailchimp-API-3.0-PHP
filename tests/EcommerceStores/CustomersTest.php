<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 4:40 PM
 */

namespace MailchimpTests\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Customers;
use MailchimpTests\MailChimpTestCase;

class CustomersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Customers::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->customers(),
            "The Customers collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Customers::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->customers(1),
            "The Customers instance endpoint should be constructed correctly"
        );
    }
}
