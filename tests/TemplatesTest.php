<?php

namespace MailchimpTests;

use MailchimpAPI\Templates;

class TemplatesTest extends MailChimpTestCase
{
    public function testTemplatesCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Templates::URL_COMPONENT,
            $this->mailchimp->templates(),
            "The Templates collection endpoint should be constructed correctly"
        );
    }

    public function testTemplatesInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Templates::URL_COMPONENT . 1,
            $this->mailchimp->templates(1),
            "The Templates instance endpoint should be constructed correctly"
        );
    }
}
