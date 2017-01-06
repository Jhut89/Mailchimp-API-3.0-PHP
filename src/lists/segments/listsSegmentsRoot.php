<?php

class lists_segments extends lists {

    public $grandchild_resource;

    //SUBCLASS INSTANTIATIONS
    public $segment_members;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/segments/' . $class_input;
        } else
        {
            $this->url .= '/segments/';
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
        
    public function BATCH ( $add = array() , $remove = array() )
    {
        $params = array('members_to_add' => $add, 'members_to_remove' => $remove);
        $payload = json_encode($params);

        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function POST($name, $conditions = null , $static_segment = null)
    {
        $params = array('name' => $name);

        if (!is_null($conditions)) {
            $params['options'] = $conditions;
        }

        if (!is_null($static_segment)) {
            $params['static_segment'] = $static_segment;
        }

        $payload = json_encode($params);
        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
    }


    public function PATCH($name, $patch_params = array())
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
	
    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function members( $class_input = null )
    {
        $this->segment_members = new lists_segment_segment_members($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->members;
    }
}