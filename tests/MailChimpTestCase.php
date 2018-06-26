<?php

namespace MailchimpTests;

use MailchimpAPI\Utilities\MailchimpConnection;
use PHPUnit\Framework\TestCase;
use MailchimpAPI\Mailchimp;

/**
 * Class MailChimpTestCase
 * @package MailchimpTests
 */
class MailChimpTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $apikey;
    /**
     * @var Mailchimp
     */
    protected $mailchimp;
    /**
     * @var StubbableMailchimp
     */
    protected $stubable_mailchimp;
    /**
     * @var string
     */
    protected $client_id;
    /**
     * @var string
     */
    protected $redirect_uri;
    /**
     * @var \MailchimpAPI\Utilities\MailchimpRequest
     */
    protected $request;
    /**
     * @var \MailchimpAPI\Utilities\MailchimpSettings
     */
    protected $settings;

    /**
     * MailChimpTestCase constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->apikey = "123abc123abc123abc123abc123abc12-us0";
        $this->mailchimp = new Mailchimp($this->apikey);
        $this->stubable_mailchimp = $this->getStubableMailchimp();
        $this->client_id =   '12345676543';
        $this->redirect_uri =  'https://www.some-domain.com/callback_file.php';
        $this->request = $this->mailchimp->request;
        $this->settings = $this->mailchimp->settings;
    }

    /**
     * @return string
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * @param $endpoint
     * @return string
     */
    public function expectedUrl($endpoint)
    {
        return $this->request->getBaseUrl() . $endpoint;
    }

    /**
     * @return StubbableMailchimp
     * @throws \MailchimpAPI\MailchimpException
     */
    public function getStubableMailchimp()
    {
        $mockConnection = $this->createMock(MailchimpConnection::class);
        $mockConnection
            ->method("execute")
            ->willReturn("not a response");
        return new StubbableMailchimp($this->apikey, $mockConnection);
    }
}