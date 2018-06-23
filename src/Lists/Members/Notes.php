<?php

namespace MailchimpAPI\Lists\Members;

use MailchimpAPI\Lists\Members;

class Notes extends Members
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'note'
    ];
    public $req_patch_params = [
        'note'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->url .= '/notes/' . $class_input;
        } else {
            $this->url .= '/notes/';
        }

    }
}