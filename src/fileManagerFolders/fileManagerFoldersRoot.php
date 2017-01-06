<?php

class File_Manager_Folders extends Mailchimp {

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/file-manager/folders/' . $class_input;;
        } else {
            $this->url .= '/file-manager/folders/';
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

    public function PATCH($name)
    {
        $params = array('name' => $name);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }

    public function POST($name)
    {
        $params = array('name' => $name);
        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }
}