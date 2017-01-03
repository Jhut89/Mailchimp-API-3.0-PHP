<?php

class campaigns_send_checklist extends campaigns {

	function __construct($apikey, $class_input)
    {
        parent::__construct($apikey , $class_input);
        $this->url .= '/send-checklist/';
    }

	public function GET()
    {
        $url = $this->url;
        $response = $this->curl_get($url);

        return $response;
    }
	
}