<?php

namespace Mailchimp_API\Lists;

use Mailchimp_API\Lists;

class Merge_Fields extends Lists
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name',
        'type'
    ];
    public $req_patch_params = [
        'name'
    ];

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/merge-fields/' . $class_input;
        } else {
            $this->url .= '/merge-fields/';
        }

    }
}