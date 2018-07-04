<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 7/3/18
 * Time: 8:29 PM
 */

namespace MailchimpTests\UtilityTests;

use MailchimpAPI\Utilities\MailchimpConnection;
use MailchimpAPI\Utilities\MailchimpRequest;
use MailchimpAPI\Utilities\MailchimpSettings;
use MailchimpTests\MailChimpTestCase;

final class MailchimpConnectionTest extends MailChimpTestCase
{
    protected $settings;
    protected $request;

    const HEADER_STRING = "Foo: Bar";

    private static $post_params = [
        "email_address" => "example@domain.com",
        "merge_fields" => [
            "FNAME" => "Jane"
        ]
    ];

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);


        $this->settings = new MailchimpSettings();
        $this->request = new MailchimpRequest();
        $this->request->setBaseUrl('http://some.domain.com');
        $this->request->addHeader(self::HEADER_STRING);
    }

    public function testGetConnection()
    {

        $expected_url = $this->request->getBaseUrl() . "?foo=bar&bim=baz";

        $request = $this->request;
        $request->setQueryString([
            "foo" => "bar",
            "bim" => "baz"
        ]);


        $connection = new MailchimpConnection($this->request);

        //Begin Assertions
        self::assertEquals(
            $expected_url,
            $connection->getCurrentOption(CURLOPT_URL),
            "The get URL should be constructed correctly with params"
        );

        self::assertEquals(
            self::HEADER_STRING,
            $connection->getCurrentOption(CURLOPT_HTTPHEADER)[0],
            "The headers for a get request should be set"
        );
    }

    public function testPostConnection()
    {
        $request = $this->request;
        $request->setMethod(MailchimpRequest::POST);
        $request->setPayload(self::$post_params);

        $connection = new MailchimpConnection($this->request);

        //Begin Assertions
        self::assertTrue($connection->getCurrentOption(CURLOPT_POST));

        self::assertEquals(
            '{"email_address":"example@domain.com","merge_fields":{"FNAME":"Jane"}}',
            $connection->getCurrentOption(CURLOPT_POSTFIELDS),
            "The post fields should be properly constructed json object"
        );
    }

    public function testPatchConnection()
    {
        $request = $this->request;
        $request->setMethod(MailchimpRequest::PATCH);
        $request->setPayload(self::$post_params);

        $connection = new MailchimpConnection($this->request);

        //Begin Assertions
        self::assertEquals(
            MailchimpRequest::PATCH,
            $connection->getCurrentOption(CURLOPT_CUSTOMREQUEST),
            "The custom request option should be set to PATCH"
        );

        self::assertEquals(
            '{"email_address":"example@domain.com","merge_fields":{"FNAME":"Jane"}}',
            $connection->getCurrentOption(CURLOPT_POSTFIELDS),
            "The post fields should be properly constructed json object"
        );
    }

    public function testPutConnection()
    {
        $request = $this->request;
        $request->setMethod(MailchimpRequest::PUT);
        $request->setPayload(self::$post_params);

        $connection = new MailchimpConnection($this->request);

        //Begin Assertions
        self::assertEquals(
            MailchimpRequest::PUT,
            $connection->getCurrentOption(CURLOPT_CUSTOMREQUEST),
            "The custom request option should be set to PUT"
        );

        self::assertEquals(
            '{"email_address":"example@domain.com","merge_fields":{"FNAME":"Jane"}}',
            $connection->getCurrentOption(CURLOPT_POSTFIELDS),
            "The post fields should be properly constructed json object"
        );
    }

    public function testDeleteConnection()
    {
        $request = $this->request;
        $request->setMethod(MailchimpRequest::DELETE);

        $connection = new MailchimpConnection($this->request);

        //Begin Assertions
        self::assertEquals(
            MailchimpRequest::DELETE,
            $connection->getCurrentOption(CURLOPT_CUSTOMREQUEST),
            "The custom request option should be set to DELETE"
        );
    }
}
