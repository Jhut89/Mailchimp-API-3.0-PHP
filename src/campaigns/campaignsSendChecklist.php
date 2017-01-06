<?php

class Campaigns_Send_Checklist extends Campaigns
{

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey, $class_input);
        $this->url .= '/send-checklist/';
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
}
