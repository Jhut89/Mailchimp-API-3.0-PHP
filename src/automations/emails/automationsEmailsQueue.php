<?php

class Automations_Email_Queue extends Automations_Emails
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
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