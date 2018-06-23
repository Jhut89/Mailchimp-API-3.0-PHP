<?php

namespace MailchimpAPI\Lists\Interests_Categories;

use MailchimpAPI\Lists\InterestCategories;

/**
 * Class Interests
 * @package MailchimpAPI\Lists\Interests_Categories
 */
class Interests extends InterestCategories
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
     * Interests constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $grandparent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/interests/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/interests/');
        }
    }
}
