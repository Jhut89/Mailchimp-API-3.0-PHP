<?php


namespace MailchimpAPI\Responses;


use MailchimpAPI\MailchimpException;

/**
 * Class SuccessResponse
 * @package MailchimpAPI\Responses
 */
class SuccessResponse extends MailchimpResponse
{
    /**
     * SuccessResponse constructor.
     * @param $headers
     * @param $body
     * @param $http_code
     * @param callable|null $success_callback
     * @throws MailchimpException
     */
    public function __construct($headers, $body, $http_code, callable $success_callback = null)
    {
        parent::__construct($headers, $body, $http_code);
        if (is_callable($success_callback)) {
            call_user_func("foo");
        } elseif ($success_callback && !is_callable($success_callback)) {
            throw new MailchimpException("The success callback is not callable");
        }
    }
}
