<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 4:59 PM
 */

namespace MailchimpTests\EcommerceStores\Products;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Products;
use MailchimpAPI\EcommerceStores\Products\Images;
use MailchimpTests\MailChimpTestCase;


class ImagesTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT . 1 . Images::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->products(1)->images(),
            "The Images collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Products::URL_COMPONENT . 1 . Images::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->products(1)->images(1),
            "The Images instance endpoint should be constructed correctly"
        );
    }
}
