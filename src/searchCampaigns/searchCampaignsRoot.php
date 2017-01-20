<?php

class Search_Campaigns extends Mailchimp
{
    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/search-campaigns/' . $class_input;
        } else {
            $this->url .= '/search-campaigns/';
        }
    }
}