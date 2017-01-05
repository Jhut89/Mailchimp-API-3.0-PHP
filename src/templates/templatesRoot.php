<?php

class templates extends mailchimp {

    public $subclass_resource;

    #SUBCLASS INSTANTIATIONS

    public $default_content;

    function __construct($apikey, $class_input)
    {
      parent::__construct($apikey);

        if (isset($class_input))
        {
            $this->url .= '/templates/' . $class_input;;
        } else
        {
            $this->url .= '/templates/';
        }
      
        $this->subclass_resource = $class_input;
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

	public function POST( $name, $html , $folder_id = null )
	{
		$params = array('name' => $name, 'html' => $html);

        if(!is_null($folder_id))
        {
            $params['folder_id'] = $folder_id;
        }
		
		$payload = json_encode($params);
		$url = $this->url;

		$response = $this->curl_post($url); 


	}

    public function PATCH( $name, $html, $folder_id = null )
    {
        $params = array('name' => $name, 'html' => $html);

        if(!is_null($folder_id))
        {
            $params['folder_id'] = $folder_id;
        }

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_patch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curl_delete($url);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function default_content( $class_input = null )
    {
        $this->default_content = new templates_default_content($this->apikey, $this->subclass_resource, $class_input);
        return $this->default_content;
    }

}