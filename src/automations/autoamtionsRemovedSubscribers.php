<?php

class automations_removed_subscribers extends automations {

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);  
        $this->url .= '/removed-subscribers/';

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

    public function POST($emailaddress)
    {
        $params = array('email_address' => $emailaddress);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

}