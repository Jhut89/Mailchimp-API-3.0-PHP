<?php

namespace MailchimpAPI;

/**
 * Class FileManagerFiles
 * @package MailchimpAPI
 */
class FileManagerFiles extends Mailchimp
{
    /**
     * @var array
     */
    public $req_post_params = [
        'name',
        'file_data'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name',
        'file_data'
    ];

    /**
     * FileManagerFiles constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->request->appendToEndpoint('/file-manager/files/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/file-manager/files/');
        }
    }
}