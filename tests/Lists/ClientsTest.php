<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:13 PM
 */

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\Clients;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

/**
 * Class ClientsTest
 * @package MailchimpTests\Lists
 */
class ClientsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Clients::URL_COMPONENT,
            $this->mailchimp->lists(1)->clients(),
            "The Clients collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Clients::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->clients(1),
            "The Clients instance endpoint should be constructed correctly"
        );
    }
}
