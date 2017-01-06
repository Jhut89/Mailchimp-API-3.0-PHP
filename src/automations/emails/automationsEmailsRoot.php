<?php

class automations_emails extends automations {

    public $grandchild_resource;

    //SUBCLASS INSTANTIATIONS
    public $queue;

    function __construct($apikey, $parent_reference, $class_input)
    {

        parent::__construct($apikey, $parent_reference);  
        if (isset($class_input))
        {
            $this->url .= '/emails/' . $class_input;
        } else 
        {
            $this->url .= '/emails/';
        }
        $this->grandchild_resource = $class_input;

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

    // PAUSE AND START FUNCTIONS
    // exemptions needed here for attempting to pause emails without providing email_id

    public function PAUSE()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/pause';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function START()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/start';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function queue( $member = null )
    {
        $this->queue = new automations_email_queue($this->apikey, $this->subclass_resource, $this->grandchild_resource, $member);
        return $this->queue;
    }
    
}