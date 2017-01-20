<?php

class Ecommerce_Stores extends Mailchimp
{

    public $subclass_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'list_id',
        'name',
        'currency_code'
    ];

    //SUBCLASS INSTANTIATIONS
    public $customers;
    public $products;
    public $orders;
    public $carts;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/ecommerce/stores/' . $class_input;
        } else {
            $this->url .= '/ecommerce/stores/';
        }
        
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function customers( $class_input = null )
    {
        $this->customers = new Ecommerce_Customers(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->customers;
    }

    public function products( $class_input = null )
    {
        $this->products = new Ecommerce_Stores_Products(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->products;
    }

    public function orders( $class_input = null )
    {
        $this->orders = new Ecommerce_Stores_Orders(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->orders;
    }

    public function carts( $class_input = null )
    {
        $this->carts = new Ecommerce_Store_Carts(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->carts;
    }

}