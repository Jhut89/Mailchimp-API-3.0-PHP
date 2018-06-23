<?php

use MailchimpAPI\Utilities\MailchimpRequest;
use MailchimpTests\MailChimpTestCase;

final class MailchimpRequestTest extends MailChimpTestCase
{
    private $requestInstance;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->requestInstance = new MailchimpRequest($this->apikey);
    }

    public function testAuthHeadersSet()
    {
        $expected = 'Authorization: apikey ' . $this->apikey;
        $actual = $this->requestInstance->getHeaders()[0];

        self::assertEquals($expected, $actual, "Auth Header should be appropriately set");
    }

    public function testApikeySet()
    {
        self::assertEquals(
            $this->apikey,
            $this->requestInstance->getApikey(),
            "The request API Key should be set correctly"
        );
    }

    public function testBaseUrlSet()
    {
        $expected = "Https://" . explode('-', trim($this->apikey))[1] . ".api.mailchimp.com/3.0";
        $actual = $this->requestInstance->getBaseUrl();

        self::assertEquals($expected, $actual, "Base Url should be appropriately set");
    }

    //TODO implement more test for this class
}
