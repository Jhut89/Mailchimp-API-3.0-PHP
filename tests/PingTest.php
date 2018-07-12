<?php

namespace MailchimpTests;

use MailchimpAPI\Ping;

class PingTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testListsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Ping::URL_COMPONENT,
            $this->mailchimp->ping(),
            "The Ping endpoint should be constructed correctly"
        );
    }
}
