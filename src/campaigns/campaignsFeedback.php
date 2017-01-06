<?php

class Campaigns_Feedback extends Campaigns
{

    function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);
        if (isset($class_input)) {
            $this->url .= '/feedback/' . $class_input;
        } else {
            $this->url .= '/feedback/';
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

    public function POST($message)
    {
        $feedback = array('message' => $message);

        $payload = json_encode($feedback);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH($message)
    {
        $newmessage = array('message' => $message);

        $payload = json_encode($newmessage);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }
    
}