<?php

class reports_click_reports_members extends reports_click_reports {

    function __construct($apikey, $parent_resource, $grandparent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if(isset($class_input))
        {
            $this->url .= '/members/' . $class_input;
        } else 
        {
            $this->url .= '/members/';
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