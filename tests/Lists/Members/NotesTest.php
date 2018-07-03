<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:47 PM
 */

namespace MailchimpTests\Lists\Members;

use MailchimpAPI\Lists\Members\Notes;
use MailchimpAPI\Lists;
use MailchimpAPI\Lists\Members;
use MailchimpTests\MailChimpTestCase;

class NotesTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . Notes::URL_COMPONENT,
            $this->mailchimp->lists(1)->members(1)->notes(),
            "The Notes collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . Members::URL_COMPONENT . 1 . Notes::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->members(1)->notes(1),
            "The Notes instance endpoint should be constructed correctly"
        );
    }
}
