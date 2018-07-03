<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 4:48 PM
 */

namespace MailchimpTests\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Products;
use MailchimpTests\MailChimpTestCase;

class ProductsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->products(),
            "The Products collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->products(1),
            "The Products instance endpoint should be constructed correctly"
        );
    }
}
