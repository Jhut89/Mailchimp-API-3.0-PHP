<?php

class Lists_Interest_Categories extends Lists {

    public $grandchild_resource;

    //SUBCLASS INSTANTIATIONS
    public $interests;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/interest-categories/' . $class_input;
        } else {
            $this->url .= '/interest-categories/';
        }

        $this->grandchild_resource = $class_input;

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

    // $type can be "checkboxes", "radio", "hidden", or "dropdown"
    public function POST($title, $type)
    {
        $params = array('title' => $title, 'type' => $type);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH($title, $type)
    {
        $params = array('title' => $title, 'type' => $type);

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

    public function interests( $class_input = null )
    {
        $this->interests = new Lists_Interests_Categories_Interest(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->interests;
    }
}