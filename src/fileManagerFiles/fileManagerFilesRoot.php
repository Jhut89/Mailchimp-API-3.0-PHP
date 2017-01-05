<?php

class file_manager_files extends mailchimp {

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input))
        {
            $this->url .= '/file-manager/files/' . $class_input;;
        } else
        {
            $this->url .= '/file-manager/files/';
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

    public function POST($name, $file_location)
    {
        $file = file_get_contents($file_location);
        $ext = pathinfo($file_location, PATHINFO_EXTENSION);
        $data = base64_encode($file);

        $params = array('name' => $name . '.' . $ext, 'file_data' => $data);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

    // CURRENTLY YOU CAN ONLY UPDATE WHAT FOLDER A FILE IS LOCATED IN
    public function PATCH($folderid)
    {
        $params = array('folder_id' => $folderid);

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
	
}