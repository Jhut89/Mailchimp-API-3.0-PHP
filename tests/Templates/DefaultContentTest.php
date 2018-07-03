<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 3:44 PM
 */

namespace MailchimpTests\Templates;

use MailchimpAPI\Templates\DefaultContent;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Templates;

/**
 * Class DefaultContentTest
 * @package MailchimpTests\Templates
 */
class DefaultContentTest extends MailChimpTestCase
{
    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Templates::URL_COMPONENT . 1 . DefaultContent::URL_COMPONENT,
            $this->mailchimp->templates(1)->defaultContent(),
            "The Default Content collection endpoint should be constructed correctly"
        );
    }

    /**
     * @throws \MailchimpAPI\MailchimpException
     */
    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Templates::URL_COMPONENT . 1 . DefaultContent::URL_COMPONENT . 1,
            $this->mailchimp->templates(1)->defaultContent(1),
            "The Default Content instance endpoint should be constructed correctly"
        );
    }
}
