<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/1/18
 * Time: 10:41 PM
 */

namespace MailchimpTests\Conversations;

use MailchimpAPI\Conversations;
use MailchimpAPI\Conversations\Messages;
use MailchimpTests\MailChimpTestCase;

/**
 * Class MessagesTest
 * @package MailchimpTests\Conversations
 */
class MessagesTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Conversations::URL_COMPONENT . 1 . Messages::URL_COMPONENT,
            $this->mailchimp->conversations(1)->messages(),
            "The Messages collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Conversations::URL_COMPONENT . 1 . Messages::URL_COMPONENT . 1,
            $this->mailchimp->conversations(1)->messages(1),
            "The Messages instance endpoint should be constructed correctly"
        );
    }
}
