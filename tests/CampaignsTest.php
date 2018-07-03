<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/30/18
 * Time: 10:32 AM
 */

namespace MailchimpTests;


use MailchimpAPI\Campaigns;
use MailchimpAPI\MailchimpException;

class CampaignsTest extends MailChimpTestCase
{
    public function testCampaignFoldersCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT,
            $this->mailchimp->campaigns(),
            "The campaigns collection url should be constructed correctly"
        );
    }

    public function testCampaignFoldersInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT . 1,
            $this->mailchimp->campaigns(1),
            "The campaigns instance url should be constructed correctly"
        );
    }
}
