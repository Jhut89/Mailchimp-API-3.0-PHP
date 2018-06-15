<?php

use PHPUnit\Framework\TestCase;
use Mailchimp_API\Mailchimp;

final class AuthorizedAppsTest extends TestCase
{
    protected $apikey = "123abc123abc123abc123abc123abc12-us0";
    protected $expected_base_url = 'Https://us0.api.mailchimp.com/3.0';
    protected $mailchimp;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mailchimp = new Mailchimp($this->apikey);
    }

    public function testAuthorizedAppsCollectionUrl()
    {
        $expected_url = $this->expected_base_url . "/authorized-apps/";

        $auth_apps = $this
            ->mailchimp
            ->apps();

        self::assertEquals($expected_url, $auth_apps->url, "The authorized apps url should be constructed correctly");
    }

    public function testAuthorizedAppsInstanceUrl()
    {
        $expected_url = $this->expected_base_url . "/authorized-apps/1";

        $auth_apps = $this
            ->mailchimp
            ->apps("1");

        self::assertEquals($expected_url, $auth_apps->url, "The authorized apps url should be constructed correctly");
    }
}