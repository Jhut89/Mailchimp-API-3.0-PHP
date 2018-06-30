<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/30/18
 * Time: 10:32 AM
 */

namespace MailchimpTests;


use MailchimpAPI\MailchimpException;

class CampaignsTest extends MailChimpTestCase
{
    public function testCampaignFoldersCollectionUrl()
    {
        $expected_url = $this->expectedUrl("/campaigns/");

        $resource = $this
            ->mailchimp
            ->campaigns();

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch campaign folders collection url should be constructed correctly"
        );
    }

    public function testCampaignFoldersInstanceUrl()
    {
        $expected_url = $this->expectedUrl("/campaigns/1");

        $resource = $this
            ->mailchimp
            ->campaigns(1);

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch campaign folders instance url should be constructed correctly"
        );
    }
}
