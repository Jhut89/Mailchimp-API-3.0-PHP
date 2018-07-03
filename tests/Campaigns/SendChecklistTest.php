<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:38 PM
 */

namespace MailchimpTests\Campaigns;

use MailchimpAPI\Campaigns;
use MailchimpAPI\Campaigns\SendChecklist;
use MailchimpTests\MailChimpTestCase;

class SendChecklistTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT . 1 . SendChecklist::URL_COMPONENT,
            $this->mailchimp->campaigns(1)->checklist(),
            "The Checklist endpoint should be constructed correctly"
        );
    }
}
