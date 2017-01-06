<?php

class Authorized_Apps extends Mailchimp
{


    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);  
        if (isset($class_input)) {
            $this->url .=  '/authorized-apps/' . $class_input;
        } else {
            $this->url .=  '/authorized-apps/';
        }

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

    public function POST($client_id, $client_sec)
    {
        $params = array(
            'client_id' => $client_id,
            'client_secret' => $client_sec
        );

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }
    
}