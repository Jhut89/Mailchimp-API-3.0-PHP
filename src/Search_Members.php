<?php

namespace Mailchimp_API;

class Search_Members extends Mailchimp
{
    function __construct($apikey, $class_input)
    {
         parent::__construct($apikey);

        if ($class_input) {
            $this->url .= '/search-members/' . $class_input;
        } else {
            $this->url .= '/search-members/';
        }
    }
}