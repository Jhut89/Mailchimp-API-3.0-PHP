<?php


namespace MailchimpAPI\Responses;


use MailchimpAPI\MailchimpException;

/**
 * Class FailureResponse
 * @package MailchimpAPI\Responses
 */
class FailureResponse extends MailchimpResponse
{
    /**
     * FailureResponse constructor.
     * @param $headers
     * @param $body
     * @param $http_code
     * @param callable|null $failure_callback
     */
    public function __construct($headers, $body, $http_code, callable $failure_callback = null)
    {
        parent::__construct($headers, $body, $http_code);

        if ($failure_callback) {
            call_user_func($failure_callback);
        }
    }
}
