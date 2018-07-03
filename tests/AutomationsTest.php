<?php

namespace MailchimpTests;

use MailchimpAPI\Automations;
use MailchimpAPI\MailchimpException;

final class AutomationsTest extends MailChimpTestCase
{
    public function testAutomationsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT,
            $this->mailchimp->automations(),
            "The automations collection url should be constructed correctly"
        );
    }

    public function testAutomationsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            Automations::URL_COMPONENT . 1,
            $this->mailchimp->automations(1),
            "The automations instance url should be constructed correctly"
        );
    }

    public function testAutomationsPauseAllWithoutId()
    {
        $error = null;
        try {
            $this->stub_mailchimp
                ->automations()
                ->pauseAll();
        } catch (MailchimpException $e) {
            $error = $e;
        }

        self::assertInstanceOf(MailchimpException::class, $error);
    }

    public function testAutomationsStartAllWithoutId()
    {
        $error = null;
        try {
            $this->stub_mailchimp
                ->automations()
                ->startAll();
        } catch (MailchimpException $e) {
            $error = $e;
        }

        self::assertInstanceOf(MailchimpException::class, $error);
    }
}
