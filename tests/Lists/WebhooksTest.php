<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:30 PM
 */

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\Webhooks;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class WebhooksTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Webhooks::URL_COMPONENT,
            $this->mailchimp->lists(1)->webhooks(),
            "The Webhooks collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Webhooks::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->webhooks(1),
            "The Webhooks instance endpoint should be constructed correctly"
        );
    }
}
