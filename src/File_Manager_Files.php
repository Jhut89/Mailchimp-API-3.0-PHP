<?php

namespace MailchimpAPI;

class File_Manager_Files extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name',
        'file_data'
    ];
    public $req_patch_params = [
        'name',
        'file_data'
    ];

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->url .= '/file-manager/files/' . $class_input;
        } else {
            $this->url .= '/file-manager/files/';
        }
    }
}