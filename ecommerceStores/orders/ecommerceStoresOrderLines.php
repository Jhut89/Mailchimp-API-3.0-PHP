<?php

class ecommerce_stores_order_lines extends ecommerce_stores_orders {

    function __construct($apikey, $parent_resource, $grandparent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if(isset($class_input))
        {
            $this->url .= '/lines/' . $class_input;
        } else 
        {
            $this->url .= '/lines/';
        }

    }

	public function POST($lineid, $productid, $product_varientid, $quantity, $price)
    {
        $params = array("id" => $lineid,
            "product_id" => $productid,
            "product_variant_id" => $product_varientid,
            "quantity" => $quantity,
            "price" => $price
        );

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
	
}