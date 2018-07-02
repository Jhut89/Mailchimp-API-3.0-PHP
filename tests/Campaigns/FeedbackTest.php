<?php

namespace MailchimpTests\Campaigns;

use MailchimpAPI\Campaigns;
use MailchimpAPI\Campaigns\Feedback;
use MailchimpTests\MailChimpTestCase;


class FeedbackTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT . 1 . Feedback::URL_COMPONENT,
            $this->mailchimp->campaigns(1)->feedback(),
            "The Feedback collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT . 1 . Feedback::URL_COMPONENT . 1,
            $this->mailchimp->campaigns(1)->feedback(1),
            "The Feedback instance endpoint should be constructed correctly"
        );
    }
}
