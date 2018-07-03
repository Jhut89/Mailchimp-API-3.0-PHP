<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:20 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\EepurlReports;
use MailchimpTests\MailChimpTestCase;

class EepurlReportsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . EepurlReports::URL_COMPONENT,
            $this->mailchimp->reports(1)->eepurl(),
            "The Eepurl Reports collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . EepurlReports::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->eepurl(1),
            "The Eepurl Reports instance endpoint should be constructed correctly"
        );
    }
}
