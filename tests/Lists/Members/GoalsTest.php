<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:45 PM
 */

namespace MailchimpTests\Lists\Members;

use MailchimpAPI\Lists\Members\Goals;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;
use MailchimpAPI\Lists\Members;

class GoalsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . Goals::URL_COMPONENT,
            $this->mailchimp->lists(1)->members(1)->goals(),
            "The Goals collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . Goals::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->members(1)->goals(1),
            "The Goals instance endpoint should be constructed correctly"
        );
    }
}
