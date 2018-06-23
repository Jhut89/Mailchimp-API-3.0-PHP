<?php

namespace MailchimpAPI\Campaigns;

use MailchimpAPI\Campaigns;

class SendChecklist extends Campaigns
{
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->request->appendToEndpoint('/send-checklist/');
    }
}
