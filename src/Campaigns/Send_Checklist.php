<?php

namespace Mailchimp_API\Campaigns;

use Mailchimp_API\Campaigns;

class Send_Checklist extends Campaigns
{
    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->url .= '/send-checklist/';
    }
}
