<?php

namespace Mailchimp_API;

class Account extends Mailchimp
{
    function __construct($apikey)
    {
        parent::__construct($apikey);
            $this->url .=  '/';
    }
}
