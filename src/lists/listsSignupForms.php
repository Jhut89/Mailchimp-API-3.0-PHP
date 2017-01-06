<?php

class lists_signup_forms extends lists {

	function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/signup-forms/' . $class_input;
        } else
        {
            $this->url .= '/signup-forms/';
        }

    }

	public function POST($params)
	{
		$payload =  json_encode($params);
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
	
} 