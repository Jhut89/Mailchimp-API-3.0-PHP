<?php

 class search_members extends mailchimp {

 	function __construct($apikey, $class_input)
	{
	    parent::__construct($apikey);

	    if (isset($class_input))
	    {
	        $this->url .= '/search-members/' . $class_input;;
	    } else
	    {
	        $this->url .= '/search-members/';
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