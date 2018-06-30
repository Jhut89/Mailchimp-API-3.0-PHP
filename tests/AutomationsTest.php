<?php

namespace MailchimpTests;

use MailchimpAPI\MailchimpException;

final class AutomationsTest extends MailChimpTestCase
{
    public function testAutomationsCollectionUrl()
    {
        $expected_url = $this->request->getBaseUrl() . "/automations/";

        try {
            $mc = $this
                ->mailchimp
                ->automations();
        } catch (\Exception $e) {
            self::fail("An Exception was thrown");
        }

        self::assertEquals(
            $expected_url,
            $mc->request->getUrl(),
            "The automations collection url should be constructed correctly"
        );
    }

    public function testAutomationsInstanceUrl()
    {
        $expected_url = $this->request->getBaseUrl() . "/automations/1";

        $mc = $this
            ->mailchimp
            ->automations(1);

        self::assertEquals(
            $expected_url,
            $mc->request->getUrl(),
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
