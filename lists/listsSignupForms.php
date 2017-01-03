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

		$response = $this->curl_post($url, $payload);

		return $response;
	}

	public function GET()
	{
        $url = $this->url;
        $response = $this->curl_get($url);

        return $response;
	}
	
} 