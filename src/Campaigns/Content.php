<?php

namespace Mailchimp_API\Campaigns;

use Mailchimp_API\Campaigns;

class Content extends Campaigns
{
    function __construct($apikey, $parent_input)
    {
        parent::__construct($apikey, $parent_input);
        $this->url .= '/content/';
    }
}