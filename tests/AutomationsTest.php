<?php

use MailchimpTests\MailChimpTestCase;

final class AutomationsTest extends MailChimpTestCase
{
    public function testAutomationsCollectionUrl()
    {
        $expected_url = $this->expected_base_url . "/automations/";

        $mc = $this
            ->mailchimp
            ->automations();

        self::assertEquals($expected_url, $mc->url, "The automations collection url should be constructed correctly");
    }

    public function testAutomationsInstanceUrl()
    {
        $expected_url = $this->expected_base_url . "/automations/1";

        $mc = $this
            ->mailchimp
            ->automations(1);

        self::assertEquals($expected_url, $mc->url, "The automations instance url should be constructed correctly");
    }

//    public function testPauseAllAutomationsUrl()
//    {
//        $expected_url = $this->expected_base_url . "/automations/actions/pause-all-emails/";
//
//        $mc = $this
//            ->mailchimp
//            ->automations();
//
//
//        $mc->PAUSE_ALL();
//
//        self::assertEquals($expected_url, $mc->url, "The automations 'Pause All' url should be constructed correctly");
//    }


}