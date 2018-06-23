<?php

namespace MailchimpAPI\EcommerceStores\Products;

use MailchimpAPI\EcommerceStores\Products;

class Variants extends Products {

    public $class_input;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'id',
        'title'
    ];
    public $req_put_params = [
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

        if ($class_input) {
            $this->url .= '/variants/' . $class_input;
        } else {
            $this->url .= '/variants/';
        }

        $this->class_input = $class_input;

    }
}