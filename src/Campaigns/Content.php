<?php

namespace MailchimpAPI\Campaigns;

use MailchimpAPI\Campaigns;

class Content extends Campaigns
{
    public function __construct($apikey, $parent_input)
    {
        parent::__construct($apikey, $parent_input);
        $this->request->appendToEndpoint('/content/');
    }
}