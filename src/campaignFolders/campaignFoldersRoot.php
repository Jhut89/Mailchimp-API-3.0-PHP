<?php

class Campaign_Folders extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name'
    ];
    public $req_patch_params = [
        'name'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .= '/campaign-folders/' . $class_input;
        } else {
            $this->url .= '/campaign-folders/';
        }
    }

}