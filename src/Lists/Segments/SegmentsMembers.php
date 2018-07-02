<?php

namespace MailchimpAPI\Lists\Segments;

use MailchimpAPI\Lists\Segments;

/**
 * Class SegmentsMembers
 * @package MailchimpAPI\Lists\Segments
 */
class SegmentsMembers extends Segments
{
    /**
     * @var array
     */
    public $req_post_params = [
        'email_address'
    ];

    const URL_COMPONENT = '/members/';

    /**
     * SegmentsMembers constructor.
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
