<?php

namespace MailchimpAPI\EcommerceStores\Carts;

use MailchimpAPI\EcommerceStores\Carts;

/**
 * Class Lines
 * @package MailchimpAPI\EcommerceStores\Carts
 */
class Lines extends Carts
{


    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'product_id',
        'product_variant_id',
        'quantity',
        'price'
    ];

    /**
     * @var string
     */
    private $parent_resource;
    /**
     * @var string
     */
    private $grandparent_resource;
    /**
     * @var string
     */
    private $class_input;

    const URL_COMPONENT = '/lines/';

    /**
     * Lines constructor.
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
        $this->apikey = $apikey;
        $this->parent_resource = $parent_resource;
        $this->grandparent_resource = $grandparent_resource;
        $this->class_input = $class_input;
    }
}
