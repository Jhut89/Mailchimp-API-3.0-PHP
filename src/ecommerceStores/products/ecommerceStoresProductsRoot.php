<?php

class ecommerce_stores_porducts extends ecommerce_stores {

    public $grandchild_resource;

    #SUBCLASS INSTANTIATIONS
    public $variants;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/products/' . $class_input;
        } else
        {
            $this->url .= '/products/';
        }

        $this->grandchild_resource = $class_input;
    }

	 public function POST($productid, $title, $variants = array(), $optional_parameters = array())
    {
        $params = array("id" => $productid,
            "title" => $title,
            "variants" => $variants
        );

        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

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

    public function PATCH( $params = array() )
    {

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

    public function variants( $class_input = null )
    {
        $this->variants = new ecommerce_stores_products_variants($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->variants;
    }

}