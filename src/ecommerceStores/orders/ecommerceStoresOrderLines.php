<?php

class Ecommerce_Stores_Order_Lines extends Ecommerce_Stores_Orders
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'product_id',
        'product_variant_id',
        'quantity',
        'price'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);

        if (isset($class_input)) {
            $this->url .= '/lines/' . $class_input;
        } else {
            $this->url .= '/lines/';
        }

    }
}