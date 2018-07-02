<?php

namespace MailchimpAPI\Lists\Members;

use MailchimpAPI\Lists\Members;

/**
 * Class Notes
 * @package MailchimpAPI\Lists\SegmentsMembers
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

    const URL_COMPONENT = '/notes/';

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
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
