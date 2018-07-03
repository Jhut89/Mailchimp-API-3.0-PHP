<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:15 PM
 */

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\GrowthHistory;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class GrowthHistoryTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . GrowthHistory::URL_COMPONENT,
            $this->mailchimp->lists(1)->growthHistory(),
            "The Growth History collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . GrowthHistory::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->growthHistory(1),
            "The Growth History instance endpoint should be constructed correctly"
        );
    }
}
