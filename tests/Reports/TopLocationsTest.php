<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:33 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports\TopLocations;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Reports;

/**
 * Class TopLocationsTest
 * @package MailchimpTests\Reports
 */
class TopLocationsTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . TopLocations::URL_COMPONENT,
            $this->mailchimp->reports(1)->locations(),
            "The Top Locations collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . TopLocations::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->locations(1),
            "The Top Locations instance endpoint should be constructed correctly"
        );
    }
}
