<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:15 PM
 */

namespace MailchimpTests\Automations;

use MailchimpAPI\Automations;
use MailchimpAPI\Automations\RemovedSubscribers;
use MailchimpTests\MailChimpTestCase;

class RemovedSubscribersTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1 . RemovedSubscribers::URL_COMPONENT,
            $this->mailchimp->automations(1)->removedSubscribers(),
            "The Removed Subscribers collection endpoint should be constructed correctly"
        );
    }
}
