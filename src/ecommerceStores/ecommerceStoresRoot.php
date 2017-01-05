<?php

class ecommerce_stores extends mailchimp {

    public $subclass_resource;

    //SUBCLASS INSTANIATIONS
    public $customers;
    public $products;
    public $orders;
    public $carts;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input))
        {
            $this->url .= '/ecommerce/stores/' . $class_input;;
        } else
        {
            $this->url .= '/ecommerce/stores/';
        }
        
        $this->subclass_resource = $class_input;
    }

	public function GET( $query_params = null )
    {
        $query_string = '';

        if (is_array($query_params)) 
        {
            $query_string = $this->construct_query_params($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curl_get($url);

        return $response;
    }

    public function POST($storeid, $listid, $name, $currencycode, $optional_parameters = array())
    {

        $required_params = array('id' => $storeid,
            'list_id' => $listid,
            'name' => $name,
            'currency_code' => $currencycode
        );

        $params = array_merge($required_params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

    public function PATCH($update_params = array())
    {

        $params = $update_params;

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_patch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curl_delete($url);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function customers( $class_input = null )
    {
        $this->customers = new ecommerce_customers($this->apikey, $this->subclass_resource, $class_input);
        return $this->customers;
    }

    public function products( $class_input = null )
    {
        $this->products = new ecommerce_stores_porducts($this->apikey, $this->subclass_resource, $class_input);
        return $this->products;
    }

    public function orders( $class_input = null )
    {
        $this->orders = new ecommerce_stores_orders($this->apikey, $this->subclass_resource, $class_input);
        return $this->orders;
    }

    public function carts( $class_input = null )
    {
        $this->carts = new ecommerce_store_carts($this->apikey, $this->subclass_resource, $class_input);
        return $this->carts;
    }

}