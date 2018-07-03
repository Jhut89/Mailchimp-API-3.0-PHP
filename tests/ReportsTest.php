<?php

namespace MailchimpTests;

use MailchimpAPI\Reports;

class ReportsTest extends MailChimpTestCase
{
    public function testReportsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT,
            $this->mailchimp->reports(),
            "The Reports collection endpoint should be constructed correctly"
        );
    }

    public function testReportsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1,
            $this->mailchimp->reports(1),
            "The Reports instance endpoint should be constructed correctly"
        );
    }
}
