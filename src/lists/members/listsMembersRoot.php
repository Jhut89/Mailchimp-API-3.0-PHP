<?php

class lists_members extends lists {

    public $grandchild_resource;

    #SUBCLASS INSTANTIATION
    public $notes;
    public $goals;
    public $member_activity;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input))
        {
            $this->url .= '/members/' . $class_input;
        } else
        {
            $this->url .= '/members/';
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

    public function POST( $status, $emailaddress,  $optional_parameters = array() )
    {
        $params = array('email_address' => $emailaddress,
            'status' => $status,
        );

        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH( $patch_parameters = array( ))
    {

        $payload = json_encode($patch_parameters);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function PUT( $emailaddress, $status_if_new, $optional_parameters = array() )
    {

        $params = array('email_address' => $emailaddress,
            'status_if_new' => $status_if_new
        );

        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPut($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function notes( $class_input = null )
    {
        $this->notes = new lists_members_member_notes($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->notes;
    }

    public function goals( $class_input = null )
    {
        $this->goals = new lists_members_member_goals($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->goals;
    }

    public function activity( $class_input = null )
    {
        $this->member_activity = new lists_members_member_activity($this->apikey, $this->subclass_resource, $this->grandchild_resource, $class_input);
        return $this->member_activity;
    }

}