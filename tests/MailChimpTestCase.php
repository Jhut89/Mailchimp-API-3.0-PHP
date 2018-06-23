<?php

namespace MailchimpTests;

use PHPUnit\Framework\TestCase;
use MailchimpAPI\Mailchimp;

class MailChimpTestCase extends TestCase
{
    protected $apikey;
    protected $mailchimp;
    protected $client_id;
    protected $redirect_uri;
    protected $request;
    protected $settings;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->apikey = "123abc123abc123abc123abc123abc12-us0";
        $this->mailchimp = new Mailchimp($this->apikey);
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
}