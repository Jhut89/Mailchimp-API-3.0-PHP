<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

/**
 * Class MergeFields
 * @package MailchimpAPI\Lists
 */
class MergeFields extends Lists
{
    /**
     * @var array
     */
    public $req_post_params = [
        'name',
        'type'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name'
    ];

    const URL_COMPONENT = '/merge-fields/';

    /**
     * MergeFields constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
