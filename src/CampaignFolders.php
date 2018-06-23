<?php

namespace MailchimpAPI;

class CampaignFolders extends Mailchimp
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name'
    ];
    public $req_patch_params = [
        'name'
    ];

    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/campaign-folders/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/campaign-folders/');
        }
    }

}