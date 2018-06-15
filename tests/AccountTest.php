<?php

use PHPUnit\Framework\TestCase;
use Mailchimp_API\Mailchimp;

final class AccountTest extends TestCase
{
    protected $apikey = "123abc123abc123abc123abc123abc12-us0";
    protected $expected_base_url = 'Https://us0.api.mailchimp.com/3.0';
    protected $mailchimp;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mailchimp = new Mailchimp($this->apikey);
    }

    public function testRootUrl()
    {
        $expected_url = $this->expected_base_url . "/";
        $account = $this
            ->mailchimp
            ->account();

        self::assertEquals($expected_url, $account->url, "The root url is constructed correctly");
    }
}