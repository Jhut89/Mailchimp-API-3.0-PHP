<?php

class lists_growth_history extends lists {

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/growth-history/' . $class_input;
        } else
        {
            $this->url .= '/growth-history/';
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