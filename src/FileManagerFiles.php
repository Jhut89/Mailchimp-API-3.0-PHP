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

    const URL_COMPONENT = '/file-manager/files/';

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
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
