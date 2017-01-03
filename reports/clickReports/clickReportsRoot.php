<?php

class reports_click_reports extends reports {

    public $grandchild_resource;

    #SUBCLASS INSANTIATIONS

    public $click_members;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/click-details/' . $class_input;
        } else
        {
            $this->url .= '/click-details/';
        }
        $this->grandchild_resource = $class_input;
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

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function members( $class_input = null )
    {
        $this->click_members = new reports_click_reports_members($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->click_members;
    }

}