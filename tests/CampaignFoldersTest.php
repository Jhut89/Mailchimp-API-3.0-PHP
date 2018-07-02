<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/26/18
 * Time: 3:38 PM
 */

namespace MailchimpTests;


use MailchimpAPI\CampaignFolders;

class CampaignFoldersTest extends MailChimpTestCase
{
    public function testCampaignFoldersCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            CampaignFolders::URL_COMPONENT,
            $this->mailchimp->campaignFolders(),
            "The campaign folders collection url should be constructed correctly"
        );
    }

    public function testCampaignFoldersInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            CampaignFolders::URL_COMPONENT . 1,
            $this->mailchimp->campaignFolders(1),
            "The campaign folders instance url should be constructed correctly"
        );
    }
}