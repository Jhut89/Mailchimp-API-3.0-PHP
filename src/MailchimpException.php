<?php

namespace MailchimpAPI;

class MailchimpException extends \Exception
{
    public $message;
    public $output;

    public function __construct($message, $output = null)
    {
        $this->message = $message;
        $this->output = $output;
    }
}