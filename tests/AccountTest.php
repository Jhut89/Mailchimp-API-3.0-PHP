<?php

namespace MailchimpTests;

final class AccountTest extends MailChimpTestCase
{
    public function testRootUrl()
    {
        $expected_url = $this->request->getBaseUrl(). "/";
        $account = $this
            ->mailchimp
            ->account();

        self::assertEquals(
            $expected_url,
            $account->request->getUrl(),
            "The root url should be constructed correctly"
        );
    }
}