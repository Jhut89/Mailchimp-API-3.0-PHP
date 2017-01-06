<?php

class Automations extends Mailchimp
{
    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    public $removed_subs;
    public $emails;

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .=  '/automations/' . $class_input;
        } else {
            $this->url .= '/automations/';
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

    public function removedSubscribers()
    {
        $this->removed_subs = new Automations_Removed_Subscribers(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->removed_subs;
    }

    public function emails( $class_input = null )
    {
        $this->emails = new Automations_Emails(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->emails;
    }

}