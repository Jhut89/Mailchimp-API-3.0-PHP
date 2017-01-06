<?php

class Automations_Removed_Subscribers extends Automations
{

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);  
        $this->url .= '/removed-subscribers/';

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

    public function POST($emailaddress)
    {
        $params = array('email_address' => $emailaddress);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

}