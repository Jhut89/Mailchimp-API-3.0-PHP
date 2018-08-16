<?php

namespace MailchimpAPI\Requests;

use MailchimpAPI\MailchimpException;

/**
 * Class MailchimpRequest
 *
 * A class for structuring a request for
 * and MailChimp API
 *
 * @package Mailchimp_API\Utilities
 */
class MailchimpRequest
{
    /**
     * GET
     */
    const GET = "GET";

    /**
     * POST
     */
    const POST = "POST";

    /**
     * PUT
     */
    const PUT = "PUT";

    /**
     * PATCH
     */
    const PATCH = "PATCH";

    /**
     * DELETE
     */
    const DELETE = "DELETE";

    /**
     * @var array
     */
    private static $valid_methods = [self::GET, self::POST, self::PATCH, self::PUT, self::DELETE];

    /*************************************
     * Request Components
     *************************************/

    /**
     * @var string
     */
    private $base_url;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var string
     */
    private $query_string;


    /**
     * @var array
     */
    private $exp_apikey;

    /**
     * @var null
     */
    private $apikey;

    /**
     * @var array
     */
    private $payload;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $headers;

    /**
     * MailchimpRequest constructor.
     * @param $apikey
     * @throws MailchimpException
     */
    public function __construct($apikey = null)
    {
        if (!$apikey) {
            return;
        }

        $this->apikey = $apikey;
        $this->exp_apikey = explode('-', trim($apikey));
        $this->setAuth();
        $this->checkKey($this->exp_apikey);
        $data_center = $this->exp_apikey[1];

        $this->setBaseUrl("Https://" . $data_center . ".api.mailchimp.com/3.0");
    }

    /*************************************
     * GETTERS
     *************************************/

    /**
     * @return mixed
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return mixed
     */
    public function getExpApikey()
    {
        return $this->exp_apikey;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->base_url;
    }

    /**
     * @return array
     */
    public function getValidMethods()
    {
        return self::$valid_methods;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Gets the entire request URI
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->base_url . $this->endpoint . $this->query_string;
    }

    /*************************************
     * SETTERS
     *************************************/

    /**
     * @param mixed $apikey
     */
    public function setApikey($apikey)
    {
        $this->apikey = $apikey;
    }

    /**
     * Sets the Authorization header for this request
     */
    public function setAuth()
    {
        if (!is_array($this->headers)) {
            $this->setHeaders([]);
        }
        array_push($this->headers, 'Authorization: apikey ' . $this->apikey);
    }

    /**
     * @param mixed $payload
     *
     * @throws MailchimpException when cant serialize payload
     */
    public function setPayload($payload)
    {
        $payload = $this->serializePayload($payload);
        $this->payload = $payload;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param mixed $method
     *
     * @throws MailchimpException
     */
    public function setMethod($method)
    {
        if (!in_array($method, self::$valid_methods)) {
            throw new MailchimpException("Method not allowed");
        }

        $this->method = $method;
    }

    /**
     * @param mixed $base_url
     */
    public function setBaseUrl($base_url)
    {
        $this->base_url = $base_url;
    }

    /**
     * @param array $query_array
     */
    public function setQueryString($query_array)
    {
        $this->query_string = $this->constructQueryParams($query_array);
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /*************************************
     * Helpers
     *************************************/

    /**
     * @param $payload
     *
     * @return mixed
     *
     * @throws MailchimpException
     */
    public function serializePayload($payload)
    {
        $encoded = json_encode($payload);

        if (!$encoded) {
            throw new MailchimpException("Unable to serialize payload");
        }

        return $encoded;
    }

    /**
     * Construct a query string from an array
     *
     * @param array $query_input
     *
     * @return string
     */
    public function constructQueryParams($query_input)
    {
        $query_string = '?';
        foreach ($query_input as $parameter => $value) {
            $encoded_value = urlencode($value);
            $query_string .= $parameter . '=' . $encoded_value . '&';
        }
        $query_string = trim($query_string, '&');
        return $query_string;
    }

    /**
     * Adds a new header
     *
     * @param string $header_string
     */
    public function addHeader($header_string)
    {
        if (!is_array($this->headers)) {
            $this->headers = [];
        }
        array_push($this->headers, $header_string);
    }

    /**
     * @param string $string
     */
    public function appendToEndpoint($string)
    {
        $this->endpoint = $this->endpoint .= $string;
    }

    /**
     * @param $exp_apikey
     * @throws MailchimpException
     */
    public function checkKey($exp_apikey)
    {

        if (strlen($exp_apikey[0]) < 10) {
            throw new MailchimpException('You must provide a valid API key');
        }

        if (!isset($exp_apikey[1])) {
            throw new MailchimpException(
                'You must provided the data-center at the end of your API key'
            );
        }
    }

    /**
     * Returns a new request using the same APIkey
     * @throws MailchimpException
     */
    public function reset()
    {
        $apikey = $this->apikey;
        $request_vars = get_object_vars($this);
        foreach ($request_vars as $key => $value) {
            $this->$key = null;
        }
        self::__construct($apikey);
    }
}
