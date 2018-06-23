<?php

namespace MailchimpAPI\Lists\Members;

use MailchimpAPI\Lists\Members;

/**
 * Class Notes
 * @package MailchimpAPI\Lists\Members
 */
class Notes extends Members
{
    /**
     * @var array
     */
    public $req_post_params = [
        'note'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'note'
    ];

    /**
     * Notes constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $grandparent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/notes/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/notes/');
        }
    }
}
