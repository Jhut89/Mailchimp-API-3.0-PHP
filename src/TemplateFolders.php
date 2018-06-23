<?php

namespace MailchimpAPI;

/**
 * Class TemplateFolders
 * @package MailchimpAPI
 */
class TemplateFolders extends Mailchimp
{
    /**
     * @var array
     */
    public $req_post_params = [
        'name'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name'
    ];

    /**
     * TemplateFolders constructor.
     * @param $apikey
     * @param $class_input
     * @throws Library_Exception
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->request->appendToEndpoint('/template-folders/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/template-folders/');
        }
    }
}
