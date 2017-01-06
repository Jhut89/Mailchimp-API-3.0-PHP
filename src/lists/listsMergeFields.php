<?php

class lists_merge_fields extends lists {

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/merge-fields/' . $class_input;
        } else
        {
            $this->url .= '/merge-fields/';
        }

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

    // $listid, $name, & $type are required fields, others are optional.
    // pass $required & $visible as boolean
    // SCHEMA DESCRIBES $type AS STRING
    // $types array('text','number','address','phone','email','date','url','imageurl','radio','dropdown','checkboxes','birthday','zip');
    public function POST($name, $type, $optional_params = array())
    {
        $params = array('name' => $name, 'type' => $type);
        $params = array_merge($params, $optional_params);

        $payload = json_encode($params);

        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH( $name, $patch_params = array() )
    {
        $params = array('name' => $name);
        $params = array_merge($params, $patch_params);

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
	
}