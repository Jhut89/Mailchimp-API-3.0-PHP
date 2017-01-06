<?php

class ecommerce_stores_cart_lines extends ecommerce_store_carts {

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

	public function POST($lineid, $productid, $productvariantid, $quantity, $price)
	{
		$params = array('id' => $lineid, 
						'product_id' => $productid, 
						'product_variant_id' => $productvariantid,
						'quantity' => $quantity,
						'price' => $price
						);

		$payload = json_encode($params);
		$url =  $this->url ;

		$response = $this->curlPost($url, $payload);

        return $response;
	}

	public function GET( $query_params = null )
	{
        
		$query_string = '';

        if (is_array($query_params)) 
        {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curlGet($url);

        return $response;

	}

	public function PATCH($patch_params = array())
	{
		$payload = json_encode($patch_params);
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
	
}