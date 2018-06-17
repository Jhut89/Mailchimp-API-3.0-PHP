<?php

use PHPUnit\Framework\TestCase;
use Mailchimp_API\Mailchimp;

final class AutomationsTest extends TestCase
{
    protected $apikey = "123abc123abc123abc123abc123abc12-us0";
    protected $expected_base_url = 'Https://us0.api.mailchimp.com/3.0';
    protected $mailchimp;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mailchimp = new Mailchimp($this->apikey);
    }

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