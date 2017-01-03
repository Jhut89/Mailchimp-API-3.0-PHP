<?php

class lists_interests_categories_interest extends lists_interest_categories {

    function __construct($apikey, $parent_resource, $grandparent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if(isset($class_input))
        {
            $this->url .= '/interests/' . $class_input;
        } else 
        {
            $this->url .= '/interests/';
        }

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

    public function POST($name)
    {
        $params = array('name' => $name);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

    public function PATCH($name)
    {
        $params = array('name' => $name);

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
	
}