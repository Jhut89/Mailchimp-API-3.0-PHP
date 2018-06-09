<?php

namespace Mailchimp_API\Ecommerce_Stores\Products;

use Mailchimp_API\Ecommerce_Stores\Products;

class Images extends Products
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