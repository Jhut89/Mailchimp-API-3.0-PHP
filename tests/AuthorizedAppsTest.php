<?php

namespace MailchimpTests;

use MailchimpAPI\AuthorizedApps;

final class AuthorizedAppsTest extends MailChimpTestCase
{


    public function testAuthorizedAppsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            AuthorizedApps::URL_COMPONENT,
            $this->mailchimp->apps(),
            "The authorized apps url should be constructed correctly"
        );
    }

    public function testAuthorizedAppsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            AuthorizedApps::URL_COMPONENT . 1,
            $this->mailchimp->apps(1),
            "The authorized apps url should be constructed correctly"
        );
    }
}