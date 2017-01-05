<?php

class authorized_apps extends mailchimp {


    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);  
        if (isset($class_input))
        {
            $this->url .=  '/authorized-apps/' . $class_input;
        } else 
        {
            $this->url .=  '/authorized-apps/';
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

    public function POST($client_id, $client_sec)
    {
        $params = array(
            'client_id' => $client_id,
            'client_secret' => $client_sec
        );

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }
    
}