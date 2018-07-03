<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:12 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports\CampaignAdvice;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Reports;

class CampaignAdviceTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . CampaignAdvice::URL_COMPONENT,
            $this->mailchimp->reports(1)->advice(),
            "The Campaign Advice collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . CampaignAdvice::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->advice(1),
            "The Campaign Advice instance endpoint should be constructed correctly"
        );
    }
}
