<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:07 PM
 */

namespace MailchimpTests\Automations;

use MailchimpAPI\Automations;
use MailchimpAPI\Automations\Emails;
use MailchimpTests\MailChimpTestCase;

class EmailsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1 . Emails::URL_COMPONENT,
            $this->mailchimp->automations(1)->emails(),
            "The Emails collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1 . Emails::URL_COMPONENT . 1,
            $this->mailchimp->automations(1)->emails(1),
            "The Emails instance endpoint should be constructed correctly"
        );
    }
}
