<?php

namespace MailchimpTests;

use MailchimpAPI\SearchMembers;

/**
 * Class SearchMembersTest
 * @package MailchimpTests
 */
class SearchMembersTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testSearchMembersCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            SearchMembers::URL_COMPONENT,
            $this->mailchimp->searchMembers(),
            "The Search Members collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testSearchMembersInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            SearchMembers::URL_COMPONENT . 1,
            $this->mailchimp->searchMembers(1),
            "The Search Members instance endpoint should be constructed correctly"
        );
    }
}
