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
     * @throws MailchimpException
     */
    public function __construct($headers, $body, $http_code, callable $failure_callback = null)
    {
        parent::__construct($headers, $body, $http_code);
        if ($failure_callback && is_callable($failure_callback)) {
            call_user_func($failure_callback);
        } elseif ($failure_callback && !is_callable($failure_callback)) {
            throw new MailchimpException("The failure callback is not callable");
        }
    }
}
