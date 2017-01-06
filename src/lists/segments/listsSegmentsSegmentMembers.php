<?php

class Lists_Segment_Segment_Members extends Lists_Segments
{

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/members/' . $class_input;
        } else {
            $this->url .= '/members/';
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

    public function POST( $member_hash )
    {
        $params = array('id' => $member_hash);
        $payload =  json_encode($params);

        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }

}