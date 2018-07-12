<?php

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\OpenDetails;
use MailchimpTests\MailChimpTestCase;

class OpenDetailsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . OpenDetails::URL_COMPONENT,
            $this->mailchimp->reports(1)->openDetails(),
            "The Open Details collection endpoint should be constructed correctly"
        );
    }
}
