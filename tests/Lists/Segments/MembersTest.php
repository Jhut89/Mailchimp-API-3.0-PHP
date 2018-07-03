<?php

namespace MailchimpTests\Lists\Segments;

use MailchimpAPI\Lists\Segments\Members;
use MailchimpAPI\Lists\Segments;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class MembersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Segments::URL_COMPONENT . 1 . Members::URL_COMPONENT,
            $this->mailchimp->lists(1)->segments(1)->members(),
            "The Members collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Segments::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->segments(1)->members(1),
            "The Members instance endpoint should be constructed correctly"
        );
    }
}
