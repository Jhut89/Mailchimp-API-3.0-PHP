<?php


namespace MailchimpAPI\Responses;


class FailureResponse extends MailchimpResponse
{
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