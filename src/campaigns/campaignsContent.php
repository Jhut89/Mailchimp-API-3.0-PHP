<?php

class Campaigns_Content extends Campaigns
{
    function __construct($apikey, $parent_input)
    {
        parent::__construct($apikey, $parent_input);
        $this->url .= '/content/';
    }
}