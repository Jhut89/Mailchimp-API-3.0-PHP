<?php

namespace Mailchimp_API\Automations\Emails;

class Queue extends Emails
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'email_address'
    ];

    function __construct($apikey, $parent_reference, $grandchild_resource, $member)
    {
        parent::__construct($apikey, $parent_reference, $grandchild_resource);
        if (isset($member)) {
            $this->url .= '/queue/' . md5(strtolower($member));
        } else {
            $this->url .= '/queue/';
        }
    }
}