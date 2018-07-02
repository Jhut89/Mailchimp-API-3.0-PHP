<?php

namespace MailchimpTests;

use MailchimpAPI\SearchMembers;

class SearchMembersTest extends MailChimpTestCase
{
    public function testSearchMembersCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            SearchMembers::URL_COMPONENT,
            $this->mailchimp->searchMembers(),
            "The Search SegmentsMembers collection endpoint should be constructed correctly"
        );
    }

    public function testSearchMembersInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            SearchMembers::URL_COMPONENT . 1,
            $this->mailchimp->searchMembers(1),
            "The Search SegmentsMembers instance endpoint should be constructed correctly"
        );
    }
}
