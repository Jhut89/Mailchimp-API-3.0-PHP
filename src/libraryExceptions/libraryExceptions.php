<?php

class Library_Exception extends Exception
{
    public $message;
    public $output;

    function __construct($message, $output = null)
    {
        $this->message = $message;
        $this->output = $output;
    }
}