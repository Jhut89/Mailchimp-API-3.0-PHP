<?php

class conversations_messages extends conversations {

    function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);

        if (isset($class_input))
        {
            $this->url .= '/messages/' . $class_input;;
        } else
        {
            $this->url .= '/messages/';
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

    // This function creates a new entry in an existing conversation
    // $read must be passed as a boolean.
    public function POST($fromemail, $read, $subject, $message)
    {
        $conversation = array('from_email' => $fromemail, 'read' => $read, 'subject' => $subject, 'message' => $message);

        $payload = json_encode($conversation);
        $url = $this->url;

        $response = $this->curl_post($url, $payload);

        return $response;
    }

}

