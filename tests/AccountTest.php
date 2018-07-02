<?php

namespace MailchimpTests;

use MailchimpAPI\Account;

final class AccountTest extends MailChimpTestCase
{
    public function testRootUrl()
    {
        $this->endpointUrlBuildTest(
            Account::URL_COMPONENT,
            $this->mailchimp->account(),
            "The root url should be constructed correctly"
        );
    }
}