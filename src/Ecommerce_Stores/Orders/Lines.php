<?php

namespace Mailchimp_API\Ecommerce_Stores\Orders;

use Mailchimp_API\Ecommerce_Stores\Orders;

class Lines extends Orders
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
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

        if ($class_input) {
            $this->url .= '/lines/' . $class_input;
        } else {
            $this->url .= '/lines/';
        }

    }
}