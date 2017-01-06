<?php

class Search_Campaigns extends Mailchimp
{

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/search-campaigns/' . $class_input;;
        } else {
            $this->url .= '/search-campaigns/';
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

}