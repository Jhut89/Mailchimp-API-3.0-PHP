<?php

class Ecommerce_Stores_Cart_Lines extends Ecommerce_Store_Carts
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