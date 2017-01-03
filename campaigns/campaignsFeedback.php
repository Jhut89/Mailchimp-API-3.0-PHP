<?php

class campaigns_feedback extends campaigns {

    function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);
        if (isset($class_input))
        {
            $this->url .= '/feedback/' . $class_input;
        } else 
        {
            $this->url .= '/feedback/';
        }

    }


	 public function GET( $query_params = null )
    {
        $query_string = '';

        if (is_array($query_params)) 
        {
            $query_string = $this->construct_query_params($query_params);
        }

        $url = $this->url;
        $response = $this->curl_get($url);

        return $response;
    }

    public function POST($message)
    {
        $feedback = array('message' => $message);

        $payload = json_encode($feedback);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

    public function PATCH($message)
    {
        $newmessage = array('message' => $message);

        $payload = json_encode($newmessage);
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