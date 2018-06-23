<?php

namespace MailchimpAPI\EcommerceStores\Orders;

use MailchimpAPI\EcommerceStores\Orders;

/**
 * Class Lines
 * @package MailchimpAPI\EcommerceStores\Orders
 */
class Lines extends Orders
{

    //REQUIRED FIELDS DEFINITIONS
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

    /**
     * Lines constructor.
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
            $this->request->appendToEndpoint('/lines/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/lines/');
        }

        $this->apikey = $apikey;
        $this->parent_resource = $parent_resource;
        $this->grandparent_resource = $grandparent_resource;
        $this->class_input = $class_input;
    }
}
