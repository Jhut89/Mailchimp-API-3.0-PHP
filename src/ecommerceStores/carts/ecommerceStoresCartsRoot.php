<?php

class Ecommerce_Store_Carts extends Ecommerce_Stores
{

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'customer',
        'currency_code',
        'order_total',
        'lines'
    ];

    //SUBCLASS INSTANTIATIONS
    public $lines;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/carts/' . $class_input;
        } else {
            $this->url .= '/carts/';
        }

        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function lines( $class_input = null )
    {
        $this->lines = new Ecommerce_Stores_Cart_Lines(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->lines;
    }

} 