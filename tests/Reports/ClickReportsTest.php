<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:16 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\ClickReports;
use MailchimpTests\MailChimpTestCase;

/**
 * Class ClickReportsTest
 * @package MailchimpTests\Reports
 */
class ClickReportsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . ClickReports::URL_COMPONENT,
            $this->mailchimp->reports(1)->clickReports(),
            "The Click Reports collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . ClickReports::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->clickReports(1),
            "The Click Reports instance endpoint should be constructed correctly"
        );
    }
}
