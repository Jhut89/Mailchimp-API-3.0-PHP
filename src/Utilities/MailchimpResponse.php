<?php

namespace MailchimpAPI\Utilities;

use MailchimpAPI\MailchimpException;

class MailchimpResponse
{
    // The headers received as an array of key value pairs
    private $headers = [];

    // Response from MailChimp API
    private $body;

    // HTTP Response Code
    private $http_code;

    public function __construct($headers, $body, $http_code)
    {
        $this->setHeaders($headers);
        $this->setBody($body);
        $this->setHttpCode($http_code);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getHttpCode()
    {
        return $this->http_code;
    }

    /**
     * @param mixed $http_code
     */
    public function setHttpCode($http_code)
    {
        $this->http_code = $http_code;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     *
     * @throws MailchimpException when cant deserialize response
     */
     public function deserialize($to_array = false)
     {
         $decoded = json_decode($this->body, (bool) $to_array);
         if (!$decoded) {
             throw new MailchimpException("Unable to deserialize response");
         }
         return $decoded;
     }
}
