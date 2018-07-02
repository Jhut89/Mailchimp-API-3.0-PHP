<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:18 PM
 */

namespace MailchimpTests\Automations\Emails;

use MailchimpAPI\Automations;
use MailchimpAPI\Automations\Emails;
use MailchimpAPI\Automations\Emails\Queue;
use MailchimpTests\MailChimpTestCase;

class QueueTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1 . Emails::URL_COMPONENT . 1 . Queue::URL_COMPONENT,
            $this->mailchimp->automations(1)->emails(1)->queue(),
            "The Queue collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1 . Emails::URL_COMPONENT . 1 . Queue::URL_COMPONENT . md5(1),
            $this->mailchimp->automations(1)->emails(1)->queue(1),
            "The Queue instance endpoint should be constructed correctly"
        );
    }
}
