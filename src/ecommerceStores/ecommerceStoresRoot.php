<?php

class Ecommerce_Stores extends Mailchimp
{

    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    public $customers;
    public $products;
    public $orders;
    public $carts;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/ecommerce/stores/' . $class_input;;
        } else {
            $this->url .= '/ecommerce/stores/';
        }
        
        $this->subclass_resource = $class_input;
    }

    public function GET( $query_params = null )
    {
        $query_string = '';

        if (is_array($query_params)) {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curlGet($url);

        return $response;
    }

    public function POST($storeid,
        $listid,
        $name,
        $currencycode,
        $optional_parameters = array()
    ) {

        $required_params = array('id' => $storeid,
            'list_id' => $listid,
            'name' => $name,
            'currency_code' => $currencycode
        );

        $params = array_merge($required_params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH($update_params = array())
    {

        $params = $update_params;

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
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