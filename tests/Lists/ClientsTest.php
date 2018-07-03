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

class ClientsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Clients::URL_COMPONENT,
            $this->mailchimp->lists(1)->clients(),
            "The Clients collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Clients::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->clients(1),
            "The Clients instance endpoint should be constructed correctly"
        );
    }
}
