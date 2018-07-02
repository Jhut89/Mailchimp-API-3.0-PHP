<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:39 PM
 */

namespace MailchimpTests\Lists\Members;

use MailchimpAPI\Lists\Members\MembersActivity;
use MailchimpAPI\Lists;
use MailchimpAPI\Lists\Members;
use MailchimpTests\MailChimpTestCase;

class ActivityTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . MembersActivity::URL_COMPONENT,
            $this->mailchimp->lists(1)->members(1)->activity(),
            "The MembersActivity collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . MembersActivity::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->members(1)->activity(1),
            "The MembersActivity instance endpoint should be constructed correctly"
        );
    }
}
