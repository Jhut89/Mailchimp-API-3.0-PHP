<?php

class Conversations extends Mailchimp
{

    public $subclass_resource;

    // SUBCLASS INSTANTIATIONS
    public $messages;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/conversations/' . $class_input;
        } else {
            $this->url .= '/conversations/';
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

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function messages( $class_input = null )
    {
        $this->messages = new Conversations_Messages(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->messages;
    }
    
}