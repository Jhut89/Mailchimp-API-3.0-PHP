<?php

class batch_operations extends mailchimp {

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if (isset($class_input))
        {
            $this->url .= '/batches/' . $class_input;
        } else 
        {
            $this->url .= '/batches/';
        }
    }

    public function POST( $operations = array() )
    {

        $params = array('operations' => $operations);

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
    
}