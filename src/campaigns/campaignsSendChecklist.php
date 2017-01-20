<?php

class Campaigns_Send_Checklist extends Campaigns
{
    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->url .= '/send-checklist/';
    }
}
