<?php

class Ecommerce_Stores_Product_Images extends Ecommerce_Stores_Products
{
    public $class_input;

    public $req_post_prarams = [
        'id',
        'url'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {

        parent::__construct($apikey, $parent_resource, $grandparent_resource);

        if (isset($class_input)) {
            $this->url .= '/images/' . $class_input;
        } else {
            $this->url .= '/images/';
        }

        $this->class_input = $class_input;

    }
}