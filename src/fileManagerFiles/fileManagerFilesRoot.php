<?php

class File_Manager_Files extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name',
        'file_data'
    ];
    public $req_patch_prarams = [
        'name',
        'file_data'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/file-manager/files/' . $class_input;
        } else {
            $this->url .= '/file-manager/files/';
        }
    }
}