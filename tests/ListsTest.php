<?php

namespace MailchimpTests;

use MailchimpAPI\Lists;

class ListsTest extends MailChimpTestCase
{
    public function testListsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT,
            $this->mailchimp->lists(),
            "The Lists collection endpoint should be constructed correctly"
        );
    }

    public function testListsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1,
            $this->mailchimp->lists(1),
            "The Lists instance endpoint should be constructed correctly"
        );
    }
}
