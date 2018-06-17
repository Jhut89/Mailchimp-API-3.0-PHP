<?php

namespace Mailchimp_API\Utilities;

use Mailchimp_API\Library_Exception;
use Mailchimp_API\Utilities;

/**
 * Class MailchimpRequest
 *
 * A class for structuring a request to be sent to the MailChimp API
 *
 * @package Mailchimp_API\Utilities
 */
class MailchimpRequest
{

    private $valid_methods = ["GET", "POST", "PATCH", "PUT", "DELETE"];

    /*************************************
     * Request Components
     *************************************/

    // Authorization string for header
    private $auth;

    // Base URL for Mailchimp API
    private $base_url;

    // Complete request URI
    private $endpoint;

    // Exploded API key
    private $exp_apikey;

    // Provided API Key
    private $apikey;

    // Response from MailChimp API
    private $response;

    // HTTP Response Code
    private $http_code;

    // HTTP Method to be implemented for request
    private $method;

    // Headers to be sent with request
    private $headers = [];

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
        $this->exp_apikey = explode('-', trim($apikey));
        $this->setAuth();
        $this->setBaseUrl($this->exp_apikey[0]);
        Utilities::checkKey($this->exp_apikey);
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
    public function getHttpCode()
    {
        return $this->http_code;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
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
        return $this->valid_methods;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
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
     * @param mixed $http_code
     */
    public function setHttpCode($http_code)
    {
        $this->http_code = $http_code;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
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
        if (!in_array($method, $this->valid_methods)) {
            throw new Library_Exception("Method not allowed");
        }

        $this->method = $method;
    }

    /**
     * @param mixed $data_center
     */
    public function setBaseUrl($data_center)
    {
        $this->base_url = "Https://" . $data_center . ".api.mailchimp.com/3.0";;
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
     * @param $response
     *
     * @return mixed
     *
     * @throws Library_Exception
     */
    public function deserializeResponse($response)
    {
        $decoded = json_decode($response);

        if (!$decoded) {
            throw new Library_Exception("Unable to deserialize response");
        }

        return $decoded;

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
     *  Appends a string to this endpoint
     *
     * @param string $string
     */
    public function appendToUrl($string)
    {
        $this->endpoint = $this->endpoint .= $string;
    }

    /**
     * Returns a new MailchimpRequest
     */
    public function getInstance($apikey)
    {
        return self::__construct($apikey);
    }
}