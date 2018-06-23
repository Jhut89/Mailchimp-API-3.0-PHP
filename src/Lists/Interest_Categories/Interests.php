<?php

namespace MailchimpAPI\Lists\Interests_Categories;

use MailchimpAPI\Lists\Interest_Categories;

class Interests extends Interest_Categories
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name'
    ];
    public $req_patch_params = [
        'name'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->url .= '/interests/' . $class_input;
        } else {
            $this->url .= '/interests/';
        }

    }
}