<?php

namespace Mailchimp_API;

class Template_Folders extends Mailchimp
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name'
    ];
    public $req_patch_params = [
        'name'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->url .= '/template-folders/' . $class_input;
        } else {
            $this->url .= '/template-folders/';
        }
    }
}