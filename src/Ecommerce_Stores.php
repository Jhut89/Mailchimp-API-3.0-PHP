<?php

namespace Mailchimp_API;

use Mailchimp_API\Ecommerce_Stores\Carts;
use Mailchimp_API\Ecommerce_Stores\Customers;
use Mailchimp_API\Ecommerce_Stores\Orders;
use Mailchimp_API\Ecommerce_Stores\Products;

class Ecommerce_Stores extends Mailchimp
{

    public $subclass_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
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
        $this->customers = new Customers(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->customers;
    }

    public function products( $class_input = null )
    {
        $this->products = new Products(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->products;
    }

    public function orders( $class_input = null )
    {
        $this->orders = new Orders(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->orders;
    }

    public function carts( $class_input = null )
    {
        $this->carts = new Carts(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->carts;
    }

}