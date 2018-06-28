<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/26/18
 * Time: 3:38 PM
 */

namespace MailchimpTests;


class CampaignFoldersTest extends MailChimpTestCase
{
    public function testCampaignFoldersCollectionUrl()
    {
        $expected_url = $this->expectedUrl("/campaign-folders/");

        $resource = $this
            ->mailchimp
            ->campaignFolders();

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch campaign folders collection url should be constructed correctly"
        );
    }

    public function testCampaignFoldersInstanceUrl()
    {
        $expected_url = $this->expectedUrl("/campaign-folders/1");

        $resource = $this
            ->mailchimp
            ->campaignFolders(1);

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch campaign folders instance url should be constructed correctly"
        );
    }
}