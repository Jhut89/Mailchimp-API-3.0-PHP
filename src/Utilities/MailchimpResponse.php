<?php

namespace Mailchimp_API\Utilities;

use Mailchimp_API\Library_Exception;

class MailchimpResponse
{
    // The head of the response document
    private $head;

    // The headers received as an array of key value pairs
    private $headers = [];

    // raw response
    private $raw;

    // Response from MailChimp API
    private $response;

    // HTTP Response Code
    private $http_code;

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
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     */
    public function setHead($head)
    {
        $this->head = $head;
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
     *
     * @throws Library_Exception when cant deserialize response
     */
    public function getResponse()
    {
        return $this->deserializeResponse($this->response);
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
     * @param array $header
     */
    public function pushToHeaders($header)
    {
        $this->headers[$header[0]] = trim($header[1]);
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param mixed $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }
}