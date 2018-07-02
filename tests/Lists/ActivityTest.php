<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:11 PM
 */

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\Activity;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class ActivityTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Activity::URL_COMPONENT,
            $this->mailchimp->lists(1)->activity(),
            "The MembersActivity collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Activity::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->activity(1),
            "The MembersActivity instance endpoint should be constructed correctly"
        );
    }
}
