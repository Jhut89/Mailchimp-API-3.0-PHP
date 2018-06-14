<?php

use PHPUnit\Framework\TestCase;
use Mailchimp_API\Mailchimp;

final class MailchimpTest extends TestCase
{
    protected $apikey;
    protected $mailchimp;
    protected $client_id;
    protected $redirect_uri;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->apikey = "123abc123abc123abc123abc123abc12-us0";
        $this->mailchimp = new Mailchimp($this->apikey);
        $this->client_id =   '12345676543';
        $this->redirect_uri =  'https://www.some-domain.com/callback_file.php';
    }

    public function testAuthKeysSet()
    {
        $expected_auth_string = "Authorization: apikey " . $this->apikey;
        $mc = $this->mailchimp;

        //ASSERTIONS
        self::assertEquals($this->apikey, $mc->apikey, "The apikey must  be set on the parent mailchimp class");
        self::assertEquals($expected_auth_string, $mc->auth[0], "The auth string must be correctly set");

    }


    public function testBaseUrlSet()
    {
        $expected_base_url = "Https://us0.api.mailchimp.com/3.0";
        $mc = $this->mailchimp;

        //ASSERTIONS
        self::assertEquals($expected_base_url, $mc->url, "The api base URL must be correctly constructed");
    }

    public function testGetAuthUrl()
    {
        $mc = $this->mailchimp;
        $url = $mc::getAuthUrl($this->client_id, $this->redirect_uri);

        $expected_uri = "https://login.mailchimp.com/oauth2/authorize";
        $expected_uri .= "?client_id=12345676543";
        $expected_uri .= "&redirect_uri=".urlencode($this->redirect_uri);
        $expected_uri .= "&response_type=code";

        //ASSERTION
        $this->assertEquals($expected_uri, $url, "oAuth URI should be correctly constructed");

    }
}