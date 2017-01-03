<?php

class ecommerce_stores_orders extends ecommerce_stores {

    public $grandchild_resource;

    #SUBCLASS INSTANTIATIONS
    public $lines;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/orders/' . $class_input;
        } else
        {
            $this->url .= '/orders/';
        }

        $this->grandchild_resource = $class_input;
    }

	public function POST($orderid, $customer = array(), $currency_code, $order_total, $lines, $optional_parameters = array())
    {
        $params = array("id" => $orderid,
            "customer" => $customer,
            "currency_code" => $currency_code,
            "order_total" => $order_total,
            "lines" => $lines
        );

        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
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

    public function PATCH($patch_parameters = array())
    {

        $payload = json_encode($patch_parameters);
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

    public function lines( $class_input = null )
    {
        $this->lines = new ecommerce_stores_order_lines($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->lines;
    }

}