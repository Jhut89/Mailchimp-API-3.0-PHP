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

/**
 * Class EepurlReportsTest
 * @package MailchimpTests\Reports
 */
class EepurlReportsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . EepurlReports::URL_COMPONENT,
            $this->mailchimp->reports(1)->eepurl(),
            "The Eepurl Reports collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . EepurlReports::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->eepurl(1),
            "The Eepurl Reports instance endpoint should be constructed correctly"
        );
    }
}
