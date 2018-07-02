<?php

namespace MailchimpTests\Lists;

use MailchimpAPI\Lists\MergeFields;
use MailchimpTests\MailChimpTestCase;
use MailchimpAPI\Lists;

class MergeFieldsTest extends MailChimpTestCase
{
    public function testCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . MergeFields::URL_COMPONENT,
            $this->mailchimp->lists(1)->mergeFields(),
            "The Merge Fields collection endpoint should be constructed correctly"
        );
    }

    public function testInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Lists::URL_COMPONENT . 1 . MergeFields::URL_COMPONENT . 1,
            $this->mailchimp->lists(1)->mergeFields(1),
            "The Merge Fields instance endpoint should be constructed correctly"
        );
    }
}
