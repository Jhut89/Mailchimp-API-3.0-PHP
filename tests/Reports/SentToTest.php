<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:25 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\SentTo;
use MailchimpTests\MailChimpTestCase;

class SentToTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . SentTo::URL_COMPONENT,
            $this->mailchimp->reports(1)->sentTo(),
            "The Sent To collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . SentTo::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->sentTo(1),
            "The Sent To instance endpoint should be constructed correctly"
        );
    }
}
