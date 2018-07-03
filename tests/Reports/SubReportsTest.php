<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:30 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports\SubReports;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Reports;

/**
 * Class SubReportsTest
 * @package MailchimpTests\Reports
 */
class SubReportsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . SubReports::URL_COMPONENT,
            $this->mailchimp->reports(1)->subReports(),
            "The SubReports collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . SubReports::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->subReports(1),
            "The SubReports instance endpoint should be constructed correctly"
        );
    }
}
