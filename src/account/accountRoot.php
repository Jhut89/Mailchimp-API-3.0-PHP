<?php

class Mailchimp_Account extends Mailchimp
{
    function __construct($apikey)
    {
        parent::__construct($apikey);
            $this->url .=  '/';
    }
}
