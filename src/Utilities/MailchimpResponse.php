<?php

namespace MailchimpAPI\Utilities;

use MailchimpAPI\MailchimpException;

class MailchimpResponse
{
    // The head of the response document
    private $head;

    // The headers received as an array of key value pairs
    private $headers = [];

    // raw response
    private $raw;

    // MailchimpConnection
    private $connection;

    // Response from MailChimp API
    private $body;

    // HTTP Response Code
    private $http_code;

    public function __construct(MailchimpConnection $connection)
    {
        $this->connection = $connection;
    }

    public function parseRaw($raw_response)
    {
        $this->setRaw($raw_response);
        $this->http_code = $this->connection->getInfo(CURLINFO_HTTP_CODE);
        $head_len  = $this->connection->getInfo(CURLINFO_HEADER_SIZE);

        $this->setHead(substr($raw_response, 0, $head_len));
        $this->setBody(substr($raw_response, $head_len, strlen($raw_response)));
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
     * @throws MailchimpException when cant deserialize response
     */
    public function deserialize()
    {
        return $this->deserializeResponse($this->body);
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
     * @param $response
     * @return mixed
     * @throws MailchimpException
     */
    public function deserializeResponse($response)
    {
        $decoded = json_decode($response);

        if (!$decoded) {
            throw new MailchimpException("Unable to deserialize response");
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
     * Called statically during prepareHandle();
     *
     * @param $handle
     * @param $header
     * @return int
     */
    public function handleResponseHeader($handle, $header)
    {
        $header_length = strlen($header);
        $header_array = explode(':', $header, 2);
        if (count($header_array) == 2) {
            $this->pushToHeaders($header_array);
        }

        return $header_length;
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

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

}
