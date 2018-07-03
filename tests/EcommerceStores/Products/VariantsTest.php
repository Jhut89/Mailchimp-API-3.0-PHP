<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:05 PM
 */

namespace MailchimpTests\EcommerceStores\Products;

use MailchimpAPI\EcommerceStores\Products\Variants;
use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Products;
use MailchimpTests\MailChimpTestCase;

class VariantsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT . 1 . Variants::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->products(1)->variants(),
            "The Variants collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT . 1 . Variants::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->products(1)->variants(1),
            "The Variants instance endpoint should be constructed correctly"
        );
    }
}
