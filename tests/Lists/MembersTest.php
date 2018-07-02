<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:22 PM
 */

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\Members;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class MembersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT,
            $this->mailchimp->lists(1)->members(),
            "The SegmentsMembers collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->members(1),
            "The SegmentsMembers instance endpoint should be constructed correctly"
        );
    }
}
