<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:37 PM
 */

namespace MailchimpTests\Reports;

use MailchimpAPI\Reports\Unsubscribes;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Reports;

class UnsubscribesTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . Unsubscribes::URL_COMPONENT,
            $this->mailchimp->reports(1)->unsubscribes(),
            "The Unsubscribes collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Reports::URL_COMPONENT . 1 . Unsubscribes::URL_COMPONENT . 1,
            $this->mailchimp->reports(1)->unsubscribes(1),
            "The Unsubscribes instance endpoint should be constructed correctly"
        );
    }
}
