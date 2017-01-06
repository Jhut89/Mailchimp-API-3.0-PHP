<?php

class Lists_Webhooks extends Lists
{

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/webhooks/' . $class_input;
        } else {
            $this->url .= '/webhooks/';
        }

    }

    public function POST( $url, $events = array(), $sources = array() )
    {
        $params = array('url' => $url, 'events' => $events, 'sources' => $sources);
        $payload = json_encode($params);

        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
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

    public function PATCH( $patch_params = array() )
    {
        $payload = json_encode($patch_params);

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
}