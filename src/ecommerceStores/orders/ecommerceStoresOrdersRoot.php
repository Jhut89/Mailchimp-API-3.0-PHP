<?php

class Ecommerce_Stores_Orders extends Ecommerce_Stores
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
            $this->url .= '/orders/' . $class_input;
        } else {
            $this->url .= '/orders/';
        }

        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function lines( $class_input = null )
    {
        $this->lines = new Ecommerce_Stores_Order_Lines(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->lines;
    }

}