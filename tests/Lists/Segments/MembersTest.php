<?php

namespace MailchimpTests\Lists\Segments;

use MailchimpAPI\Lists\Segments\SegmentsMembers;
use MailchimpAPI\Lists\Segments;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class MembersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Segments::URL_COMPONENT . 1 . SegmentsMembers::URL_COMPONENT,
            $this->mailchimp->lists(1)->segments(1)->members(),
            "The SegmentsMembers collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Segments::URL_COMPONENT . 1 . SegmentsMembers::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->segments(1)->members(1),
            "The SegmentsMembers instance endpoint should be constructed correctly"
        );
    }
}
