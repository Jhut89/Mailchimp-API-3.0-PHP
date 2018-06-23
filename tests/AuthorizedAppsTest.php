<?php

namespace MailchimpTests;

final class AuthorizedAppsTest extends MailChimpTestCase
{


    public function testAuthorizedAppsCollectionUrl()
    {
        $expected_url = $this->request->getBaseUrl() . "/authorized-apps/";

        $auth_apps = $this
            ->mailchimp
            ->apps();

        self::assertEquals(
            $expected_url,
            $auth_apps->request->getUrl(),
            "The authorized apps url should be constructed correctly"
        );
    }

    public function testAuthorizedAppsInstanceUrl()
    {
        $expected_url = $this->request->getBaseUrl() . "/authorized-apps/1";

        $auth_apps = $this
            ->mailchimp
            ->apps("1");

        self::assertEquals(
            $expected_url,
            $auth_apps->request->getUrl(),
            "The authorized apps url should be constructed correctly"
        );
    }
}