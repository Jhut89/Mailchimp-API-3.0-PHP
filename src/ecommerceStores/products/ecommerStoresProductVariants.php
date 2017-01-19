<?php

class Ecommerce_Stores_Products_Variants extends Ecommerce_Stores_Products {

    public $class_input;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'title'
    ];
    public $req_put_prarams = [
        'id',
        'title'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {

        parent::__construct($apikey, $parent_resource, $grandparent_resource);

        if (isset($class_input)) {
            $this->url .= '/variants/' . $class_input;
        } else {
            $this->url .= '/variants/';
        }

        $this->class_input = $class_input;

    }
}