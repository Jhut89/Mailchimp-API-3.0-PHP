<?php

namespace MailchimpTests;

use MailchimpAPI\SearchCampaigns;

/**
 * Class SearchCampaignsTest
 * @package MailchimpTests
 */
class SearchCampaignsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testSearchCampaignsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            SearchCampaigns::URL_COMPONENT,
            $this->mailchimp->searchCampaigns(),
            "The Search Campaigns collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testSearchCampaignsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            SearchCampaigns::URL_COMPONENT . 1,
            $this->mailchimp->searchCampaigns(1),
            "The Search Campaigns instance endpoint should be constructed correctly"
        );
    }
}
