<?php

class Ecommerce_Stores_Products_Variants extends Ecommerce_Stores_Products {

    public $class_input;

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {

        parent::__construct($apikey, $parent_resource, $grandparent_resource);

        if (isset($class_input)) {
            $this->url .= '/variants/' . $class_input;
        } else {
            $this->url .= '/variants/';
        }

        $this->class_input = $class_input;

    }

    public function POST($variantid, $title, $optional_parameters = array())
    {
        $params = array("id" => $variantid,
            "title" => $title
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

        if (is_array($query_params)) {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curlGet($url);

        return $response;
    
    }

    public function PATCH($patch_parameters = array())
    {
        $payload = json_encode($patch_parameters);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function PUT($title, $optional_parameters = array())
    {
        $params = array("id" => $this->class_input,
                        "title" => $title
                       );

        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPut($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }
}