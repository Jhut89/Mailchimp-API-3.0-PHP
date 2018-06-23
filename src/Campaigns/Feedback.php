<?php

namespace MailchimpAPI\Campaigns;

use MailchimpAPI\Campaigns;

class Feedback extends Campaigns
{

    public $req_post_params = [
        'message'
    ];
    public $req_patch_params = [
        'message'
    ];

    public function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);
        if ($class_input) {
            $this->request->appendToEndpoint('/feedback/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/feedback/');
        }
    }
}
