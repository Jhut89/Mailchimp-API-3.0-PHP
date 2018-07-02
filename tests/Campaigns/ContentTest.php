<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:28 PM
 */

namespace MailchimpTests\Campaigns;

use MailchimpAPI\Campaigns;
use MailchimpAPI\Campaigns\Content;
use MailchimpTests\MailChimpTestCase;

class ContentTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Campaigns::URL_COMPONENT . 1 . Content::URL_COMPONENT,
            $this->mailchimp->campaigns(1)->content(),
            "The Content endpoint should be constructed correctly"
        );
    }
}
