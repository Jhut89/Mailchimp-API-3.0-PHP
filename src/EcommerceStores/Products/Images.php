<?php

namespace MailchimpAPI\EcommerceStores\Products;

use MailchimpAPI\EcommerceStores\Products;

/**
 * Class Images
 * @package MailchimpAPI\EcommerceStores\Products
 */
class Images extends Products
{
    /**
     * @var string
     */
    private $class_input;

    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'url'
    ];

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/images/';

    /**
     * Images constructor.
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

        $this->class_input = $class_input;
    }
}
