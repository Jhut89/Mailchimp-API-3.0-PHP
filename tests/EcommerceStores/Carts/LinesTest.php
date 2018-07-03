<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 4:53 PM
 */

namespace MailchimpTests\EcommerceStores\Carts;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Carts;
use MailchimpAPI\EcommerceStores\Carts\Lines;
use MailchimpTests\MailChimpTestCase;

/**
 * Class LinesTest
 * @package MailchimpTests\EcommerceStores\Carts
 */
class LinesTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Carts::URL_COMPONENT . 1 . Lines::URL_COMPONENT,
            $this->mailchimp->ecommStores(1)->carts(1)->lines(),
            "The Lines collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            EcommerceStores::URL_COMPONENT . 1 . Carts::URL_COMPONENT . 1 . Lines::URL_COMPONENT . 1,
            $this->mailchimp->ecommStores(1)->carts(1)->lines(1),
            "The Lines instance endpoint should be constructed correctly"
        );
    }
}
