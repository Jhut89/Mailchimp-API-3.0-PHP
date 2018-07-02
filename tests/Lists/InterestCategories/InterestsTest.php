<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/2/18
 * Time: 5:33 PM
 */

namespace MailchimpTests\Lists\InterestCategories;

use MailchimpAPI\Lists\InterestCategories\Interest;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;
use MailchimpAPI\Lists\InterestCategories;

class InterestsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . InterestCategories::URL_COMPONENT . 1 . Interest::URL_COMPONENT,
            $this->mailchimp->lists(1)->interestCategories(1)->interests(),
            "The Interest collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . InterestCategories::URL_COMPONENT . 1 . Interest::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->interestCategories(1)->interests(1),
            "The Interest instance endpoint should be constructed correctly"
        );
    }
}
