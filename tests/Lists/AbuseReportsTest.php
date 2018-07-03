<?php

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists;
use MailchimpAPI\Lists\AbuseReports;
use MailchimpTests\MailChimpTestCase;

class AbuseReportsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . AbuseReports::URL_COMPONENT,
            $this->mailchimp->lists(1)->abuseReports(),
            "The Abuse Reports collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . AbuseReports::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->abuseReports(1),
            "The Abuse Reports instance endpoint should be constructed correctly"
        );
    }
}
