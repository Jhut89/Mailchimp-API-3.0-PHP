<?php

class Template_Folders extends Mailchimp
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name'
    ];
    public $req_patch_prarams = [
        'name'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/template-folders/' . $class_input;
        } else {
            $this->url .= '/template-folders/';
        }
    }
}