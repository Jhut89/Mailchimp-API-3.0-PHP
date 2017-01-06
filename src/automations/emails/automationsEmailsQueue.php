<?php

class automations_email_queue extends automations_emails {

    function __construct($apikey, $parent_reference, $grandchild_resource, $member)
    {

        parent::__construct($apikey, $parent_reference, $grandchild_resource);
        if (isset($member)) 
        {
            $this->url .= '/queue/' . md5(strtolower($member));
        } else 
        {
            $this->url .= '/queue/';
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

    public function POST($emailaddress)
    {
        $params = array(
            'email_address' => $emailaddress
        );

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

}