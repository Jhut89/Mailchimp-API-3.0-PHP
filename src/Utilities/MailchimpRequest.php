<?php

namespace Mailchimp_API\Utilities;

use Mailchimp_API\Library_Exception;
use Mailchimp_API\Utilities;

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
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const PATCH = "PATCH";
    const DELETE = "DELETE";

    private static $valid_methods = [self::GET, self::POST, self::PATCH, self::PUT, self::DELETE];

    /*************************************
     * Request Components
     *************************************/

    // Authorization string for header
    private $auth;

    // Base URL for Mailchimp API
    private $base_url;

    // String representation of the resource we want to reach
    private $endpoint = "";

    // Query string for this request
    private $query_string;

    // Exploded API key
    private $exp_apikey;

    // Provided API Key
    private $apikey;

    // The payload being sent to MailChimp
    private $payload = [];

    // HTTP Method to be implemented for request
    private $method;

    // Headers to be sent with request
    private $headers = [];

    /**
     * MailchimpRequest constructor.
     *
     * @param $apikey
     *
     * @throws Library_Exception
     */
    public function __construct($apikey = null)
    {
        if (!$apikey) {
            return;
        }

        $this->apikey = $apikey;
        $this->exp_apikey = explode('-', trim($apikey));
        $this->setAuth();
        Utilities::checkKey($this->exp_apikey);
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
    public function getAuth()
    {
        return $this->auth;
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
        $this->auth = 'Authorization: apikey ' . $this->apikey;
        array_push($this->headers, $this->auth);
    }

    /**
     * @param mixed $payload
     *
     * @throws Library_Exception when cant serialize payload
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
     * @throws Library_Exception
     */
    public function setMethod($method)
    {
        if (!in_array($method, self::$valid_methods)) {
            throw new Library_Exception("Method not allowed");
        }

        $this->method = $method;
    }

    /**
     * @param mixed $data_center
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

    /*************************************
     * Helpers
     *************************************/

    /**
     * @param $payload
     *
     * @return mixed
     *
     * @throws Library_Exception
     */
    public function serializePayload($payload)
    {
        $encoded = json_encode($payload);

        if (!$encoded) {
            throw new Library_Exception("Unable to serialize payload");
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
        array_push($this->headers, $header_string);
    }

    /**
     * Appends a string to this endpoint
     *
     * @param string $string
     */
    public function appendToEndpoint($string)
    {
        $this->endpoint = $this->endpoint .= $string;
    }
}