<?php

class Templates extends Mailchimp
{

    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS

    public $default_content;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/templates/' . $class_input;;
        } else {
            $this->url .= '/templates/';
        }
      
        $this->subclass_resource = $class_input;
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

    public function POST( $name, $html , $folder_id = null )
    {
        $params = array('name' => $name, 'html' => $html);

        if (!is_null($folder_id)) {
            $params['folder_id'] = $folder_id;
        }

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;

    }

    public function PATCH( $name, $html, $folder_id = null )
    {
        $params = array('name' => $name, 'html' => $html);

        if (!is_null($folder_id)) {
            $params['folder_id'] = $folder_id;
        }

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

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function defaultContent( $class_input = null )
    {
        $this->default_content = new Templates_Default_Content(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->default_content;
    }

}