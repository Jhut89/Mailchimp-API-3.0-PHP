<?php

class automations extends mailchimp {

	public $subclass_resource;

	//SUBCLASS INSTANTIATIONS
	public $removed_subs;
	public $emails;
	

	function __construct($apikey, $class_input = null)
	{
		parent::__construct($apikey);
		if (isset($class_input))
        {
            $this->url .=  '/automations/' . $class_input;
        } else 
        {
        	$this->url .=  '/automations/';
        }
        $this->subclass_resource = $class_input;
	}

	public function GET( $query_params = null )
	{
	    
	    $query_string = '';

        if (is_array($query_params)) 
        {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
	    $response = $this->curlGet($url);

	    return $response;
	}

	//SUBCLASS FUNCTIONS ------------------------------------------------------------
	
	public function removed_subscribers()
	{
		$this->removed_subs = new automations_removed_subscribers($this->apikey, $this->subclass_resource);
		return $this->removed_subs;
	}

	public function emails( $class_input = null )
	{
		$this->emails = new automations_emails($this->apikey, $this->subclass_resource, $class_input);
		return $this->emails;
	}

}