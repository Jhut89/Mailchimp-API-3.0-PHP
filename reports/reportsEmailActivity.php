<?php

class reports_email_activity extends reports {

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/email-activity/' . $class_input;
        } else
        {
            $this->url .= '/email-activity/';
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

}